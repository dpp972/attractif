<?php

namespace MainBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use MainBundle\Entity\Client;
use MainBundle\Form\ClientType;
use MainBundle\Entity\Evenement;
use MainBundle\Entity\Entreprise;

class FrontController extends Controller
{
    /**
     * @Route("/home/todo", name="todo")
     * @Template()
     */
    public function homeTodoAction()
    {
        $repo = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement');
        
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');     
        
        $query = $repo->createQueryBuilder('p')
            ->where('p.dateDeb > :date')
            ->setParameter('date', $date)                
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
    public function homeDoneAction()
    {
        $repo = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement');
        
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');
        $query = $repo->createQueryBuilder('p')           
            ->where('p.dateFin < :date') 
            ->setParameter('date', $date)
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
    public function homeAction()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');        
        
        $repo = $this->getDoctrine()->getRepository('MainBundle:Evenement');
        $query = $repo->createQueryBuilder('p')
            ->where('p.dateDeb < :date')
            ->andWhere('p.dateFin > :date') 
            ->setParameter('date', $date)        
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
        $user = new Client;
        $user = $this->getDoctrine()
            ->getRepository('MainBundle:Client')
            ->find(1);

        $events = new Evenement;
        $events = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement')
            ->findAll();
        
       $events = $user->getParticipations($events);
        
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
        $user = new Client;
        $user = $this->getDoctrine()
            ->getRepository('MainBundle:Client')
            ->find(1);

        $events = new Evenement;
        $events = $this->getDoctrine()
            ->getRepository('MainBundle:Entreprise')
            ->findAll();
        
        $alerts = $user->getInscriptions($events);
        
        if (!$alerts) {
            $this->get('session')->getFlashBag()->add('error', 'Aucune alerte n\'a été parametré');
        }
        
        return $this->render('MainBundle:Front:alerts.html.twig', array( 'alerts' => $alerts ));
    }      
    
    /**
     * @Route("/account", name="account")
     * @Template()
     */
    public function accountAction(Request $request)
    {   
        $user = new Client;
        $form = $this->createForm(new ClientType ,$user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('session')->getFlashBag()->add('error', 'Les informations ont été modifiées');
        }

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
     */
    public function subscribeAction($id)
    {
        $event = $this->getDoctrine()
            ->getRepository('MainBundle:Evenement')
            ->find($id);
        
        $user = $this->getDoctrine()
            ->getRepository('MainBundle:Client')
            ->find(1);
        
        $user->addParticipation($event);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        return $this->redirect($this->generateUrl('home'));
    }
    
    /**
     * @Route("addAlert/{id}", name="addAlerts")
     */
    public function addAlertAction($id)
    {        
        
        $ent = $this->getDoctrine()
            ->getRepository('MainBundle:Entreprise')
            ->find($id);
        
        $user = $this->getDoctrine()
            ->getRepository('MainBundle:Client')
            ->find(1);
        
        $user->addInscription($ent);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        return $this->redirect($this->generateUrl('home'));
    }
}
