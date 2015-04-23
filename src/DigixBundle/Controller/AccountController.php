<?php

namespace DigixBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use DigixBundle\Form\Type\RegistrationType;
use DigixBundle\Form\Model\Registration;

class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'DigixBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(){
        return new Response('<html><body><p>Am ajuns in create</p></html></body>');
    }
}