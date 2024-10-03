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
    "X-With-Leading-Space": " Test",
    "X-With-Leading-Space-5": "     Test",
    "X-With-Leading-Space-And-Colon": " Test: 123",
    "X-Without-Leading-Space": "Test-Header",
    "Content-Type": " application\/x-www-form-urlencoded",
    "Cache-Control": " private, must-revalidate"
}

explode + trim:
{
    "X-With-Leading-Space": "Test",
    "X-With-Leading-Space-5": "Test",
    "X-With-Leading-Space-And-Colon": "Test: 123",
    "X-Without-Leading-Space": "Test-Header",
    "Content-Type": "application\/x-www-form-urlencoded",
    "Cache-Control": "private, must-revalidate"
}

explode + ltrim:
{
    "X-With-Leading-Space": "Test",
    "X-With-Leading-Space-5": "Test",
    "X-With-Leading-Space-And-Colon": "Test: 123",
    "X-Without-Leading-Space": "Test-Header",
    "Content-Type": "application\/x-www-form-urlencoded",
    "Cache-Control": "private, must-revalidate"
}

preg_split:
{
    "X-With-Leading-Space": "Test",
    "X-With-Leading-Space-5": "Test",
    "X-With-Leading-Space-And-Colon": "Test: 123",
    "X-Without-Leading-Space": "Test-Header",
    "Content-Type": "application\/x-www-form-urlencoded",
    "Cache-Control": "private, must-revalidate"
}

preg_split one space:
{
    "X-With-Leading-Space": "Test",
    "X-With-Leading-Space-5": "    Test",
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

    benchExplode............................I9 - Mo0.550μs (±2.32%)
    benchExplodeTrim........................I9 - Mo0.684μs (±0.51%)
    benchExplodeLtrim.......................I9 - Mo0.666μs (±0.93%)
    benchPregSplit..........................I9 - Mo0.665μs (±1.07%)
    benchPregSplitOneSpace..................I9 - Mo0.658μs (±0.93%)

Subjects: 5, Assertions: 0, Failures: 0, Errors: 0
+------------------+------------------------+-----+--------+-----+-----------+---------+--------+
| benchmark        | subject                | set | revs   | its | mem_peak  | mode    | rstdev |
+------------------+------------------------+-----+--------+-----+-----------+---------+--------+
| HeaderSplitBench | benchExplode           |     | 100000 | 10  | 721.064kb | 0.550μs | ±2.32% |
| HeaderSplitBench | benchExplodeTrim       |     | 100000 | 10  | 721.080kb | 0.684μs | ±0.51% |
| HeaderSplitBench | benchExplodeLtrim      |     | 100000 | 10  | 721.080kb | 0.666μs | ±0.93% |
| HeaderSplitBench | benchPregSplit         |     | 100000 | 10  | 721.064kb | 0.665μs | ±1.07% |
| HeaderSplitBench | benchPregSplitOneSpace |     | 100000 | 10  | 721.080kb | 0.658μs | ±0.93% |
+------------------+------------------------+-----+--------+-----+-----------+---------+--------+

```
