<?php

$number1 = 3;
$number2 = 6;

$sum = 0;

for ($i = min($number1, $number2) ; $i <= max($number1, $number2) ; $i++)
{
$sum += $i; 
} 


print $sum;