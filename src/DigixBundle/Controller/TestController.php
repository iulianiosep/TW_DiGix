<?php

namespace DigixBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class TestController extends Controller
{
    public function indexAction(Request $request)
    {
        $session=new Session();
        $session->start();
        $session->set('firstName','flvvv');
        $session->set('lastName','gheeee');

        //echo $session->get('lastName').' '.$session->get('firstName');


        return new Response();
    }
}