<?php

namespace Udec\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UdecHomeBundle:Default:index.html.twig');
    }
}
