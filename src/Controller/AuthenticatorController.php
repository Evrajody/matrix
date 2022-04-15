<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticatorController extends AbstractController
{
   /**
    * @Route("/", name="autenticator")
    */
    public function index(): Response
    {
        return $this->render('authenticator/autenticate.html.twig', [
            'controller_name' => 'AuthenticatorController',
        ]);
    }



}
