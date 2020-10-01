<?php

namespace A\ABundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AABundle:Default:index.html.twig');
    }
}
