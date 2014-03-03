<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name, $creator)
    {
    	if ($creator == null) {
    		$this->get('session')->getFlashBag()->add(
            'notice',
            'Falta el parámetro autor'
        );
    		return $this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name, 'yomismo' => $creator));
    	} else {
        return $this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name, 'yomismo' => $creator));
    	}
    }
}
