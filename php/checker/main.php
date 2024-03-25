<?php

require_once 'PrimeNumberChecker.php';

use PrimeChecker\PrimeNumberChecker;

function getUserInput(): ?int
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numberInput"])) {
        $userInput = $_POST["numberInput"];

        if (!is_numeric($userInput)) {
            return null;
        }

        $userInput = intval($userInput);

        if ($userInput >= 0 && $userInput <= 1000000) {
            return $userInput;
        } else {
            return null;
        }
    }

    return null;
}

function displayResult(?int $userInput): void
{
    try {
        $primeResult = PrimeNumberChecker::isPrime($userInput);
        $closestPrimes = PrimeNumberChecker::findClosestPrimes($userInput);

        if ($primeResult) {
            echo "Число $userInput является простым." . PHP_EOL;
        } else {
            echo "Число $userInput не является простым. Ближайшие простые числа: {$closestPrimes[0]} и {$closestPrimes[1]}." . PHP_EOL;
        }

    } catch (Exception $e) {
        echo "Произошла ошибка: " . $e->getMessage();
    }
}

function showError(): void
{
    $userInput = getUserInput();
    $userInput ? displayResult($userInput) : print("Пожалуйста, введите корректное число от 0 до 1.000.000." . PHP_EOL);
}

showError();

