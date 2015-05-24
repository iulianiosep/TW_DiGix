<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use DigixBundle\Entity\TagDB;

class SearchController extends Controller{

     public function searchAction(Request $request){
     	$session=$this->getRequest()->getSession();
        
        $tagList=$request->request->get('tag_list');
        $em = $this->getDoctrine()->getManager();
        
        $result=$em->getRepository('DigixBundle\Entity\TagDB')->createQueryBuilder('tag')
            ->where('tag.tagList LIKE :tags')
            ->setParameter('tags', '%'.$tagList.'%')
            ->getQuery()
            ->getResult();

        $photosArray=array();
        for($i=0;$i<count($result);$i++)
            array_push($photosArray,$result[$i]->getUrl());   

     	return $this->render('DigixBundle:Search:searchpage.html.twig',array('photosArray' => $photosArray));
     	return new Response();
     	//return $this->redirectToRoute('digix_wall');
     }

     public function displaySearchAction(){
        return $this->render('DigixBundle:Search:searchpage.html.twig',array('photosArray' => array()));
     }
}