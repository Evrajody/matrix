<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
   /**
    * @Route("/utilisateur",  name="utilisateur")
    */
    public function index(UtilisateurRepository $userRepo): Response
    {

        $allUsers = $userRepo->findAll();

        return $this->render('utilisateur/utilisateur.html.twig', compact("allUsers"));
    }
}
