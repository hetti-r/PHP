<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PalindromeController extends AbstractController
{

    public $answer = "";

    #[Route('/pal', name: "palindrome_checker")]
    public function Palindrome(Request $request)
    {
        $string = $request->query->get('word');

        if ($string) {if (strrev($string) == $string) {
            echo "It's a palindrome.";
        } else {
            echo "It's not a palindrome.";
        }}
        return $this->render('palindrome_checker/index.html.twig');
    }
}
