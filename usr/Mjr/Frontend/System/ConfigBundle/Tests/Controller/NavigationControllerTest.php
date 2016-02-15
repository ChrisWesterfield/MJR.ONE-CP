<?php

namespace Mjr\Frontend\System\ConfigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NavigationControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/Navigation/List');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/Navigation/Create');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/Navigation/Delete');
    }

    public function testSave()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/Navigation/Save');
    }

    public function testChangestatus()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/Navigation/Status');
    }

}
