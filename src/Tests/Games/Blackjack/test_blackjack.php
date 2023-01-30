<?php


namespace Casino\Tests\Games\Blackjack;

include_once('./../../../Infrastructure/Autoloader/Autoloader.php');

use Casino\Domain\Common\Common;
use Casino\Domain\Games\Blackjack\Blackjack;
use Casino\Infrastructure\Autoloader\Autoloader;
use Casino\Tests\AbstractTests;

Autoloader::register();

class TestBlackjack extends AbstractTests
{

    public function execute(): void
    {
        $this->renderTestResult("test_can_draw_card ", TestBlackjack::test_can_draw_card(Common::drawCard()));
        $this->renderTestResult("test_can_get_card_value ", TestBlackjack::test_can_get_card_value(Common::getCards()));
        $this->renderTestResult("test_can_calculate_card_sum ", TestBlackjack::test_can_calculate_card_sum());
        $this->renderTestResult("test_can_guess_winner ", TestBlackjack::test_can_guess_winner());
    }

    /**
     * est-ce que "blackjack.php" sait renvoyer une carte
     * parmi 1, 2 ..., 10, V, D, R ?
     * et ce de manière aléatoire ?
     */

    public static function test_can_draw_card(): bool
    {
        $card1 = Common::drawCard();
        $card2 = Common::drawCard();
        $cards = Common::getCards();
        return $card1 !== $card2 && in_array($card1, $cards)  && in_array($card2, $cards);
    }


    /**
     * est-ce que blackjack est capable de renvoyer la valeur
     * numérique d'une des cartes ? en particulier 10
     * pour Valet, Dame, Roi.
     */
    public static function test_can_get_card_value($cards): bool
    {
        // $cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'V', 'D', 'R'];
        $testResult = true;
        $values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10];
        foreach ($cards as $i => $card) {
            $value = Blackjack::getCardValue($card);
            $testResult = $testResult && $value == $values[$i];
        }
        return $testResult;
    }

    /**
     * Règle métier : Si le total des cartes de la banque est inférieure à 17 alors elle pioche des cartes
     * 
     * Test à effectuer :
     *  - Si la banque possède deux cartes dont la somme est inférieure à 17 alors la banque doit avoir trois cartes ou plus.
     *  - Si la somme des cartes est inférieure à 17 alors après traitement la somme doit être supérieure à 17.
     */
    public static function test_complete_bank_hand($tableCards): bool
    {
        $bankHand = [5, 7];
        $completedHand = Blackjack::completeBankHand($bankHand, $tableCards);

        if (count($completedHand) > count($bankHand)) {
            $test1 = true;
        } else {
            $test1 = false;
        }

        if (array_sum($completedHand) > 17) {
            $test2 = true;
        } else {
            $test2 = false;
        }

        if (Blackjack::completeBankHand([10, 9], $tableCards) == [10, 9]) {
            $test3 = true;
        } else {
            $test3 = false;
        }
        return $test1 && $test2 && $test3;
    }

    /**
     * est-ce que le code de blackjack est capable de calculer
     * la somme des 2 cartes tirées au sort ?
     */
    public static function test_can_calculate_card_sum(): bool
    {
        return false;
    }

    /**
     * est-ce que le code de blackjack est capable de
     * déterminer qui a gagné la partie ?
     */
    public static function test_can_guess_winner(): bool
    {
        return false;
    }
}

$test = new TestBlackjack;
$test->execute();
