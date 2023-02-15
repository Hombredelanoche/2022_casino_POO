<?php

declare(strict_types=1);

namespace Casino\Domain\Interfaces;

interface InterfaceWallet
{
    public function withDrawAmount($amount, $balance): int;
    public function injectAmount($amount, $balance): int;
}
