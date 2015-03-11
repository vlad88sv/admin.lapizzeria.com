<?php

namespace AppBundle\Controller\compras;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\ComprasProveedores;
use AppBundle\Form\ComprasProveedoresType;

/**
 * ComprasProveedores controller.
 *
 */
class ComprasProveedoresController extends Controller
{

    /**
     * Lists all ComprasProveedores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ComprasProveedores')->findAll();

        return $this->render('AppBundle:ComprasProveedores:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ComprasProveedores entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ComprasProveedores();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('compras_proveedores_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:ComprasProveedores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ComprasProveedores entity.
     *
     * @param ComprasProveedores $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ComprasProveedores $entity)
    {
        $form = $this->createForm(new ComprasProveedoresType(), $entity, array(
            'action' => $this->generateUrl('compras_proveedores_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ComprasProveedores entity.
     *
     */
    public function newAction()
    {
        $entity = new ComprasProveedores();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:ComprasProveedores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ComprasProveedores entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasProveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasProveedores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:ComprasProveedores:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ComprasProveedores entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasProveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasProveedores entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:ComprasProveedores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ComprasProveedores entity.
    *
    * @param ComprasProveedores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ComprasProveedores $entity)
    {
        $form = $this->createForm(new ComprasProveedoresType(), $entity, array(
            'action' => $this->generateUrl('compras_proveedores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing ComprasProveedores entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ComprasProveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ComprasProveedores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('compras_proveedores_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:ComprasProveedores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ComprasProveedores entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ComprasProveedores')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ComprasProveedores entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('compras_proveedores'));
    }

    /**
     * Creates a form to delete a ComprasProveedores entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compras_proveedores_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
