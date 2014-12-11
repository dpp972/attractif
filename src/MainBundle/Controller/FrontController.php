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
            $this->get('session')->getFlashBag()->add('error', 'Pas d\'enregistrement');
        }
        //$this->get('session')->getFlashBag()->add('success', 'Enregistrement');
        
        return $this->render('MainBundle:Front:home.html.twig', array( 'events' => $events));
    }
    
    /**
     * @Route("/about", name="about")
     * @Template()
     */
    public function quiSommesNousAction()
    {
        $infos = $this->getDoctrine()
            ->getRepository('MainBundle:Home')
            ->find(1);

        if (!$infos) {
            throw $this->createNotFoundException(
                'L\'utilisateur n\'a pas été trouvé'
            );
        }   
        
        return $this->render('MainBundle:Front:quiSommesNous.html.twig', array( 'infos' => $infos));
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
        
        $user = $this->getDoctrine()
            ->getRepository('MainBundle:Client')
            ->find(1);
        
        return $this->render('MainBundle:Front:account.html.twig', array( 'user' => $user));
    }  
    
    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction(){
        
        $infos = $this->getDoctrine()
            ->getRepository('MainBundle:Home')
            ->find(1);

        if (!$infos) {
            throw $this->createNotFoundException(
                'L\'utilisateur n\'a pas été trouvé'
            );
        }   
        
        return $this->render('MainBundle:Front:contact.html.twig', array( 'infos' => $infos));
    }       
}
