<?php

namespace Mjr\Frontend\Email\XmppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('MjrFrontendEmailXmppBundle:Default:index.html.twig');
    }
}
