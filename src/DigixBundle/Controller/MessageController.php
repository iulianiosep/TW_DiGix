<?php
namespace DigixBundle\Controller;
use Facebook\GraphUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

	class MessageController extends Controller{
		function indexAction(){
			return $this->render('DigixBundle:Modal:modal.html.twig');
		}
	}