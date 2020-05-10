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

        $this->assertSelectorTextContains('html .list-group .list-group-item-action[href="all"]', 'All Books');
        $this->assertSelectorTextContains('html .list-group .list-group-item-action[href="1"]', 'Children');
        $this->assertSelectorTextContains('html .list-group .list-group-item-action[href="2"]', 'Fiction');
    }

    public function testChildrenCategory()
    {
        $client = static::createClient();

        $client->request('GET', '/1');

        $this->assertSelectorTextContains('html .books:first-child', 'Fundamentals of Wavelets');
        $this->assertSelectorTextContains('html .books:first-child', 'LKR1,000.00');
        $this->assertSelectorTextContains('html .books:first-child .btn-add-to-cart', 'Add to Cart');
    }

    public function testFictionCategory()
    {
        $client = static::createClient();

        $client->request('GET', '/2');

        $this->assertSelectorTextContains('html .books:first-child', 'Data Smart');
        $this->assertSelectorTextContains('html .books:first-child', 'LKR500.00/=');
        $this->assertSelectorTextContains('html .books:first-child .btn-add-to-cart', 'Add to Cart');
    }
    
}