<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Symfony\Component\HttpFoundation\RedirectResponse;

require 'LoginCredentials.php';

class FacebookController extends Controller{

    function indexAction(){
        $loginCredentials=new \LoginCredentials();

        $session=$this->getRequest()->getSession();
        $session->start();

        FacebookSession::setDefaultApplication($loginCredentials->facebookAppId, $loginCredentials->facebookAppSecret);

        //$url=;'http://localhost'.$this->generateUrl('default_controller');        
        $helper = new FacebookRedirectLoginHelper('http://localhost/digix/web/app_dev.php/facebook-login');

        try{
            $session=$helper->getSessionFromRedirect();
        }catch(Excetion $e){

        }

        if($session){

            $this->getRequest()->getSession()->set('fbsession',$session);
            $this->getRequest()->getSession()->set('credentials',array('appId'=>$loginCredentials->facebookAppId,'appSecret'=>$loginCredentials->facebookAppSecret));
            $request = new FacebookRequest($session, 'GET', '/me/photos');
            $response = $request->execute();
            $photosResponse=$response->getGraphObject();

            //var_dump($photosResponse);
            $photosArray=$photosResponse->asArray();
            $photos=array();
            foreach($photosArray['data'] as $photoItem){
                array_push($photos,$photoItem->images[0]->source);
                //echo "<img src='".$photoItem->images[0]->source."' width='500' height='auto'/>";
            }
            $this->getRequest()->getSession()->set('photos',$photos);
            
            return $this->redirectToRoute('digix_wall');

        }
        else{
            //echo "<a href=".$helper->getLoginUrl().">.Login with fb</a><br>";
            return $this->redirect($helper->getLoginUrl());
            //header("Location: ".$helper->getLoginUrl());
        }

        return new Response();
    }
}