<?php

$fruits = array("Apple", "Banana", "Poisonous Berry", "Strawberry", "Grapes");

print "Today we will eat…\n";

foreach ($fruits as $fruit) 
{

    if  ($fruit == "Poisonous Berry")
    {
        print "Hold on a minute! $fruit is dangerous!";
        break;
    }
    else 
    {
        print "$fruit ... \n";
    }
}