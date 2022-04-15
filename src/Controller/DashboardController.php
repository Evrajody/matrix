<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
   /**
    * @Route("/dashboard",  name="main_dashboard")
    */
    public function index(): Response
    {
        return $this->render('dashboard/main_dashboard.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
