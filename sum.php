<?php declare(strict_types=1);

/**
 * Calculate sum of two big numbers
 *
 * @param string $num1
 * @param string $num2
 *
 * @return string
 */
function bigSum(string $num1, string $num2): string
{
    $length1 = strlen($num1);
    $length2 = strlen($num2);

    if ($length1 > $length2) {
        $t = $num1;
        $num1 = $num2;
        $num2 = $t;

        $t = $length1;
        $length1 = $length2;
        $length2 = $t;
    }

    $num1 = strrev($num1);
    $num2 = strrev($num2);

    $zero = 48; // ord('0')
    $result = '';
    $carry = 0;
    for ($i = 0; $i < $length1; $i++) {
        $n1 = ord($num1[$i]) - $zero;
        $n2 = ord($num2[$i]) - $zero;
        $sum = $n1 + $n2 + $carry;

        $result .= chr($sum % 10 + $zero);
        $carry = (int)($sum / 10);
    }

    for ($i = $length1; $i < $length2; $i++) {
        $n = ord($num2[$i]) - $zero;
        $sum = $n + $carry;

        $result .= chr($sum % 10 + $zero);
        $carry = (int)($sum / 10);
    }

    if ($carry) {
        $result .= chr($carry + $zero);
    }

    $result = strrev($result);

    return $result;
}