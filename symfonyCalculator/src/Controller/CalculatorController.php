<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{

    #[Route('/', name: "calculator")]
    public function index(Request $request, LoggerInterface $logger): Response//use logger to log and show result messages
    {
        $logger->info('I have the logger');
        $logger->error('An error occurred');

        //get input names to variables
        $number1 = $request->query->get('number1');
        $number2 = $request->query->get('number2');
        $calculation = $request->query->get('calculation');

        $message = '';
        $result = null;

        if ($number1 !== '' && $number2 !== '') { //check that both numbers are given and are not strings
            switch ($calculation) {
                case '+':
                    $result = $number1 + $number2;
                    break;
                case '-':
                    $result = $number1 - $number2;
                    break;
                case '*':
                    $result = $number1 * $number2;
                    break;
                case '/':
                    if ($number2 == 0) { //check if number is zero
                        $message = 'Can not divide by zero.';
                    } else {
                        $result = $number1 / $number2;
                    }
                    break;
                default:
                    $message = 'Error. Try again.';
                    break;
            }

        } else {
            $message = 'You need to give two numbers.';
        }

        return $this->render('calculator/index.html.twig', [
            'result' => $result, //get input names to variables
            'message' => $message,
        ]);
    }
}
