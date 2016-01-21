<?php

namespace Mjr\Frontend\Monitoring\ServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MjrFrontendMonitoringServerBundle:Default:index.html.twig');
    }
}
