<?php

namespace Casino\Domain\Games\Blackjack;

use Casino\Domain\Games\Autoloader\Autoloader;

class Blackjack
{

    public $players; // propriété de la class Blackjack

    public function play() // méthode de la class Blackjack
    {
        print_r($this->players);
    }
}


// Processus d'instanciation
// $blackjack est une instance de Blackjack
// Convention CamelCase
$blackjack = new Blackjack();
$blackjack->players = ['madhu', 'mariam'];
$blackjack->play();

$blackjack2 = new Blackjack();
$blackjack2->players = ['Alexandre', "Miao"];
$blackjack2->play();
