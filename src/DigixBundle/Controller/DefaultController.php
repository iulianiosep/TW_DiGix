<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    public function indexAction()
    {
        // Set session value
        $session = $this->getRequest()->getSession();
        $session->set('test', 1);

        // Get session value
        $value = $session->get('test');

        // Set cookie value
        $response = new Response();
        $cookie = new Cookie('test', 1, time()+3600);
        $response->headers->setCookie($cookie);

        // Get cookie value
        $this->getRequest()->cookies->get('test');
    }
}