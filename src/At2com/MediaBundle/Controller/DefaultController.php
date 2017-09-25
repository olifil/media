<?php

namespace At2com\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('At2comMediaBundle:Default:index.html.twig');
    }
}
