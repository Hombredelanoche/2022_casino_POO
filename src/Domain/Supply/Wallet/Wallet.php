<?php

declare(strict_types=1);

namespace Casino\Domain\Supply\Wallet;

use Account;
use Casino\Domain\Interfaces\InterfaceWallet;
use Casino\Infrastructure\Autoloader\Autoloader;

Autoloader::register();

class Wallet implements InterfaceWallet
{
    protected $amount;

    public function __construct(private int $playerId, public int $balance)
    {
    }

    public function withDrawAmount($amount, $balance): int
    {
        if ($this->balance - $amount) {
            return $this->balance = $balance;
        }
    }

    public function injectAmount($amount, $balance): int
    {
        if ($amount > 0) {
            return $this->balance + $amount = $balance;
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
