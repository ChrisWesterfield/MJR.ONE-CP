<?php

namespace Mjr\Frontend\OperationsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testRegister1()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Operations/Register/Step1');
    }

    public function testRegsiter2()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Operations/Register/Step2');
    }

    public function testRegister3()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Operations/Register/Step3/{Code}');
    }

}
