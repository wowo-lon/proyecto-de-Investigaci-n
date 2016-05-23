<?php

namespace Udec\HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Udec\HomeBundle\Entity\LineaInvestigacion;
use Udec\HomeBundle\Form\LineaInvestigacionType;

/**
 * LineaInvestigacion controller.
 *
 */
class LineaInvestigacionController extends Controller
{
    /**
     * Lists all LineaInvestigacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lineaInvestigacions = $em->getRepository('UdecHomeBundle:LineaInvestigacion')->findAll();

        return $this->render('lineainvestigacion/index.html.twig', array(
            'lineaInvestigacions' => $lineaInvestigacions,
        ));
    }

    /**
     * Creates a new LineaInvestigacion entity.
     *
     */
    public function newAction(Request $request)
    {
        $lineaInvestigacion = new LineaInvestigacion();
        $form = $this->createForm('Udec\HomeBundle\Form\LineaInvestigacionType', $lineaInvestigacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lineaInvestigacion);
            $em->flush();

            return $this->redirectToRoute('lineainvestigacion_show', array('id' => $lineaInvestigacion->getId()));
        }

        return $this->render('lineainvestigacion/new.html.twig', array(
            'lineaInvestigacion' => $lineaInvestigacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LineaInvestigacion entity.
     *
     */
    public function showAction(LineaInvestigacion $lineaInvestigacion)
    {
        $deleteForm = $this->createDeleteForm($lineaInvestigacion);

        return $this->render('lineainvestigacion/show.html.twig', array(
            'lineaInvestigacion' => $lineaInvestigacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LineaInvestigacion entity.
     *
     */
    public function editAction(Request $request, LineaInvestigacion $lineaInvestigacion)
    {
        $deleteForm = $this->createDeleteForm($lineaInvestigacion);
        $editForm = $this->createForm('Udec\HomeBundle\Form\LineaInvestigacionType', $lineaInvestigacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lineaInvestigacion);
            $em->flush();

            return $this->redirectToRoute('lineainvestigacion_edit', array('id' => $lineaInvestigacion->getId()));
        }

        return $this->render('lineainvestigacion/edit.html.twig', array(
            'lineaInvestigacion' => $lineaInvestigacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a LineaInvestigacion entity.
     *
     */
    public function deleteAction(Request $request, LineaInvestigacion $lineaInvestigacion)
    {
        $form = $this->createDeleteForm($lineaInvestigacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lineaInvestigacion);
            $em->flush();
        }

        return $this->redirectToRoute('lineainvestigacion_index');
    }

    /**
     * Creates a form to delete a LineaInvestigacion entity.
     *
     * @param LineaInvestigacion $lineaInvestigacion The LineaInvestigacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LineaInvestigacion $lineaInvestigacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lineainvestigacion_delete', array('id' => $lineaInvestigacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
