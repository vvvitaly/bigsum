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
    $minLength = $length1 = strlen($num1);
    $maxLength = $length2 = strlen($num2);
    $isSecondLarger = true;

    if ($length1 > $length2) { // make sure length of second number is larger
        $minLength = $length2;
        $maxLength = $length1;
        $isSecondLarger = false;
    }

    $zero = 48; // ord('0')
    $result = '';
    $carry = 0;

    for ($i = 0; $i < $maxLength; $i++) { // calc sum digit by digit from right to left
        $n1 = 0; // if there are no digits in smaller number just add remaining digits of larger number
        if ($i < $minLength) { // both numbers have digits in this position
            $n1 = ord($isSecondLarger ? $num1[$length1 - $i - 1] : $num2[$length2 - $i - 1]) - $zero;
        }
        $n2 = ord($isSecondLarger ? $num2[$length2 - $i - 1] : $num1[$length1 - $i - 1]) - $zero;

        $sum = $n1 + $n2 + $carry;

        $result = chr($sum % 10 + $zero) . $result;
        $carry = (int)($sum / 10);
    }

    if ($carry) {
        $result = chr($carry + $zero) . $result;
    }

    return $result;
}