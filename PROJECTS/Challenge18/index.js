// // Replace 'yourNumber' with the number you want to check
// const num = 42;

// if (num % 2 === 0) {
//   console.log(`The number ${num} is even.`);
// } else {
//   console.log(`The number ${num} is not even.`);
// }


// for (let number = 10; number <= 100; number++) {
//     if (number % 2 === 0 && number % 3 === 0) {
//       console.log(`The number ${number} is even and divisible by 3.`);
//     }
//   }
  


const number1 = 13;
const number2 = 19;
const number3 = 17;

let smallest = number1;
let largest = number1;

if (number2 < smallest) {
  smallest = number2;
} else if (number2 > largest) {
  largest = number2;
}

if (number3 < smallest) {
  smallest = number3;
} else if (number3 > largest) {
  largest = number3;
}

function isPrime(num) {
  if (num <= 1) {
    return false;
  }
  for (let i = 2; i < num; i++) {
    if (num % i === 0) {
      return false;
    }
  }
  return true;
}

if (isPrime(smallest)) {
  console.log(`The smallest number ${smallest} is prime.`);
} else {
  console.log(`The smallest number ${smallest} is not prime.`);
}

if (isPrime(largest)) {
  console.log(`The largest number ${largest} is prime.`);
} else {
  console.log(`The largest number ${largest} is not prime.`);
}
