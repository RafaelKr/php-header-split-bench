<?php

declare(strict_types=1);

namespace Benchmark;

class HeaderSplitBench {
    public array $headers = [
        'X-With-Leading-Space: Test',
        'X-With-Leading-Space-5:     Test',
        'X-With-Leading-Space-And-Colon: Test: 123',
        'X-Without-Leading-Space:Test-Header',
        'Content-Type: application/x-www-form-urlencoded',
        'Cache-Control: private, must-revalidate',
    ];

    public function benchExplode(): array {
        $headers = [];

        foreach ($this->headers as $header) {
            [$headerName, $value] = explode(':', $header, 2);

            $headers[$headerName] = $value;
        }

        return $headers;
    }

    public function benchExplodeTrim(): array {
        $headers = [];

        foreach ($this->headers as $header) {
            [$headerName, $value] = explode(':', $header, 2);
            $value = trim($value);

            $headers[$headerName] = $value;
        }

        return $headers;
    }

    public function benchExplodeLtrim(): array {
        $headers = [];

        foreach ($this->headers as $header) {
            [$headerName, $value] = explode(':', $header, 2);
            $value = ltrim($value);

            $headers[$headerName] = $value;
        }

        return $headers;
    }

    public function benchPregSplit(): array {
        $headers = [];

        foreach ($this->headers as $header) {
            [$headerName, $value] = preg_split("/:\s*/", $header, 2);

            $headers[$headerName] = $value;
        }

        return $headers;
    }

    public function benchPregSplitOneSpace(): array {
        $headers = [];

        foreach ($this->headers as $header) {
            [$headerName, $value] = preg_split("/:\s{0,1}/", $header, 2);

            $headers[$headerName] = $value;
        }

        return $headers;
    }
}
