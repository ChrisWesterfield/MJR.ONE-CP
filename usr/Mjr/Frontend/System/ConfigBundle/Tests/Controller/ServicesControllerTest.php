<?php

namespace Mjr\Frontend\System\ConfigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServicesControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Server/List');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Server/Edit');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Server/Delete');
    }

}
