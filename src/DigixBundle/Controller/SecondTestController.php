<?php

namespace DigixBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

class SecondTestController extends Controller
{
    public function indexAction()
    {
        $name=$this->getRequest()->getSession()->get('name');
        echo $name;
        return new Response();
    }
}