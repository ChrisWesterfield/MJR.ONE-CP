<?php

namespace Mjr\Frontend\System\APSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('MjrFrontendSystemAPSBundle:Default:index.html.twig');
    }
}
