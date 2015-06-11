<?php

namespace AppBundle\Controller\sucursales;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\SucursalesQuejas;
use AppBundle\Form\SucursalesQuejasType;

/**
 * SucursalesQuejas controller.
 *
 */
class SucursalesQuejasController extends Controller
{

    /**
     * Lists all SucursalesQuejas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:SucursalesQuejas')->findAll();

        return $this->render('AppBundle:SucursalesQuejas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SucursalesQuejas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SucursalesQuejas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sucursales_quejas_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:SucursalesQuejas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SucursalesQuejas entity.
     *
     * @param SucursalesQuejas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SucursalesQuejas $entity)
    {
        $form = $this->createForm(new SucursalesQuejasType(), $entity, array(
            'action' => $this->generateUrl('sucursales_quejas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SucursalesQuejas entity.
     *
     */
    public function newAction()
    {
        $entity = new SucursalesQuejas();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:SucursalesQuejas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SucursalesQuejas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:SucursalesQuejas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SucursalesQuejas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:SucursalesQuejas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SucursalesQuejas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:SucursalesQuejas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SucursalesQuejas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:SucursalesQuejas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SucursalesQuejas entity.
    *
    * @param SucursalesQuejas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SucursalesQuejas $entity)
    {
        $form = $this->createForm(new SucursalesQuejasType(), $entity, array(
            'action' => $this->generateUrl('sucursales_quejas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SucursalesQuejas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:SucursalesQuejas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SucursalesQuejas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sucursales_quejas_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:SucursalesQuejas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SucursalesQuejas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:SucursalesQuejas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SucursalesQuejas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sucursales_quejas'));
    }

    /**
     * Creates a form to delete a SucursalesQuejas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sucursales_quejas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
