<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Formula1Controller extends AbstractController
{
    #[Route('/', name: 'app_formula1')]
    public function index(CallApiService $callApiService): Response
    {
        //dump($callApiService->getRacesIn2024()); //call the method
        return $this->render('formula1/index.html.twig', [
            'data' => $callApiService->getRacesIn2024()
        ]);
    }
}
