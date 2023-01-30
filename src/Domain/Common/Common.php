<?php

namespace Casino\Domain\Common;

class Common
{
    public static function isEven($number): bool
    {
        return ($number % 2) === 0;
    }

    static function getCards(): array
    {
        return [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'V', 'D', 'R'];
    }

    /* Renvoie une carte aléatoire parmi $cards*/

    static function drawCard(array $cards = null) //: int|string
    {
        $cards = $cards === null ? self::getCards() : $cards;
        $numberOfCards = count($cards);
        $drawCardIndex = rand(0, $numberOfCards - 1);
        return $cards[$drawCardIndex];
    }

    /**
     * En attendant php8 et str_ends_with on utilise
     * cette fonction
     */
    static function str_ends_with(string $haystack, string $needle): bool
    {
        return substr_compare($haystack, $needle, -strlen($needle)) === 0;
    }
}
