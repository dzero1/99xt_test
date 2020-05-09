<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Repository\XtBookRepository;

class CartService
{
    private $session;
    private $xtBookRepository;

    public function __construct(SessionInterface $session, XtBookRepository $xtBookRepository)
    {
        $this->session = $session;
        $this->xtBookRepository = $xtBookRepository;
    }

    /**
     * Get current item in cart
     */
    public function get()
    {
        $my_cart = $this->session->get('cart', []);

        $ret_books = [];
        foreach ($my_cart as $cat => $books) {
            foreach ($books as $id => $count) {
                $book = $this->xtBookRepository->find($id);
                $book->setCount($count);
                $ret_books[] = $book;
            }
        }

        return $ret_books;
    }
    
    /**
     * Add item to cart
    */
    public function add($id)
    {
        $my_cart = $this->session->get('cart', []);
        $book = $this->xtBookRepository->find($id);

        if ($book){
            $cat = $book->getCategory()[0]->getId();

            // Check if category exist on cart
            if (!isset($my_cart[$cat])) $my_cart[$cat] = [];

            // Check if book alrady exist
            if (!isset($my_cart[$cat][$id])) $my_cart[$cat][$id] = 0;

            // Increment book count
            $my_cart[$cat][$id]++;

            $this->session->set('cart', $my_cart);
        }

        return $this->get();
    }
    
    public function remove($id)
    {
        $my_cart = $this->session->get('cart', []);
        $book = $this->xtBookRepository->find($id);

        if ($book){
            $cat = $book->getCategory()[0]->getId();

            // Check if category exist on cart
            if (!isset($my_cart[$cat])) $my_cart[$cat] = [];

            // Check if book alrady exist
            if (!isset($my_cart[$cat][$id])) $my_cart[$cat][$id] = 0;

            // Increment book count
            if ($my_cart[$cat][$id] > 0) $my_cart[$cat][$id]--;
            if ($my_cart[$cat][$id] == 0) unset($my_cart[$cat][$id]);

            $this->session->set('cart', $my_cart);
        }

        return $this->get();
    }

    /**
     * add coupon code
     */
    public function addCouponCode($code)
    {
        $this->session->set('coupon', $code);
    }

    /**
     * get coupon code
     */
    public function getCouponCode()
    {
        $this->session->get('coupon', '');
    }

    /**
     * Calculate final total with discounts
     * 
     * Discounts
     * ---------
     *      1. If user purchase more than 5 children books he will get 10% discount only to children books
     *      2. If user purchase 10 books FROM EACH CATEGORY he get additional 5% discount
     *      3. If user has coupon code, he get 15% ONLY for total bill. others will be ignored
     */
    public function get_total($coupon = false){
        $hasFiveChildrenBooks = false;
        $hasTenBooksInEachCategory = false;

        $total_items = 0;
        $children_books_total = 0;
        $children_books_count = 0;
        $children_books_discount = 0;
        $other_books_total = 0;

        $real_total = 0;
        $total = 0;
        $discount = 0;

        $my_cart = $this->session->get('cart', []);

        foreach ($my_cart as $cat => $books) {

            $current_category_count = 0;

            foreach ($books as $id => $count) {
                $book = $this->xtBookRepository->find($id);
                $price = $book->getPrice() * $count;
                $real_total += $price;
                
                $total_items += $count;
                $current_category_count += $count;

                if ($cat == 1) {
                    $children_books_total += $price;
                    $children_books_count += $count;
                } else
                    $other_books_total += $price;
            }

            if (!$hasFiveChildrenBooks && $cat == 1 && $children_books_count >= 5) $hasFiveChildrenBooks = true;
            if (!$hasTenBooksInEachCategory && $current_category_count >= 10) $hasTenBooksInEachCategory = true;
        }

        if ($coupon){
            $hasFiveChildrenBooks = false;
            $hasTenBooksInEachCategory = false;
            $total = $children_books_total + $other_books_total;
            $discount = $total * ($coupon->getDiscount()/100);
            $total = $total - $discount;
        } else {
            if ($hasFiveChildrenBooks) {
                $children_books_discount = $children_books_total * 0.1;         // 10% discount
                $children_books_total = $children_books_total - $children_books_discount;
            }
            $total = $children_books_total + $other_books_total;

            if ($hasTenBooksInEachCategory){
                $discount += $total * 0.05;     // 5% discount
                $total = $total - $discount;
            }

            $discount = $discount + $children_books_discount;
        }
        
        return [
            'total' => $total,
            'real_total' => $real_total,
            'discount' => $discount,
            'total_items' => $total_items,
            'children_books_total' => $children_books_total,
            'children_books_discount' => $children_books_discount,
            'other_books_total' => $other_books_total,
            'hasFiveChildrenBooks' => $hasFiveChildrenBooks,
            'hasTenBooksInEachCategory' => $hasTenBooksInEachCategory,
        ];
    }
}