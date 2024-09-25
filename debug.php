<?php

require_once './vendor/autoload.php';

$bench = new \Benchmark\HeaderSplitBench();

echo implode("\n", [
   'explode:',
   json_encode($bench->benchExplode(), JSON_PRETTY_PRINT),
    '',
   'explode + ltrim:',
   json_encode($bench->benchExplodeLtrim(), JSON_PRETTY_PRINT),
    '',
   'preg_split:',
   json_encode($bench->benchPregSplit(), JSON_PRETTY_PRINT),
    ''
]);
