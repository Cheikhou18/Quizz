<?php

namespace App\Controller\Admin;

use App\Form\DashboardType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function index(Request $request, UserRepository $UserRepository): Response
    {
        $users = $UserRepository->findAll();

        return $this->render('admin/dashboard.html.twig', [
            'users' => $users
        ]);
    }
}
