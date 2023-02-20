<?php

declare(strict_types=1);

namespace Casino\Domain\Interfaces;

interface InterfaceWallet
{
    public function withDrawAmount(float $amount): float;
    public function injectAmount(float $amount): float;
}
