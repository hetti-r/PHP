<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class HelloWorldController extends AbstractController
{

    #[Route('/', name: "hello_world")]
    public function helloWorld(LoggerInterface $logger)
    {
        $logger->info('I am logger');

    }
}
