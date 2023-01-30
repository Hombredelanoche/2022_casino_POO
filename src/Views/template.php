<?php

namespace Casino\Views;


class Views
{


    public static function printBetArgError(): void
    {
        echo "ATTENTION, il manque un argument pour votre pari\n";
        echo "ex: roulette.php 13";
    }

    public static function printParityArgError(): void
    {
        echo "Not enough arguments, missing parity bet.";
        echo "ex: php roulette.php 13 pair";
    }

    public static function printUserArgs($nombreAleatoire, $pariUtilisateur): void
    {
        echo "\nNombre tiré au sort : " . $nombreAleatoire;
        echo "\nPari utilisateur : " . $pariUtilisateur . " -> type : " . gettype($pariUtilisateur);
    }

    public static function printBetResult($didWin): void
    {
        echo "\nUtilisateur a gagné pari nombre ? " . ($didWin ? "OUI ! BRAVO !" : "NON LOOSER !!!");
    }
}
