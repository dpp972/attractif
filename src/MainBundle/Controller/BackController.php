<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Assert;
use MainBundle\Entity\Image;

class BackController extends Controller
{
    /**
     * @Route("/", name="ADMIN")
     * @Template("home")
     */
    public function indexAction()
    {
        return $this->render('MainBundle:Back:index.html.twig');
    }

    /**
     * Displays a form to create a new Image entity.
     *
     * @Route("/images/new", name="images_new")
     * @Method("GET")
     * @Template()
     */
    public function newImageAction()
    {
        $entity = new Image();

        $form = $this->createFormBuilder($entity)
            ->add('file')
            ->setAction($this->generateUrl('images_upload'))
            ->setMethod('POST')
            ->getForm();

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Uploads a new Image entity.
     *
     * @Route("/images", name="images_upload")
     * @Method("POST")
     * @Template("MainBundle:Back:newImage.html.twig")
     */
    public function uploadImageAction(Request $request)
    {
        $entity = new Image('produit');

        $form = $this->createFormBuilder($entity)
            ->add('file')
            ->getForm();

        $form->add('submit', 'submit', array('label' => 'Valider'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('images_show_all', array()));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays all Image entity.
     *
     * @Route("images/show/all", name="images_show_all")
     * @Method("GET")
     * @Template()
     */
    public function showAllImagesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $images = $em->getRepository('MainBundle:Image')->findAll();

        if (!$images) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        return array(
            'entity'      => $images,
        );
    }


}
