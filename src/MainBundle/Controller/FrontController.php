<?php

namespace MainBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontController extends Controller
{
    /**
     * @Route("/home/todo", name="todo")
     * @Template()
     */
    public function homeTodoAction(Request $request)
    {
        $repo = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement');
        
        $query = $repo->createQueryBuilder('p')
            ->where('p.dateDeb > CURRENT_DATE()')
            ->orderBy('p.dateDeb', 'ASC')
            ->getQuery();

        $events = $query->getResult();
        
        
        if (!$events) {
            $this->get('session')->getFlashBag()->add('error', 'Il n\'y a pas d\'évenement pour cette période');
        }
        
        return $this->render('MainBundle:Front:home.html.twig', array('events' => $events));        
    }
 
    /**
     * @Route("/home/done", name="done")
     * @Template()
     */
    public function homeDoneAction(Request $request)
    {
        $repo = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement');
        
        $query = $repo->createQueryBuilder('p')
            ->where('p.dateFin > CURRENT_DATE()') 
            ->orderBy('p.dateFin', 'DESC')
            ->getQuery();

        $events = $query->getResult();
        
        
        if (!$events) {
            $this->get('session')->getFlashBag()->add('error', 'Il n\'y a pas d\'évenement pour cette période');
        }
        
        return $this->render('MainBundle:Front:home.html.twig', array('events' => $events));
    }    
    
    
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function homeAction(Request $request)
    {
        $repo = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement');
        
        $query = $repo->createQueryBuilder('p')
            ->where('p.dateFin >= CURRENT_DATE()')    /* 0 = now () */
            ->andWhere('p.dateDeb <= CURRENT_DATE()') /* 0 = now () */          
            ->orderBy('p.dateFin', 'DESC')
            ->getQuery();

        $events = $query->getResult();

        if (!$events) {
            $this->get('session')->getFlashBag()->add('error', 'Il n\'y a pas d\'évenement pour cette période');
        }
        return $this->render('MainBundle:Front:home.html.twig', array('events' => $events));
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
            $this->get('session')->getFlashBag()->add('error', 'L\'utilisateur n\'a pas été trouvé');
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
            ->getRepository('MainBundle:Client')
            ->find(1);

        if (!$events) {
            $this->get('session')->getFlashBag()->add('error', 'Aucun évenement n\'est enregistré');
        }
        
        return $this->render('MainBundle:Front:rendezVous.html.twig', array( 'events' => $events));
    }    

    /**
     * @Route("/alerts", name="alerts")
     * @Template()
     */
    public function alertsAction()
    {
        $alerts = $this->getDoctrine()
            ->getRepository('MainBundle:Entreprise')
            ->findAll();
        
        if (!$alerts) {
            $this->get('session')->getFlashBag()->add('error', 'Aucune alerte n\'a été parametré');
        }
        
        return $this->render('MainBundle:Front:alerts.html.twig', array( 'alerts' => $alerts ));
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
            $this->get('session')->getFlashBag()->add('error', 'L\'utilisateur n\'a pas été trouvé');
        }   
        
        return $this->render('MainBundle:Front:contact.html.twig', array( 'infos' => $infos));
    }  
    
    
    /**
     * @Route("subscribe/{id}", name="subscribe")
     * @Method("get")
     */
    public function subscribeAction()
    {
        $user = $this->getDoctrine()
            ->getRepository('MainBundle:Client')
            ->find(1);
                
        return $this->redirect($this->generateUrl('home'));
    }
    
    /**
     * @Route("addAlert/{id}", name="addAlerts")
     * @Method("get")
     */
    public function addAlertAction()
    {
        $user = $this->getDoctrine()
            ->getRepository('MainBundle:Client')
            ->find(1);
                
        return $this->redirect($this->generateUrl('home'));
    }          
}
