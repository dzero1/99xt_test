<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WebsiteTest extends WebTestCase
{

    public function testSiteTitleAvailable()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertSelectorTextContains('html .navbar strong', 'Book Store');
    }
    
    public function testCategoriesAvailable()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $content = $client->getResponse()->getContent();
        $this->assertStringContainsString("All Books", $content);
        $this->assertStringContainsString("Children", $content);
        $this->assertStringContainsString("Fiction", $content);
    }

    public function testChildrenCategory()
    {
        $client = static::createClient();

        $client->request('GET', '/1');

        $content = $client->getResponse()->getContent();
        $this->assertStringContainsString("Fundamentals of Wavelets", $content);
        $this->assertStringContainsString("LKR1,000.00", $content);

        /* Check button content select by CSS */
        $this->assertSelectorTextContains('html .books:first-child .btn-add-to-cart', 'Add to Cart');
    }

    public function testFictionCategory()
    {
        $client = static::createClient();

        $client->request('GET', '/2');

        $content = $client->getResponse()->getContent();
        $this->assertStringContainsString("Data Smart", $content);
        $this->assertStringContainsString("LKR500.00", $content);
        
        /* Check button content select by CSS */
        $this->assertSelectorTextContains('html .books:first-child .btn-add-to-cart', 'Add to Cart');
    }
    
}