<?php

declare(strict_types=1);

use Casino\Domain\Interfaces\InterfaceAccount;

class Account implements InterfaceAccount
{
    private $rib;
    private $playerId;
}
