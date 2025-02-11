<?php

namespace App\Controller;

use App\Repository\QuizzRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function quizz(QuizzRepository $repository)
    {
        $quiz_name = $repository->findAll();
        return $this->render('homepage/index.html.twig', ['names' => $quiz_name]);
    }
}
