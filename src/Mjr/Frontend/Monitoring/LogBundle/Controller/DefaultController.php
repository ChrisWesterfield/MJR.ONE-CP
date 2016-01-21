<?php

namespace Mjr\Frontend\Monitoring\LogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('MjrFrontendMonitoringLogBundle:Default:index.html.twig');
    }
}
