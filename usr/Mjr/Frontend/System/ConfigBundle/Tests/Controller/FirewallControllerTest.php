<?php

namespace Mjr\Frontend\System\ConfigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FirewallControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Firewall/List');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Firewall/Edit');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Firewall/Create');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/Firewall/Delete');
    }

}
