<?php

namespace DigixBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DigixBundle\Form\Type\RegistrationType;
use DigixBundle\Form\Model\Registration;
use Symfony\Component\HttpFoundation\Response;

class HandleController extends Controller{

	public function createAction(Request $request)
	{
    	$em = $this->getDoctrine()->getManager();

    	$form = $this->createForm(new RegistrationType(), new Registration());

    	$form->handleRequest($request);

    	if ($form->isValid()) {
        	$registration = $form->getData();

        	$em->persist($registration->getUser());
        	$em->flush();

        	return $this->redirectToRoute('digix_welcome');
        	//return new Response('<html><body><p>Adaugat</p></body></html>');
    	}
    	//else
    		//return new Response('<html><body><p>Nu-i bun domnule</p></body></html>');

    	return $this->render(
        	'DigixBundle:Account:register.html.twig',
       		array('form' => $form->createView()));
	}
}