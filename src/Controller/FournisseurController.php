<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use App\Repository\FournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FournisseurController extends AbstractController
{
    /**
     * @Route("/fournisseur", name="fournisseur")
     */
    public function fournisseur(FournisseurRepository $fournisseurRepo): Response
    {
          
        $allFournisseurs = $fournisseurRepo->findAll();

        return $this->render('fournisseur/fournisseur.html.twig', [
            'allFournisseurs' => $allFournisseurs,
        ]);
    }

    /**
     * @Route("/add/fournisseur", name="add_fournisseur")
     * @Route("/edit/{id}/fournisseur", name="edit_fournisseur")
     */
    public function addFournisseur(Fournisseur $fournisseur =null, Request $request, EntityManagerInterface $manager): Response
    {
        if ($fournisseur) {

            $fournisseurForm = $this->createForm(FournisseurType::class, $fournisseur);
            $fournisseurForm->handleRequest($request);
            if ($fournisseurForm->isSubmitted() && $fournisseurForm->isValid()) {
            $manager->persist($fournisseur);
            $manager->flush();
            $this->addFlash('success',  'Fournisseur modifié avec succès !! ');
            return $this->redirectToRoute('fournisseur');
            }


        }  else {
            // On veut faire une insertion
            $fournisseur = new Fournisseur();
            $fournisseurForm = $this->createForm(FournisseurType::class, $fournisseur);
            $fournisseurForm->handleRequest($request);

            if ($fournisseurForm->isSubmitted() && $fournisseurForm->isValid()) {
            $manager->persist($fournisseur);
            $manager->flush();
            $this->addFlash('success',  'Fournisseur creer avec succès !! ');
            return $this->redirectToRoute('fournisseur');
            }

        }
        return $this->render('fournisseur/add_fournisseur.html.twig', [
            'fournisseurForm' => $fournisseurForm->createView(),

        ]);
    }
}
