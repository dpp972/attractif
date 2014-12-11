<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BackController extends Controller
{
    /**
     * @Route("/")
     * @Template("home")
     */
    public function indexAction()
    {
        return $this->render('MainBundle:Back:index.html.twig');
    }
}
