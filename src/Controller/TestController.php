<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    #[Route('/test', methods: ['GET'])]
    public function create()
    {
        dd('i am alive suka');

    }

    #[Route('/product/update', methods: ['GET'])]
    public function update()
    {
        dd('okokok');
    }
}
