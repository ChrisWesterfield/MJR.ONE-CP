<?php

namespace Mjr\Frontend\System\ConfigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PhpVersionsControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/PhpVersion/List');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/PhpVersion/Edit');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/PhpVersion/Create');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/System/PhpVersion/Delete');
    }

}
