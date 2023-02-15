<?php

declare(strict_types=1);

namespace Casino\Domain\Interfaces;

interface InterfaceBetAmount
{
    public function betAmount();
    public function win();
    public function hadEnoughMoney();
}
