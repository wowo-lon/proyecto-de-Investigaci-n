<?php

namespace Udec\HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Udec\HomeBundle\Entity\Proyecto;
use Udec\HomeBundle\Form\ProyectoType;

use Udec\HomeBundle\Entity\Aporte;
use Udec\HomeBundle\Form\AporteType;

/**
 * Proyecto controller.
 *
 */
class ProyectoController extends Controller
{
    /**
     * Lists all Proyecto entities.
     *
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('UdecHomeBundle:Proyecto');

        $query = $repository->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery();
         
        $proyectos = $query->getResult();

        return $this->render('proyecto/index.html.twig', array(
            'proyectos' => $proyectos,
        ));
    }

    public function buscarProyectosAction(Request $request)
    {

        $busqueda = $request->get('busqueda');
        $repository = $this->getDoctrine()->getRepository('UdecHomeBundle:Proyecto');
 
        $query = $repository->createQueryBuilder('p')
            ->where('p.nombre like :nombre')
            ->setParameter('nombre', '%'.$busqueda.'%')
            ->orderBy('p.nombre', 'ASC')
            ->getQuery();
         
        $proyectos = $query->getResult();

        //$proyectos = $em->getRepository('UdecHomeBundle:Proyecto')->findByNombre($busqueda);

        return $this->render('proyecto/index.html.twig', array(
            'proyectos' => $proyectos,
            'busqueda' => $busqueda,
        ));
    }

    /**
     * Creates a new Proyecto entity.
     *
     */
    public function newAction(Request $request)
    {
        $proyecto = new Proyecto();
        $form = $this->createForm('Udec\HomeBundle\Form\ProyectoType', $proyecto);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT u from UdecHomeBundle:User u 
            join u.proyectos g'
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

        if ($form->isSubmitted() && $form->isValid()) {
            $proyecto->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();
            return $this->redirectToRoute('proyecto_show', array('id' => $proyecto->getId()));
        }

        return $this->render('proyecto/new.html.twig', array(
            'proyecto' => $proyecto,
            'form' => $form->createView(),
            'users' => $users,
        ));
    }

    /**
     * Finds and displays a Proyecto entity.
     *
     */
    public function showAction(Proyecto $proyecto)
    {
        $deleteForm = $this->createDeleteForm($proyecto);
        $em = $this->getDoctrine()->getManager();

        $aportes = $em->getRepository('UdecHomeBundle:Aporte')->findByProyecto($proyecto);

        return $this->render('proyecto/show.html.twig', array(
            'proyecto' => $proyecto,
            'delete_form' => $deleteForm->createView(),
            'aportes' => $aportes,
        ));
    }

    public function editarIndexAction(Request $request, Proyecto $proyecto)
    {
        $deleteForm = $this->createDeleteForm($proyecto);

        $editForm = $this->createForm('Udec\HomeBundle\Form\ProyectoType', $proyecto);
        $editForm->remove("documento");
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $proyecto->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();

            return $this->redirectToRoute('proyecto_edit', array('id' => $proyecto->getId()));
        }

        return $this->render('proyecto/editar.html.twig', array(
            'proyecto' => $proyecto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editarDocumentoAction(Request $request, Proyecto $proyecto)
    {
        $deleteForm = $this->createDeleteForm($proyecto);

        $editForm = $this->createForm('Udec\HomeBundle\Form\ProyectoType', $proyecto);
        $editForm->remove("fechaInicio");
        $editForm->remove("nombre");
        $editForm->remove("resumen");
        $editForm->remove("director");
        $editForm->remove("participantes");
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $proyecto->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();

            return $this->redirectToRoute('proyecto_edit_index', array('id' => $proyecto->getId()));
        }

        return $this->render('proyecto/documento.html.twig', array(
            'proyecto' => $proyecto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Proyecto entity.
     *
     */
    public function editAction(Request $request, Proyecto $proyecto)
    {
        $deleteForm = $this->createDeleteForm($proyecto);

        $editForm = $this->createForm('Udec\HomeBundle\Form\ProyectoType', $proyecto);
        $editForm->remove("documento");
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();
           
            return $this->redirectToRoute('proyecto_edit', array('id' => $proyecto->getId()));
        }

        return $this->render('proyecto/edit.html.twig', array(
            'proyecto' => $proyecto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function entregasAction(Request $request, Proyecto $proyecto)
    {
        $em = $this->getDoctrine()->getManager();

        $aportes = $em->getRepository('UdecHomeBundle:Aporte')->findByProyecto($proyecto);

        return $this->render('proyecto/aportes.html.twig', array(
            'proyecto' => $proyecto,
            'aportes' => $aportes,
        ));
    }

    public function newAporteAction(Request $request, Proyecto $proyecto)
    {
        $aporte = new Aporte();
        $editForm = $this->createForm('Udec\HomeBundle\Form\AporteType', $aporte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $aporte->setProyecto($proyecto);
            $aporte->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($aporte);
            $em->flush();
           
            return $this->redirectToRoute('proyecto_editar_aportes', array('id' => $proyecto->getId()));
        }

        return $this->render('proyecto/newAporte.html.twig', array(
            'proyecto' => $proyecto,
            'aporte' => $aporte,
            'edit_form' => $editForm->createView(),
        ));

    }

    
    public function deleteAporteAction(Request $request, Aporte $aporte)
    {
        $aporte->removeUpload();
        $em = $this->getDoctrine()->getManager();
        $em->remove($aporte);
        $em->flush();
        
        return $this->redirectToRoute('proyecto_editar_aportes', array('id' => $aporte->getProyecto()->getId()));
    }

    /**
     * Deletes a Proyecto entity.
     *
     */
    public function deleteAction(Request $request, Proyecto $proyecto)
    {
        $form = $this->createDeleteForm($proyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $proyecto->removeUpload();
            $em = $this->getDoctrine()->getManager();
            $em->remove($proyecto);
            $em->flush();
        }

        return $this->redirectToRoute('proyecto_index');
    }

    /**
     * Creates a form to delete a Proyecto entity.
     *
     * @param Proyecto $proyecto The Proyecto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proyecto $proyecto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyecto_delete', array('id' => $proyecto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
