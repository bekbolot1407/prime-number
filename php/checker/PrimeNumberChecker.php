<?php

namespace PrimeChecker;

class PrimeNumberChecker
{
    public static function isPrime(int $num): bool
    {
        if ($num <= 1) return false;

        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i === 0) return false;
        }

        return true;
    }

    public static function findClosestPrimes(int $num): array
    {
        $lowerPrime = null;
        $higherPrime = null;

        for ($i = $num - 1; $i >= 2; $i--) {
            if (!$lowerPrime && self::isPrime($i)) {
                $lowerPrime = $i;
            }
        }

        for ($i = $num + 1; $i <= 1000000; $i++) {
            if (!$higherPrime && self::isPrime($i)) {
                $higherPrime = $i;
            }
        }

        $lowerPrime = $lowerPrime === null ? 'ничего' : $lowerPrime;
        $higherPrime = $higherPrime === null ? 'ничего' : $higherPrime;

        return [
            $lowerPrime,
            $higherPrime,
            ];
    }
}