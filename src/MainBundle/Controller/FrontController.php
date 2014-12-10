<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/about", name="about")
     * @Template()
     */
    public function quiSommesNousAction()
    {
        return array();
    }
    
    /**
     * @Route("/meetings", name="meetings")
     * @Template()
     */
    public function rendezVousAction()
    {
        return array();
    }    

    /**
     * @Route("/alerts", name="alerts")
     * @Template()
     */
    public function alertsAction()
    {
        return array();
    }      
    
    /**
     * @Route("/account", name="account")
     * @Template()
     */
    public function accountAction()
    {
        return array();
    }  
    
    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        return array();
    }       
}
