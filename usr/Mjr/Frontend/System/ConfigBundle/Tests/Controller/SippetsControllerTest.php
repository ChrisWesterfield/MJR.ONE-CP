<?php

namespace Mjr\Frontend\System\ConfigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SippetsControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Snippets/List');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Snippets/Edit');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Snippets/Create');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Snippets/Delete');
    }

}
