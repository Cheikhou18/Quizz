<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ReponseRepository;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\QuizzRepository;

class FindQuizController extends AbstractController
{
    #[Route("/quizz-{id}", name: "quizz.find")]
    public function quizz(Request $request, QuizzRepository $repository, ReponseRepository $repository2, QuestionRepository $repository3): Response
    {
        $quiz_name = $repository->findAll();
        //  dd($quiz_name);
        $question = $repository3->findAll();

        $allquizzes = $repository2->findAll();
        // dd($allquizzes);
        return $this->render('find_quiz/index.html.twig', ['reponses' => $allquizzes, 'names' => $quiz_name, 'questions' => $question]);
    }
}
