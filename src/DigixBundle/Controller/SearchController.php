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
        $option=$request->request->get('selectBox');
        $em = $this->getDoctrine()->getManager();
        

        $photosArray=array();
        $videosArray=array();

        if(strcmp($option,'photos')==0){
            $photosArray=$this->getItems($tagList,'photo');
        }
        
        if(strcmp($option,'videos')==0){
            $videosArray=$this->getItems($tagList,'video');
        }

        if(strcmp($option,'all')==0){
            $photosArray=$this->getItems($tagList,'photo');
            $videosArray=$this->getItems($tagList,'video');
        }

     	return $this->render('DigixBundle:Search:searchpage.html.twig',array('photosArray' => $photosArray,
                                                                             'videosArray' => $videosArray));
                                                                       
     	return new Response();
     }

     public function getItems($tagList,$option){
        $em = $this->getDoctrine()->getManager();

        $result=$em->getRepository('DigixBundle\Entity\TagDB')->createQueryBuilder('tag')
            ->where("tag.tagList LIKE :tags AND tag.type=:option")
            ->setParameter('tags', '%'.$tagList.'%')
            ->setParameter('option',$option)
            ->getQuery()
            ->getResult();

        $resultArray=array();
        for($i=0;$i<count($result);$i++)
                array_push($resultArray,$result[$i]->getUrl());

        return $resultArray;
     }

     public function displaySearchAction(){
        return $this->render('DigixBundle:Search:searchpage.html.twig',array('photosArray' => array(),
                                                                             'videosArray' => array()));
     }
}