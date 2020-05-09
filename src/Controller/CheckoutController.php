<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\CartService;

use App\Entity\XtBook;
use App\Entity\XtCategory;
use App\Entity\XtBookCategory;
use App\Entity\XtCoupon;

class CheckoutController extends AbstractController
{

    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $coupon = null;
        $code = '';
        if (isset($request->request) && $request->isMethod('post')){
            $code = $request->request->get('code');

            //var_dump($code); exit;
            $repository = $this->getDoctrine()->getRepository(XtCoupon::class);
            $coupon = $repository->findOneBy(['code' => $code]);

            if (!$coupon){
                $coupon = false;
            }
        }


        $cart_books = $this->cartService->get();
        
        $total = $this->cartService->get_total($coupon);
        
        return $this->render('checkout.html.twig', [
            'cart_books' => $cart_books,
            'total' => $total,
            'code' => $code,
        ]);
    }

}