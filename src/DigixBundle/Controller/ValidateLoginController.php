<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class WallController extends Controller{

     public function displayWallAction(){
     	$session=$this->getRequest()->getSession();
     	$firstName=ucwords($session->get('firstName'));
     	$lastName=ucwords($session->get('lastName'));
     	
     	$accountName=$firstName.' '.$lastName;

        if($session->get('sesiune'))
            echo 'da';
        else
            echo 'nu';
        return new Response();

        /*return $this->render('DigixBundle:Wall:wall.html.twig',array('name'=>$accountName,
        															 'website' => $session->get('sesiune'),
        															 'age' => $session->get('age'),
                                                                     'profilepic' => $session->get('profilepic')));*/
     	//return $this->redirectToRoute('digix_wall');
     }
}