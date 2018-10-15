<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class MovieController extends ApiController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index()
    {
        return $this->respond([
            [
                'title' => 'The Princess Bride',
                'count' => 0
            ]
        ]);
        /*return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);*/
    }
}
