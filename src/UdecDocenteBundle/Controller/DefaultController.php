<?php

namespace UdecDocenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UdecDocenteBundle:Default:index.html.twig');
    }
}
