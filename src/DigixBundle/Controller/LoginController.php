<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use DigixBundle\Entity\User;

class LoginController extends Controller{

     public function checkLoginAction(Request $request){

          $repository=$this->getDoctrine()->getRepository('DigixBundle\Entity\User');
          $username=$request->request->get('login');
          $password=$request->request->get('password');
          $user = $repository->findOneBy(array('username' => $username, 'password' => $password));              

          if($user!=null){
                    $personalData=explode(".",$user->getUsername());
                    $session=$request->getSession();
                    $session->start();
                    $session->set('firstName',$personalData[0]);
                    $session->set('lastName',$personalData[1]);
                    $session->set('website',$user->getWebsite());
                    $session->set('age',$user->getAge());
                    $session->set('profilepic',$user->getUsername().'.jpg');
                    
                    return $this->redirectToRoute('digix_wall');//digix_wall
          }
          else
               return $this->redirectToRoute('digix_homepage');
     }
}