# Initialize 
```sh
composer install
```

# Debug the header output
```sh
$ php debug.php
```

```
explode:
{
    "X-With-Leading-Space": " Test: 123",
    "X-With-Leading-Space-And-Colon": " Test: 123",
    "X-Without-Leading-Space": "Test-Header",
    "Content-Type": " application\/x-www-form-urlencoded",
    "Cache-Control": " private, must-revalidate"
}

explode + ltrim:
{
    "X-With-Leading-Space": "Test: 123",
    "X-With-Leading-Space-And-Colon": "Test: 123",
    "X-Without-Leading-Space": "Test-Header",
    "Content-Type": "application\/x-www-form-urlencoded",
    "Cache-Control": "private, must-revalidate"
}

preg_split:
{
    "X-With-Leading-Space": "Test: 123",
    "X-With-Leading-Space-And-Colon": "Test: 123",
    "X-Without-Leading-Space": "Test-Header",
    "Content-Type": "application\/x-www-form-urlencoded",
    "Cache-Control": "private, must-revalidate"
}
```

# Run benchmark
```sh
$ XDEBUG_MODE=off ./vendor/bin/phpbench run benchmark --report=aggregate
```

### Result Example
```
PHPBench (1.3.1) running benchmarks... #standwithukraine
with configuration file: <REDACTED>/open-source/github.com/RafaelKr/php-header-split-bench/phpbench.json
with PHP version 8.2.23, xdebug ✔, opcache ❌

\Benchmark\HeaderSplitBench

    benchExplode............................I9 - Mo0.503μs (±1.61%)
    benchExplodeLtrim.......................I9 - Mo0.619μs (±1.68%)
    benchPregSplit..........................I9 - Mo0.584μs (±1.30%)

Subjects: 3, Assertions: 0, Failures: 0, Errors: 0
+------------------+-------------------+-----+--------+-----+-----------+---------+--------+
| benchmark        | subject           | set | revs   | its | mem_peak  | mode    | rstdev |
+------------------+-------------------+-----+--------+-----+-----------+---------+--------+
| HeaderSplitBench | benchExplode      |     | 100000 | 10  | 723.408kb | 0.503μs | ±1.61% |
| HeaderSplitBench | benchExplodeLtrim |     | 100000 | 10  | 723.424kb | 0.619μs | ±1.68% |
| HeaderSplitBench | benchPregSplit    |     | 100000 | 10  | 723.408kb | 0.584μs | ±1.30% |
+------------------+-------------------+-----+--------+-----+-----------+---------+--------+

```
