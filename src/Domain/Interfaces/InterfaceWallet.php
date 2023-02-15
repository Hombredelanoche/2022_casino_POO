<?php

declare(strict_types=1);

namespace Casino\Domain\Interfaces;

interface InterfaceWallet
{
    public function withDrawAmount($amount): int;
    public function injectAmount($amount): int;
}
