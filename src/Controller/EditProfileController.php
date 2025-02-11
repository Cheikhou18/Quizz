<?php

namespace App\Controller;

use App\Form\EditProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EditProfileController extends AbstractController
{
    #[Route('/profile/edit', name: 'profile.edit')]
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if (!$user) return $this->redirectToRoute('login');

        $form = $this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newPlainPassword = $form->get('password')->getData();
            $newEmail = $form->get('email')->getData();

            $user->setEmail($newEmail);

            if (strlen($newPlainPassword) > 6) {
                $user->setPassword($userPasswordHasher->hashPassword(
                    $user,
                    $newPlainPassword
                ));
            }

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Profile modified successfully');
            return $this->redirectToRoute('profile');
        }

        return $this->render('profile/edit.html.twig', [
            'form' => $form
        ]);
    }
}
