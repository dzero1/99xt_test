<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\XtBook;
use App\Entity\XtCategory;
use App\Entity\XtBookCategory;

use App\Service\CartService;

class DefaultController extends AbstractController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index($category = null)
    {
        // Get all categories
        $repository = $this->getDoctrine()->getRepository(XtCategory::class);
        $categories = $repository->findAll();

        // Get books by category
        $repository = $this->getDoctrine()->getRepository(XtBook::class);
        if ($category == null || $category == "all"){
            $books = $repository->findAll();
        } else {
            $books = $repository->findByCategory($category);
        }

        // Selected books
        $cart_books = $this->cartService->get();
        
        // Price total whith adding coupon
        $total = $this->cartService->get_total();
        
        return $this->render('index.html.twig', [
            'category' => $category,
            'categories' => $categories,
            'books' => $books,
            'cart_books' => $cart_books,
            'total' => $total,
        ]);
    }

}