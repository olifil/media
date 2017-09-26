<?php

namespace At2com\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * [indexAction Retourne la vue de l'ensemble des médias]
     * @return [object] [La vue de tous les médias]
     */
    public function indexAction()
    {
        $medias = $this -> get('doctrine.orm.entity_manager')
                        -> getRepository('At2comMediaBundle:Media')
                        -> findAll();

        return $this->render('At2comMediaBundle:Default:index.html.twig', array(
            "medias" => $medias
        ));
    }
}
