<?php

namespace Udec\HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Udec\HomeBundle\Entity\Grupo;
use Udec\HomeBundle\Entity\LineaInvestigacion;
use Udec\HomeBundle\Form\GrupoType;

/**
 * Grupo controller.
 *
 */
class GrupoController extends Controller
{
    /**
     * Lists all Grupo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $grupos = $em->getRepository('UdecHomeBundle:Grupo')->findAll();
        
        return $this->render('grupo/index.html.twig', array(
            'grupos' => $grupos,
        ));
    }

    /**
     * Creates a new Grupo entity.
     *
     */
    public function newAction(Request $request)
    {
        $grupo = new Grupo();
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT u from UdecHomeBundle:User u 
            join u.grupo g'
        );
        $lideres = $query->getResult();
        $users = $em->getRepository('UdecHomeBundle:User')->findAll();
        
        for ($i=0; $i < count($users); $i++) { 
            for ($j=0; $j < count($lideres) ; $j++) { 
                if($users[$i]->getId() == $lideres[$j]->getId()){
                    unset($users[$i]);
                    break;
                }
            }
        }
         
        $form = $this->createForm('Udec\HomeBundle\Form\GrupoType', $grupo);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($grupo);
            $em->flush();

            return $this->redirectToRoute('grupo_show', array('id' => $grupo->getId()));
        }

        return $this->render('grupo/new.html.twig', array(
            'grupo' => $grupo,
            'form' => $form->createView(),
            'users' => $users,
        ));
    }

    /**
     * Finds and displays a Grupo entity.
     *
     */
    public function showAction(Grupo $grupo)
    {
        $deleteForm = $this->createDeleteForm($grupo);

        return $this->render('grupo/show.html.twig', array(
            'grupo' => $grupo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Grupo entity.
     *
     */
    public function editAction(Request $request, Grupo $grupo)
    {
        $deleteForm = $this->createDeleteForm($grupo);
        $editForm = $this->createForm('Udec\HomeBundle\Form\GrupoType', $grupo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grupo);
            $em->flush();

            return $this->redirectToRoute('grupo_edit', array('id' => $grupo->getId()));
        }

        return $this->render('grupo/edit.html.twig', array(
            'grupo' => $grupo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Grupo entity.
     *
     */
    public function deleteAction(Request $request, Grupo $grupo)
    {
        $form = $this->createDeleteForm($grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($grupo);
            $em->flush();
        }

        return $this->redirectToRoute('grupo_index');
    }

    /**
     * Creates a form to delete a Grupo entity.
     *
     * @param Grupo $grupo The Grupo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Grupo $grupo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grupo_delete', array('id' => $grupo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
