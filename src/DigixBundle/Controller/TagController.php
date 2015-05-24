<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

use DigixBundle\Entity\TagDB;

class TagController extends Controller{

     public function tagAction(Request $request){
     	$session=$this->getRequest()->getSession();

        $photos=array();
        $photos=$session->get('photos');

        $tagObject = new TagDB();
        
        for($i='0';$i<(string)count($photos);$i++){
            $tag=$request->request->get($i);
            if($tag){
                echo $tag.'-> '; 
                echo '<a href="'.$photos[(int)$i].'">See</a><br>';
                $em = $this->getDoctrine()->getManager(); 

                //$tagObject->setId((int)$i);
                $tagObject->setTagList($tag);
                $tagObject->setUrl($photos[(int)$i]);

                $em->persist($tagObject);
                $em->flush();
                $em->clear();
            }

        }
        return $this->redirectToRoute('digix_wall'); 
       
     	
     	return new Response();
     	//return $this->redirectToRoute('digix_wall');
     }
}