<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) return $this->redirectToRoute('home');

        return $this->render('profile/profile.html.twig', [
            'user' => $user,
        ]);
    }
}
