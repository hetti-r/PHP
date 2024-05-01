<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemperatureController extends AbstractController
{

    #[Route('/temperature', name: "temperature")]
    public function getTemperature(Request $request)
    {
        //$request = Request::createFromGlobals();
        $temp = $request->query->get('temperature');
        if (!is_numeric($temp)) { // Return an error if the temperature is invalid
            return new Response("Error: Temperature must be a number", 400);
        } else {
            $fahrenheit = ($temp * 9 / 5) + 32; // Return the converted temperature
            $celcius = ($temp - 32) / 1.8;
            return new Response($temp . " celsius in Fahrenheit : " . $fahrenheit . " and " . $temp . " Fahrenheit in Celcius: " . $celcius);
        }
    }
}
