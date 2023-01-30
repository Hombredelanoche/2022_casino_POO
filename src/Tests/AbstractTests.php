<?php

declare(strict_types=1);

namespace Casino\Tests;

abstract class AbstractTests
{
    const KO_STRING = "\033[31m❌\033[0m\n";
    const OK_STRING = "\033[32m✔️\033[0m\n";

    abstract function execute(): void;

    public function renderTestResult($testName, $result): void
    {
        echo "\n$testName : " . ($result ? self::OK_STRING : self::KO_STRING);
    }
}
