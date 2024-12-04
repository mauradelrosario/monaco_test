<?php
function isRotation($s1, $s2): bool {
    if (strlen($s1) !== strlen($s2) || empty($s1)) {
        return false;
    }

   return strpos($s1 . $s1, $s2);
}
?>