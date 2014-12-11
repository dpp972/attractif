<?php

namespace MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MainBundle\Entity\Home;
use MainBundle\Form\HomeType;

/**
 * Home controller.
 */
class HomeController extends Controller
{

    /**
     * Lists all Home entities.
     *
     * @Route("/", name="homeAdmin")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
        
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MainBundle:Home')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Home entity.
     *
     * @Route("/", name="home_create")
     * @Method("POST")
     * @Template("MainBundle:Home:new.html.twig")
     */
    /*public function createAction(Request $request)
    {
        $entity = new Home();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('home_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }*/

    /**
     * Creates a form to create a Home entity.
     *
     * @param Home $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Home $entity)
    {
        $form = $this->createForm(new HomeType(), $entity, array(
            'action' => $this->generateUrl('home_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Home entity.
     *
     * @Route("/new", name="home_new")
     * @Method("GET")
     * @Template()
     */
    /*public function newAction()
    {
        $entity = new Home();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }*/

    /**
     * Finds and displays a Home entity.
     *
     * @Route("/{id}", name="home_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:Home')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Home entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Home entity.
     *
     * @Route("/{id}/edit", name="home_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:Home')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Home entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Home entity.
    *
    * @param Home $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Home $entity)
    {
        $form = $this->createForm(new HomeType(), $entity, array(
            'action' => $this->generateUrl('home_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Home entity.
     *
     * @Route("/{id}", name="home_update")
     * @Method("PUT")
     * @Template("MainBundle:Home:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:Home')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Home entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('home_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Home entity.
     *
     * @Route("/{id}", name="home_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MainBundle:Home')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Home entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('home'));
    }

    /**
     * Creates a form to delete a Home entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('home_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
