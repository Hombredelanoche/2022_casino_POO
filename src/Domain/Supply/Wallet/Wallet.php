<?php

declare(strict_types=1);

namespace Casino\Domain\Supply\Wallet;

use Casino\Domain\Interfaces\InterfaceWallet;
use Casino\Infrastructure\Autoloader\Autoloader;

Autoloader::register();

class Wallet implements InterfaceWallet
{
    protected $amount; // Représente une valeur ajouter ou à retirer

    /**
     * Constructeur permettant de récupèrer l'Id du joueur et le solde du compte.
     */
    public function __construct(private int $playerId, public int $balance)
    {
    }

    /**
     * La fonction withDrawAmount va permettre de retirer un montant du solde du compte.
     */
    public function withDrawAmount($amount): int
    {
        if ($this->balance - $amount) {
            return $this->balance;
        }
    }

    /**
     * La fonction injectAmount prend un montant $amount en paramétre qui va être déduire du portfeuille du joueur.
     */
    public function injectAmount($amount): int
    {
        if ($amount > 0) {
            return $this->balance + $amount;
        }
    }
    /**
     * La fonction isBalancePositive permet d'éviter que le solde du compte ne soit pas négatif. 
     */
    private function isBalancePositive(): bool
    {
        if ($this->balance < 0) {
            return false;
        } else {
            return true;
        }
    }
}
