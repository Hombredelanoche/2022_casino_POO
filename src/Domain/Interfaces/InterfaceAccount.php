<?php

declare(strict_types=1);

namespace Casino\Domain\Interfaces;

interface InterfaceAccount
{
    public function depositeRib(): string;
    public function formIdentity(): void;
}
