<?php

namespace AppBundle\Controller\compras;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\ComprasPagosFormas;
use AppBundle\Form\ComprasPagosFormasType;

/**
 * ComprasPagosFormas controller.
 *
 */
class ComprasPagosFormasController extends Controller
{

    /**
     * Lists all ComprasPagosFormas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ComprasPagosFormas')->findAll();

        return $this->render('AppBundle:ComprasPagosFormas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ComprasPagosFormas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ComprasPagosFormas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('compras_pagos_formas_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:ComprasPagosFormas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ComprasPagosFormas entity.
     *
     * @param ComprasPagosFormas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ComprasPagosFormas $entity)
    {
        $form = $this->createForm(new ComprasPagosFormasType(), $entity, array(
            'action' => $this->generateUrl('compras_pagos_formas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new ComprasPagosFormas entity.
     *
     */
    public function newAction()
    {
        $entity = new ComprasPagosFormas();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:ComprasPagosFormas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ComprasPagosFormas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasPagosFormas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasPagosFormas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:ComprasPagosFormas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ComprasPagosFormas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasPagosFormas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasPagosFormas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:ComprasPagosFormas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ComprasPagosFormas entity.
    *
    * @param ComprasPagosFormas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ComprasPagosFormas $entity)
    {
        $form = $this->createForm(new ComprasPagosFormasType(), $entity, array(
            'action' => $this->generateUrl('compras_pagos_formas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing ComprasPagosFormas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasPagosFormas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasPagosFormas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('compras_pagos_formas_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:ComprasPagosFormas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ComprasPagosFormas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ComprasPagosFormas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ComprasPagosFormas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('compras_pagos_formas'));
    }

    /**
     * Creates a form to delete a ComprasPagosFormas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compras_pagos_formas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
