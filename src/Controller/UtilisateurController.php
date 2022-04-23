<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
   /**
    * @Route("/utilisateur",  name="utilisateur")
    */
    public function index(UtilisateurRepository $userRepo): Response
    {

        $this->addFlash('success',  'Utilisateur modifié avec succès !! ');
        $allUsers = $userRepo->findAll();

        return $this->render('utilisateur/utilisateur.html.twig', compact("allUsers"));
    }


    /**
    *  @Route("/add/utilisateur",  name="add_utilisateur")
    *  @Route("/edit/{id}/utilisateur", name="edit_utilisateur")
    */
    public function addUtilisateur(Utilisateur $user = null,   Request  $request, EntityManagerInterface $entityManager): Response 
    {

        // On veut faire une mise a jour !! 
        if ($user) {

            $userForm = $this->createForm(UtilisateurType::class, $user);
            $userForm->handleRequest($request);
            if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success',  'Utilisateur modifié avec succès !! ');
            return $this->redirectToRoute('utilisateur');
            }


        }  else {
            // On veut faire une insertion
            $user = new Utilisateur();
            $userForm = $this->createForm(UtilisateurType::class, $user);
            $userForm->handleRequest($request);

            if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success',  'Utilisateur creer avec succès !! ');
            return $this->redirectToRoute('utilisateur');
            }

        }


        return $this->render('utilisateur/add_utilisateur.html.twig', [
            "userForm" => $userForm->createView(),
        ]);
    }


    /**
    * @Route("/see/{id}/profile",  name="profile_utilisateur")
    */
    public function showUtilisateur(Utilisateur $user): Response 
    {
        

        return $this->render('utilisateur/see_utilisateur.html.twig', compact('user'));
    }
}
