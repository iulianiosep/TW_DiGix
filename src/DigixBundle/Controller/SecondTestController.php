<?php

namespace DigixBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class SecondTestController extends Controller
{
    public function indexAction(Request $request)
    {
        $sesiune=$request->getSession();

        echo $sesiune->get('firstName').' '.$sesiune->get('lastName');


        return new Response();
    }
}