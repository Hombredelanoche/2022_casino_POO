<?php

declare(strict_types=1);

namespace Casino\Domain\Games\BetAmount;

use Casino\Domain\Interfaces\InterfaceBetAmount;

class BetAmount implements InterfaceBetAmount
{
    public $amount;

    public function betAmount($amount);
    {

    }

    public function win(){};

    public function hadEnoughMoney(){};



}
