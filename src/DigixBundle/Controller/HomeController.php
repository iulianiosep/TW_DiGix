<?php

namespace DigixBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DigixBundle\Form\Type\RegistrationType;
use DigixBundle\Form\Model\Registration;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller{
	
	public function displayAction(){
		return $this->render('DigixBundle:HomePage:index.html.twig');
	}
}