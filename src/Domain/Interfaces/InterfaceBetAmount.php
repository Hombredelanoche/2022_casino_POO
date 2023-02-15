<?php

declare(strict_types=1);

namespace Casino\Domain\Interfaces;


interface InterfaceBetAmount
{
    public function betAmount($amount);
    public function win($amount);
    public function hadEnoughMoney($amount);
}
