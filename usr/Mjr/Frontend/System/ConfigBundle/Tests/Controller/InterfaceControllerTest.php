<?php

namespace Mjr\Frontend\System\ConfigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InterfaceControllerTest extends WebTestCase
{
    public function testViewconfig()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/System/Interface/Config');
    }

}
