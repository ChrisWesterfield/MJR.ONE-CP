<?php

namespace Mjr\Frontend\Monitoring\CPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('MjrFrontendMonitoringCPBundle:Default:index.html.twig');
    }
}
