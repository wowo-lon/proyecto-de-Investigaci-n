<?php

namespace Udec\HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Udec\HomeBundle\Entity\Semillero;
use Udec\HomeBundle\Form\SemilleroType;

/**
 * Semillero controller.
 *
 */
class SemilleroController extends Controller
{
    /**
     * Lists all Semillero entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $semilleros = $em->getRepository('UdecHomeBundle:Semillero')->findAll();

        return $this->render('semillero/index.html.twig', array(
            'semilleros' => $semilleros,
        ));
    }

    /**
     * Creates a new Semillero entity.
     *
     */
    public function newAction(Request $request)
    {
        $semillero = new Semillero();
        $form = $this->createForm('Udec\HomeBundle\Form\SemilleroType', $semillero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($semillero);
            $em->flush();

            return $this->redirectToRoute('semillero_show', array('id' => $semillero->getId()));
        }

        return $this->render('semillero/new.html.twig', array(
            'semillero' => $semillero,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Semillero entity.
     *
     */
    public function showAction(Semillero $semillero)
    {
        $deleteForm = $this->createDeleteForm($semillero);

        return $this->render('semillero/show.html.twig', array(
            'semillero' => $semillero,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Semillero entity.
     *
     */
    public function editAction(Request $request, Semillero $semillero)
    {
        $deleteForm = $this->createDeleteForm($semillero);
        $editForm = $this->createForm('Udec\HomeBundle\Form\SemilleroType', $semillero);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($semillero);
            $em->flush();

            return $this->redirectToRoute('semillero_edit', array('id' => $semillero->getId()));
        }

        return $this->render('semillero/edit.html.twig', array(
            'semillero' => $semillero,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Semillero entity.
     *
     */
    public function deleteAction(Request $request, Semillero $semillero)
    {
        $form = $this->createDeleteForm($semillero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($semillero);
            $em->flush();
        }

        return $this->redirectToRoute('semillero_index');
    }

    /**
     * Creates a form to delete a Semillero entity.
     *
     * @param Semillero $semillero The Semillero entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Semillero $semillero)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('semillero_delete', array('id' => $semillero->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
