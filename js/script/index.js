function isPrime(num) {
    if (num <= 1) return false;

    for (let i = 2; i <= Math.sqrt(num); i++) {
        if (num % i === 0) return false;
    }

    return true;
}

function findClosestPrimes(num) {
    let lowerPrime = undefined;
    let higherPrime = undefined;

    for (let i = num - 1; i >= 2; i--) {
        if (!lowerPrime && isPrime(i)) {
            lowerPrime = i;
        }
    }

    for (let i = num + 1; i <= 1000000; i++) {
        if (!higherPrime && isPrime(i)) {
            higherPrime = i;
        }
    }

    lowerPrime = lowerPrime === undefined ? 'ничего' : lowerPrime;
    higherPrime = higherPrime === undefined ? 'ничего' : higherPrime;

    return [lowerPrime, higherPrime];
}


function checkPrime() {
    const numberInput = document.getElementById('numberInput');
    const userInput = parseInt(numberInput.value);

    if (!isNaN(userInput) && userInput >= 0 && userInput <= 1000000) {
        const primeResult = isPrime(userInput);
        const closestPrimes = findClosestPrimes(userInput);

        if (primeResult) {
            alert(`Число ${userInput} является простым.`);
        } else {
            alert(`Число ${userInput} не является простым. Ближайшие простые числа: ${closestPrimes[0]} и ${closestPrimes[1]}.`);
        }
    } else {
        alert('Пожалуйста, введите число от 0 до 1.000.000.');
    }
}