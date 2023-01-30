<?php

namespace Casino\Domain\Games\Blackjack;

use Casino\Domain\Common\Common;

/**
 * Renvoie une carte aléatoire parmi $cards
 */
$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'V', 'D', 'R'];

class Blackjack
{
    public static function getCardValue($card): int
    {
        return gettype($card) === "string" ? 10 : $card;
    }

    public static function completeBankHand(array $bankHand, array $tableCards): array
    {
        if (array_sum($bankHand) < 17) { // si la somme du tablea est inférieure à 17.
            $pickCard = self::getCardValue(Common::drawCard($tableCards));
            array_push($bankHand, $pickCard); // Alors le tableau reçevra un index supplémentaire.
            return self::completeBankHand($bankHand, $tableCards); // fonction récursive.
        } else {
            return $bankHand;
        }
    }
}



$cardPlayer1 = Common::drawCard($cards);
$cardPlayer2 = Common::drawCard($cards);
$cardBank1 = Common::drawCard($cards);
$cardBank2 = Common::drawCard($cards);

echo "Cartes tirées pour le joueur : " . $cardPlayer1 . " + " . $cardPlayer2 . "\n";

/**
 * Renvoie la valeur associée à une carte de black jack
 * 
 * ex: Roi vaut 10
 */


/**
 * Si la valeur total du tableau est inférieure à 17 alors on rajoute une valeur à la main de la banque
 * 
 */


$totalPlayer = Blackjack::getCardValue($cardPlayer1) + Blackjack::getCardValue($cardPlayer2);

echo "Total joueur : " . $totalPlayer . "\n";

echo "Cartes tirées pour la banque : " . $cardBank1 . " + " . $cardBank2 . "\n";

$totalBank = Blackjack::getCardValue($cardBank1) + Blackjack::getCardValue($cardBank2);

echo "Total banque : " . $totalBank . "\n";

echo ($totalBank > $totalPlayer) ? "La banque a gagné.\n" : "Le joueur a gagné.\n";
