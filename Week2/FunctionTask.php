<?php
function checkAge ($age) {
    if (is_numeric($age) && $age >= 18) {
        return TRUE;
    }
    return FALSE;
}

print "Age 25 " . checkAge(25) . "\n";

function boolToString ($bool) {
    if ($bool) {
        return 'TRUE';
    }
    return 'FALSE';
}
print "Age 25 " . boolToString(checkAge(25)) . "\n";