<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ReponseRepository;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\QuizzRepository;


class CreateQuizController extends AbstractController
{
    #[Route("/quizz", name: "quizz.create")]
    function index(Request $request,): Response
    {
        // return $this->redirect("/");
        // dd($request);
        // return new Response('Hello ' . $request->query->get('name', 'Pierre'));

        return $this->render('create_quiz/index.html.twig');
    }
}
