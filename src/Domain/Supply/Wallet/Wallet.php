<?php

declare(strict_types=1);

namespace Casino\Domain\Supply\Wallet;

use Casino\Domain\Interfaces\InterfaceWallet;
use Casino\Infrastructure\Autoloader\Autoloader;

Autoloader::register();


class Wallet implements InterfaceWallet
{
    public $amount;

    public function __construct(private int $playerId, public int $balance)
    {
    }

    public function withDrawAmount($amount): int
    {
        if ($this->balance - $amount) {
            return $this->balance;
        }
    }

    public function injectAmount($amount): int
    {
        if ($amount > 0) {
            return $this->balance + $amount;
        }
    }

    private function isBalandePositive($balance): bool
    {
        if ($this->balance < 0) {
            return false;
        } else {
            return true;
        }
    }
}
