<?php

namespace Mjr\ServerGetMailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MjrServerGetMailBundle:Default:index.html.twig');
    }
}
