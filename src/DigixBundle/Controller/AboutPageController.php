<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AboutPageController extends Controller{

     public function displayAboutPageAction(){
        return $this->render('DigixBundle:About:about.html.twig');
     }

}