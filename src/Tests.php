<?php


declare(strict_types=1);

namespace Casino\Tests;

require('./Infrastructure/Autoloader/Autoloader.php');

use Casino\Tests\AbstractTests;
use Casino\Tests\Games\Blackjack\TestBlackjack;
use Casino\Tests\Games\Roulette\TestRoulette;


class Tests
{
    private $testers = [];

    public function addTester(AbstractTests $tester)
    {
        $this->testers[] = $tester;
    }

    public function executeAll()
    {
        foreach ($this->testers as $tester) {
            $tester->execute();
        }
    }
}

$casioneTest = new Tests;
$casioneTest->addTester(new TestRoulette);
$casioneTest->addTester(new TestBlackjack);
$casioneTest->executeAll();
