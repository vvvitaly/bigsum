<?php declare(strict_types=1);

require_once __DIR__ . '/sum.php';

/**
 * @param string $num1
 * @param string $num2
 */
function runExample(string $num1, string $num2)
{
    $expectedSum = bcadd($num1, $num2);
    $actualSum = bigSum($num1, $num2);

    $isEquals = $actualSum === $expectedSum;

    $leftPadding = 10;
    $maxLen = max(strlen($num1), strlen($num2), strlen($actualSum));
    $equals = $isEquals ? "\033[0;32m✔\033[0m" : "\033[0;31m✗\033[0m";

    printf("Test\n");
    printf("%{$leftPadding}s %{$maxLen}s\n", '', $num1);
    printf("%{$leftPadding}s %{$maxLen}s\n", '+', $num2);
    printf("%{$leftPadding}s %{$maxLen}s\n", '=', $actualSum);
    printf("%{$leftPadding}s %{$maxLen}s\n", "Expected $equals", $expectedSum);
}

function randomStr($len) {
    $al = str_split('0123456789');
    $str = '';
    for($i = 0; $i < $len; $i++) {
        do {
            $ch = $al[array_rand($al)];
        } while ($i === 0 && $ch === '0');

        $str .= $ch;
    }

    return $str;
}

runExample(
    '0',
    '0'
);

runExample(
  '2',
  '3'
);

runExample(
  '1234567890',
  '3'
);

runExample(
  '3',
  '1234567890'
);

runExample(
  '123456789',
  '99'
);

runExample(
  '99',
  '123456789'
);

runExample(
  '9000000000000000001',
  '9000000000000000002'
);

// 10 random examples
for ($i = 0; $i < 10; $i++) {
    $num1 = randomStr(random_int(1, 100));
    $num2 = randomStr(random_int(1, 100));

    runExample($num1, $num2);
}