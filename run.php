<?php declare(strict_types=1);

require_once __DIR__ . '/sum.php';

/**
 * @param string $num1
 * @param string $num2
 * @param string $expectedSum
 */
function runExample(string $num1, string $num2, string $expectedSum)
{
    $actualSum = bigSum($num1, $num2);

    $isEquals = $actualSum === $expectedSum;

    $maxLen = max(strlen($num1), strlen($num2), strlen($actualSum)) + 11;
    $equals = $isEquals ? "\033[0;32m✔\033[0m" : "\033[0;31m✗\033[0m";

    echo "\nTest\n";
    printf("%{$maxLen}s\n", $num1);
    printf("%{$maxLen}s\n", $num2);
    printf("%{$maxLen}s\n", "= $actualSum");
    printf("%{$maxLen}s\n", "Expected $equals $expectedSum");
}

runExample(
    '0',
    '0',
  '0'
);

runExample(
  '2',
  '3',
  '5'
);

runExample(
  '1234567890',
  '3',
  '1234567893'
);

runExample(
  '3',
  '1234567890',
  '1234567893'
);

runExample(
  '9000000000000000001',
  '9000000000000000002',
  '18000000000000000003'
);