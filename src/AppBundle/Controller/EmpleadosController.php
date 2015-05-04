<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Empleados;
use AppBundle\Form\EmpleadosType;

/**
 * Empleados controller.
 *
 */
class EmpleadosController extends Controller
{

    /**
     * Lists all Empleados entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Empleados')->findAll();

        return $this->render('AppBundle:Empleados:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Empleados entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Empleados();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($entity); //get encoder for hashing pwd later
        $password = $encoder->encodePassword($form->get('clave')->getData(), $entity->getSalt()); 
        $entity->setPassword($password);                
                
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('empleados_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:Empleados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Empleados entity.
     *
     * @param Empleados $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Empleados $entity)
    {
        $form = $this->createForm(new EmpleadosType(), $entity, array(
            'action' => $this->generateUrl('empleados_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Empleados entity.
     *
     */
    public function newAction()
    {
        $entity = new Empleados();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:Empleados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Empleados entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Empleados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleados entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Empleados:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Empleados entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Empleados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleados entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Empleados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Empleados entity.
    *
    * @param Empleados $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Empleados $entity)
    {
        $form = $this->createForm(new EmpleadosType(), $entity, array(
            'action' => $this->generateUrl('empleados_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Empleados entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Empleados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleados entity.');
        }

        $originalPassword = $entity->getPassword(); 
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $plainPassword = $editForm->get('clave')->getData();                    
            if (strlen($plainPassword) != 0)  {  
                //encode the password   
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($entity); //get encoder for hashing pwd later
                $tempPassword = $encoder->encodePassword($entity->getPassword(), $entity->getSalt()); 
                $entity->setPassword($tempPassword);                
            }
            else {
                $entity->setPassword($originalPassword);
            }

            $em->flush();

            return $this->redirect($this->generateUrl('empleados_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:Empleados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Empleados entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Empleados')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Empleados entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('empleados'));
    }

    /**
     * Creates a form to delete a Empleados entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleados_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
