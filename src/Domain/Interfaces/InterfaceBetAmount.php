<?php

declare(strict_types=1);

namespace Casino\Domain\Interfaces;


interface InterfaceBetAmount
{
    public function betAmount($amount): void;
    public function win($amount): void;
    public function hadEnoughMoney($amount): bool;
}
