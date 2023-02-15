<?php

declare(strict_types=1);

namespace Casino\Domain\Games\BetAmount;

use Casino\Domain\Interfaces\InterfaceBetAmount;
use Casino\Domain\Supply\Wallet\Wallet;

class BetAmount extends Wallet implements InterfaceBetAmount
{

    public function betAmount($amount)
    {
    }

    public function win($amount)
    {
        if()
    }

    public function hadEnoughMoney($amount)
    {
    }
}
