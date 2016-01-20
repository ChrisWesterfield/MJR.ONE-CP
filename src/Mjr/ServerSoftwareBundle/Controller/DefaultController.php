<?php

namespace Mjr\ServerSoftwareBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MjrServerSoftwareBundle:Default:index.html.twig');
    }
}
