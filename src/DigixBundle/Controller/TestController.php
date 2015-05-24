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


class FacebookController extends Controller{

    function indexAction(){
        $session=$this->getRequest()->getSession();
        $session->start();

        FacebookSession::setDefaultApplication('1444263235872096', 'c581bcaab7a3c478f5ec94c2f564eee5');

        $url='http://localhost'.$this->generateUrl('default_controller');
        //$helper = new FacebookRedirectLoginHelper('http://localhost/proiect/digix/web/app_dev.php/wall');
        
        $helper = new FacebookRedirectLoginHelper($url);
        try{
            $session=$helper->getSessionFromRedirect();
        }catch(Excetion $e){

        }

        if($session){
            
            /*$request = new FacebookRequest($session, 'GET', '/me/albums');            
            $response = $request->execute();
            $albums=$response->getGraphObject();

            echo '<br><br><br>';
            $albarray=$albums->asArray();
            foreach($albarray['data'] as $album){
                echo $album->link;
                //var_dump($album);
                echo '<br><br><br>';
            }*/

            $this->getRequest()->getSession()->set('fbsession',$session);
             $request = new FacebookRequest($session, 'GET', '/me/photos');            
            $response = $request->execute();
            $photosResponse=$response->getGraphObject();

            echo '<br><br><br>';
            $photosArray=$photosResponse->asArray();
            foreach($photosArray['data'] as $photoItem){
                //echo $photoItem->link;
                //var_dump($album);
                echo "<img src='".$photoItem->images[0]->source."' width='500' height='auto'/>";
                //var_dump($photoItem->images);
                //var_dump($photoItem);
                echo '<br><br><br>';
            }

            
            return $this->redirectToRoute('digix_wall');
            //var_dump($albums);

                //echo "<img src='{photo['source']}' />";
                
            //print_r($photos);
            //echo '<br>'.$user->getId();
            //echo $photos->getId();
            //var_dump($photos);
            //echo $user->getName();
            //var_dump($user_profile);
            //$graph = $response->getGraphObject(GraphUser::className());
            //$session->set('name',$graph->getName());
            //$this->getRequest()->getSession()->set('name',$graph->getName());
            //echo $graph->getName().'<br>';
        }
        else{
            //echo "<a href=".$helper->getLoginUrl().">.Login with fb</a><br>";
            return $this->redirect($helper->getLoginUrl());
        }

        return new Response();
    }
}