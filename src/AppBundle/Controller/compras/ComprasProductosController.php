<?php

namespace AppBundle\Controller\compras;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\ComprasProductos;
use AppBundle\Form\ComprasProductosType;

/**
 * ComprasProductos controller.
 *
 */
class ComprasProductosController extends Controller
{

    /**
     * Lists all ComprasProductos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ComprasProductos')->findAll();

        return $this->render('AppBundle:ComprasProductos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ComprasProductos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ComprasProductos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('compras_productos_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:ComprasProductos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ComprasProductos entity.
     *
     * @param ComprasProductos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ComprasProductos $entity)
    {
        $form = $this->createForm(new ComprasProductosType(), $entity, array(
            'action' => $this->generateUrl('compras_productos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ComprasProductos entity.
     *
     */
    public function newAction()
    {
        $entity = new ComprasProductos();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:ComprasProductos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ComprasProductos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasProductos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasProductos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:ComprasProductos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ComprasProductos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasProductos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasProductos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:ComprasProductos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ComprasProductos entity.
    *
    * @param ComprasProductos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ComprasProductos $entity)
    {
        $form = $this->createForm(new ComprasProductosType(), $entity, array(
            'action' => $this->generateUrl('compras_productos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing ComprasProductos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasProductos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasProductos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('compras_productos_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:ComprasProductos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ComprasProductos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ComprasProductos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ComprasProductos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('compras_productos'));
    }

    /**
     * Creates a form to delete a ComprasProductos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compras_productos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
