<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

require 'phpFlickr.php';

class FlickrController extends Controller{

    function indexAction(){

        $session=$this->getRequest()->getSession();
        //$session->start();

        $flickr = new \phpFlickr('667b9b84fd8e07f7');//new \phpFlickr('4284c33141260b63960135ff627984c8','667b9b84fd8e07f7', true);

        $result = $flickr->people_findByUsername("flavian.gheorghiu");
        $nsid = $result["id"];
        $photos = $flickr->people_getPublicPhotos($nsid, NULL, NULL, 21, 1);
        //$pages = $photos[photos][pages];
        var_dump($photos);

        return new Response();
    }
}