<?php

declare(strict_types=1);

namespace Casino\Domain\Supply\Wallet;

use Casino\Domain\Interfaces\InterfaceBetAmount;
use Casino\Domain\Interfaces\InterfaceWallet;

class Wallet implements InterfaceWallet, InterfaceBetAmount
{
    protected $amount; // Représente une valeur ajouter ou à retirer

    /**
     * Constructeur permettant de récupèrer l'Id du joueur et le solde du compte.
     */
    public function __construct(protected int $playerId, public int $balance = 0)
    {
    }

    /**
     * La fonction withDrawAmount va permettre de retirer un montant du solde du compte.
     */
    public function withDrawAmount($amount): int
    {
        return $amount > $this->balance ? false : $this->balance - $amount;
        // if ($amount > $this->balance || $this->balance - $amount) {
        //     return true;
        // } else {
        //     return false;
        // }
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

    public function betAmount($amount)
    {
    }

    public function win($amount)
    {
    }

    public function hadEnoughMoney($amount)
    {
    }
}
