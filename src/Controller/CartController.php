<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\CartService;

class CartController extends AbstractController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        if (!$request->isXmlHttpRequest() || !isset($request->request)) {
            return new JsonResponse(array(
                'status' => 'Error',
                'message' => 'Error'),
            400);
        }

        $id = $request->request->get('id');
        $ret = $this->cartService->add($id);
        
        $cart_books = $this->cartService->get();
        $total = $this->cartService->get_total();
        $ret = [
            'cart_books' => $cart_books,
            'total' => $total,
        ];

        $template = $this->render('popcart.html.twig', $ret)->getContent();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response->setData(['template' => $template ]);
    }

    public function removeFromCart(Request $request)
    {
        if (!$request->isXmlHttpRequest() || !isset($request->request)) {
            return new JsonResponse(array(
                'status' => 'Error',
                'message' => 'Error'),
            400);
        }

        $id = $request->request->get('id');
        $ret = $this->cartService->remove($id);
        
        $cart_books = $this->cartService->get();
        $total = $this->cartService->get_total();
        $ret = [
            'cart_books' => $cart_books,
            'total' => $total,
        ];

        $template = $this->render('popcart.html.twig', $ret)->getContent();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response->setData(['template' => $template ]);
    }


}