<?php

namespace DigixBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use DigixBundle\Entity\User;

class RegisterController extends Controller{

     public function registerAction(Request $request){
          $user=new User();

          $firstName=$request->request->get('fname');
          $lastName=$request->request->get('lname');
          $username=$firstName.".".$lastName;
          $email=$request->request->get('email');
          $password=$request->request->get('password');
          $website=$request->request->get('website');
          $age=$request->request->get('age');
          $occupation=$request->request->get('occupation');

          $user->setPassword($password);
          $user->setUsername($username);
          $user->setEmail($email);
          $user->setWebsite($website);
          $user->setAge($age);
          $user->setOccupation($occupation);

          $em = $this->getDoctrine()->getManager();

          $em->persist($user);
          $em->flush();

          return $this->redirectToRoute('digix_homepage');
     }
}