<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function homeAction()
    {
        $events = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement')
            ->findAll();

        if (!$events) {
            throw $this->createNotFoundException(
                'Aucune vente privée n\'a été trouvé' 
            );
        }
        
        return $this->render('MainBundle:Front:home.html.twig', array( 'events' => $events));
    }
    
    /**
     * @Route("/about", name="about")
     * @Template()
     */
    public function quiSommesNousAction()
    {
        return $this->render('MainBundle:Front:quiSommesNous.html.twig'/*, array( 'events' => $events)*/);
    }
    
    /**
     * @Route("/meetings", name="meetings")
     * @Template()
     */
    public function rendezVousAction()
    {
        $events = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement')
            ->findAll();

        if (!$events) {
            throw $this->createNotFoundException(
                'Aucune vente privée n\'a été trouvé' 
            );
        }
        
        return $this->render('MainBundle:Front:rendezVous.html.twig', array( 'events' => $events));
    }    

    /**
     * @Route("/alerts", name="alerts")
     * @Template()
     */
    public function alertsAction()
    {
        $events = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement')
            ->findAll();

        if (!$events) {
            throw $this->createNotFoundException(
                'Aucune vente privée n\'a été trouvé' 
            );
        }        
        return $this->render('MainBundle:Front:alerts.html.twig'/*, array( 'events' => $events)*/);
    }      
    
    /**
     * @Route("/account", name="account")
     * @Template()
     */
    public function accountAction()
    {
        return $this->render('MainBundle:Front:account.html.twig'/*, array( 'events' => $events)*/);
    }  
    
    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction(){
        
        
        return $this->render('MainBundle:Front:contact.html.twig'/*, array( 'events' => $events)*/);
    }       
}
