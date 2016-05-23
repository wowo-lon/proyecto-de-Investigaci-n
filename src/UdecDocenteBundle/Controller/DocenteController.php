<?php

namespace UdecDocenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Udec\HomeBundle\Entity\Grupo;
use Udec\HomeBundle\Entity\Proyecto;

class DocenteController extends Controller
{
    public function indexAction()
    {
    	$user = $this->getUser();
    	$em = $this->getDoctrine()->getManager();

        $grupos = $em->getRepository('UdecHomeBundle:Grupo')->findByLider($user);

        return $this->render('UdecDocenteBundle:Docente:index.html.twig', array('grupos'=>$grupos));
    }

    public function showGrupoAction(Grupo $grupo)
    {
        return $this->render('grupo/show.html.twig', array(
            'grupo' => $grupo,
        ));
    }

    public function proyectosAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $proyectos = $em->getRepository('UdecHomeBundle:Proyecto')->findByDirector($user);

        return $this->render('UdecDocenteBundle:Docente:proyectos.html.twig', array('proyectos'=>$proyectos));
    }
}
