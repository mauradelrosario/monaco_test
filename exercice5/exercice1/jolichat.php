<?php
function jolichat($number) : string {
    for ($i = 1; $i <= 101; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            return "JoliChat";
        } elseif ($i % 3 == 0) {
            return "Joli";
        } elseif ($i % 5 == 0) {
            return "Chat";
        }
        return $number;
    }
}
?>