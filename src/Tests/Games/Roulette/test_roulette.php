<?php

declare(strict_types=1);

namespace Casino\Tests\Games\Roulette;

include_once('./../../../Infrastructure/Autoloader/Autoloader.php');

use Casino\Domain\Common\Common;
use Casino\Domain\Games\Roulette\Roulette;
use Casino\Infrastructure\Autoloader\Autoloader;

Autoloader::register();
/**
 * Je dois tester que mon application roulette
 * renvoie bien que l'utilisateur a gagné s'il 
 * a rentré le chiffre trouvé aléatoirement.
 */



function test_roulette()
{
    $resultatGagnant = Roulette::roulette(20, '20');
    $resultatPerdant = Roulette::roulette(2, '20');
    $resultatGagnant2 = Roulette::roulette(21, '21');
    $resultatPerdant2 = Roulette::roulette(15, '21');

    // roulette(3, 45);

    return $resultatGagnant === true && $resultatPerdant === false && $resultatGagnant2 === true && $resultatPerdant2 === false;
}



/**
 * Je dois générer un nombre aléatoire entre 0 et 36
 */
function test_can_generate_random_number(): bool
{
    $number1 = Roulette::generateRandomRouletteNumber();
    $number2 = Roulette::generateRandomRouletteNumber();

    $testIsOk = false;

    if (
        // doit etre entre 0 et 36
        test_number_between_0_36($number1)
        // idem
        && test_number_between_0_36($number2)
        // number1 et number2 différents
        && $number1 !== $number2
    ) {
        $testIsOk = true;
    }
    return $testIsOk;
}

function test_number_between_0_36($number): bool
{
    return isset($number) && $number >= 0 && $number <= 36;
}

/**
 * Je dois savoir si ce nombre est pair ou impair. 
 */
function test_can_decide_odd_even(): bool
{
    $testIsOk = true;

    for ($i = 0; $i <= 18; $i++) {
        $testEven = Common::isEven(2 * $i);
        $testOdd = Common::isEven(2 * $i + 1);
        $testIsOk = $testEven && $testOdd === false && $testIsOk;
    }

    return $testIsOk;
}

/**
 * Je dois savoir quel est le nombre du pari de l'utilisateur.
 */
function test_can_get_user_input(): bool
{
    // Exemple de données récupérées depuis
    // la ligne de commande.
    // ici ex: `php test_roulette.php 13 100`
    $argvExample = [
        "test_roulette.php", // nom du script
        "13", // argument1 en ligne de commande
        "100", // argument2 en ligne de commande
    ];
    $userInput = Roulette::getUserBetInput($argvExample);

    return $userInput === '13';
}

/**
 * Je dois savoir si l'utilisateur a parié sur pair ou impair.
 */
function test_can_get_user_parity_bet_input(): bool
{
    // Exemple de données récupérées depuis
    // la ligne de commande.
    // ici ex: `php test_roulette.php 13 100`
    $argvExample = [
        "test_roulette.php", // nom du script
        "13", // argument1 en ligne de commande
        "pair", // arguement2 en cli
        "100", // argument3 en ligne de commande
    ];
    $userInput = Roulette::getUserParityBetInput($argvExample);

    return $userInput === 'pair';
}

/**
 * La fonction getColor permet d'obtenir la couleur d'une carte.
 * Afin de savoir si elle fonctionne correctement, je vais l'appeler avec des cartes rouges
 * et vérifier que la fonction renvoie bien "rouge", et de même pour une liste de cartes noires.
 * 
 * On n'oubliera pas de tester le cas "0"
 */
function test_get_color(): bool
{
    $blackNumbers = [2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35];
    $redNumbers = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
    $testIsOkay = true;

    $testIsOkay = Roulette::getColor(0) === "aucune" && $testIsOkay;

    foreach ($blackNumbers as $number) {
        $testIsOkay = Roulette::getColor($number) === 'black' && $testIsOkay;
    }

    foreach ($redNumbers as $number) {
        $testIsOkay = Roulette::getColor($number) === 'red' && $testIsOkay;
    }

    return $testIsOkay;
}

/**
 * Je dois savoir si l'utilisateur a gagné ses paris.
 */

/**
 * LANCEMENT DES TESTS
 */

$koString = "\033[31m❌\033[0m\n";
$okString = "\033[32m✔️\033[0m\n";

echo "\ntest_roulette : " . (test_roulette() ? $okString : $koString);
echo "\ntest_can_generate_random_number : " . (test_can_generate_random_number() ? $okString : $koString);
echo "\ntest_can_decide_odd_even : " . (test_can_decide_odd_even() ? $okString : $koString);
echo "\ntest_can_get_user_input : " . (test_can_get_user_input() ? $okString : $koString);
echo "\ntest_can_get_user_parity_bet_input : " . (test_can_get_user_parity_bet_input() ? $okString : $koString);
echo "\ntest_get color : " . (test_get_color() ? $okString : $koString);
