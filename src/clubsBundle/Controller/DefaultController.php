<?php

namespace clubsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@clubsBundle/Default/index.html.twig');
    }
}
