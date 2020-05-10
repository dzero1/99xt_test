<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use App\Entity\XtBook;

class DiscountTest extends WebTestCase
{
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    /* Add to cart */
    public function testAddToCart()
    {
        $client = static::createClient();

        $client->xmlHttpRequest('POST', '/cart/add', ['id' => '1']);
        $client->xmlHttpRequest('POST', '/cart/add', ['id' => '2']);
        $client->xmlHttpRequest('POST', '/cart/add', ['id' => '3']);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertStringContainsString(
            'LKR1,800.00',
            $client->getResponse()->getContent()
        );
    }

    /* Remove from cart */
    public function testRemoveFromCart()
    {
        $client = static::createClient();

        $client->xmlHttpRequest('POST', '/cart/add', ['id' => '1']);
        $client->xmlHttpRequest('POST', '/cart/add', ['id' => '2']);
        $client->xmlHttpRequest('POST', '/cart/remove', ['id' => '2']);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertStringContainsString(
            'LKR1,000.00',
            $client->getResponse()->getContent()
        );
    }

    /* For more than 5 children books */
    public function testTenPercentDiscount1()
    {
        $client = static::createClient();

        $repository = $this->em->getRepository(XtBook::class);
        $books = $repository->findByCategory("1");

        $rnd = (int) rand(1, count($books)-1);
        $book = $books[$rnd];
        $books_count = 5;

        $id = $book->getId();
        $price = $book->getPrice();
        $final_price = number_format( ($price * $books_count) * 0.9 , 2 );

        for ($i=0; $i < $books_count; $i++) { 
            $client->xmlHttpRequest('POST', '/cart/add', ['id' => $id]);
        }

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertStringContainsString(
            $final_price,
            $client->getResponse()->getContent()
        );
    }

    /* For more than 10 other books 5% discount */
    public function testFivePercentDiscount()
    {
        $client = static::createClient();

        $repository = $this->em->getRepository(XtBook::class);
        $books = $repository->findByCategory("2");

        $books_count = 10;
        $price = 0;

        for ($i=0; $i < $books_count; $i++) { 
            $rnd = floor(rand(1, count($books)-1));
            $book = $books[$rnd];

            $price += $book->getPrice();

            $client->xmlHttpRequest('POST', '/cart/add', ['id' => $book->getId()]);
        }
        $final_price = number_format( $price * 0.95 , 2 );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertStringContainsString(
            $final_price,
            $client->getResponse()->getContent()
        );
    }

    /* For more than 10 any books */
    public function testTenandFivePercentDiscount()
    {
        $client = static::createClient();

        $repository = $this->em->getRepository(XtBook::class);
        $books = $repository->findByCategory("1");
        $books_count = rand(1,15);
        
        $price_1 = 0;
        $discount_1 = 0;

        $price_2 = 0;
        $discount_2 = 0;
        
        $total = 0;

        for ($i=0; $i < $books_count; $i++) { 
            $rnd = floor(rand(1, count($books)-1));
            $book = $books[$rnd];

            $price_1 += $book->getPrice();

            $client->xmlHttpRequest('POST', '/cart/add', ['id' => $book->getId()]);
        }

        if ($books_count >= 5) {
            $discount_1 = $price_1 * 0.1;
            $price_1 = $price_1 - $discount_1;
        }

        $books = $repository->findByCategory("2");
        $books_count = rand(1,15);

        for ($i=0; $i < $books_count; $i++) { 
            $rnd = floor(rand(1, count($books)-1));
            $book = $books[$rnd];

            $price_2 += $book->getPrice();

            $client->xmlHttpRequest('POST', '/cart/add', ['id' => $book->getId()]);
        }

        $total = $price_1 + $price_2;

        if ($books_count >= 10) {
            $discount = $total * 0.05;
            $total = $total - $discount;
        }

        $final_price = number_format( $total , 2 );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertStringContainsString(
            $final_price,
            $client->getResponse()->getContent()
        );
    }
    
}