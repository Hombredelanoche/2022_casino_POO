<?php

declare(strict_types=1);

namespace Casino\Domain\Games\BetAmount;

use Casino\Domain\Interfaces\InterfaceBetAmount;
use Casino\Domain\Supply\Wallet\Wallet;

class BetAmount extends Wallet implements InterfaceBetAmount
{

    public function __construct()
    {
        parent::__construct($this->playerId, $this->balance);
    }

    public function betAmount($amount)
    {
    }

    public function win($amount)
    {
    }

    public function hadEnoughMoney($amount)
    {
    }
}
