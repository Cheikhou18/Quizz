<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserManagementController extends AbstractController
{
    #[Route('/profile/edit/{id}', name: 'admin.profile.edit')]
    public function index(int $id, UserRepository $userRepository): Response
    {
        $currentUser = $this->getUser();

        if (!in_array('ROLE_ADMIN', $currentUser->getRoles())) {
            return $this->redirectToRoute('profile.edit');
        }

        $user = $userRepository->findBy(['id' => $id]);

        if (!$user) {
            $this->addFlash('danger', "The user doesn't exist.");
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('admin/edit_profile.html.twig', [
            'user' => $user
        ]);
    }
}
