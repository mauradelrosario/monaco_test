<?php
function isMultipleOf($number): string {
    if ($number % 3 == 0 && $number % 5 == 0) {
        return "JoliChat";
    } elseif ($number % 3 == 0) {
        return "Joli";
    } elseif ($number % 5 == 0) {
        return "Chat";
    }
    return $number;
}

function jolichat(int $maxNumber): void {
    for ($i = 1; $i <= $maxNumber; $i++) {
       echo isMultipleOf($i) . "\n";
    }
}

jolichat(101);
?>