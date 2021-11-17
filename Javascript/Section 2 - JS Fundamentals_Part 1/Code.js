// let country = 'India';
// const continent = 'Asia';
// var population = 100;
// console.log(country);
// console.log(continent);
// console.log(population);

// let isIsland = true;
// let language;
// console.log(typeof isIsland); // boolean
// console.log(typeof population); // undefined
// console.log(typeof country); // undefined
// console.log(typeof language); // undefined

// language = 'portuguese';
//  const country = 'Portugal';
//  const continent = 'Europe';
//  const isIsland = false;
//  isIsland = true; // TypeError: Assignment to constant variable.

// const country = 'India';
// const continent = 'Asia';
// let population = 1300
// const language = 'Hindi'
// console.log(population / 2); // 650
// population++;
// console.log(population); // 1301
// console.log(population > 6); // true
// console.log(population < 33); // false
// const description1 =
// country +
// ' is in ' +
// continent +
// ', and its ' +
// population +
// ' million people speak ' +
// language;
// console.log(description1); // India is in Asia, and its 1301 million people speak Hindi

// const description = `${country} is in ${continent}, and its
// ${population} million people speak ${language}`;
// console.log(description); // India is in Asia, and its 1301 million people speak Hindi


// if (population > 33) {
//     console.log(`${country}'s population is above average`); // India's population is above average
//     } else {
//     console.log(`${country}'s population is ${33 - population} millionbelow average`);
//     }

// console.log('9' - '5'); // 4
// console.log('19' - '13' + '17'); // '617'
// console.log('19' - '13' + 17); // 23
// console.log('123' < 57); // false
// console.log(5 + 6 + '4' + 9 - 4 - 2); // 1143

// const numNeighbours = prompt(
// 'How many neighbour countries does your country have?',
// );

// if (numNeighbours == 1) {
// console.log('Only 1 border!');
// } else if (numNeighbours > 1) {
// console.log('More than 1 border');
// } else {
// console.log('No borders');
// }

// const numNeighbours = Number(
//     prompt('How many neighbour countries does your country have?')
// );

// const country = 'India';
// const continent = 'Asia';
// let population = 1300
// const language = 'Hindi'
// const isIsland = false;

// if (language === 'english' && population < 50 && !isIsland)
// {
//     console.log(`You should live in ${country} :)`);
// } else {
//     console.log(`${country} does not meet your criteria :(`); // India does not meet your criteria :(
// }

// const language = 'hindi'
// switch (language) {
//     case 'chinese':
//     case 'mandarin':
//     console.log('MOST number of native speakers!');
//     break;
//     case 'spanish':
//     console.log('2nd place in number of native speakers');
//     break;
//     case 'english':
//     console.log('3rd place');
//     break;
//     case 'hindi':
//     console.log('Number 4');
//     break;
//     case 'arabic':
//     console.log('5th most spoken language');
//     break;
//     default:
//     console.log('Great language too :D');
// }

// const country = 'India';
// const population = 1300;

// console.log(`${country}'s population is ${population > 33 ? 'above' : 'below'} average`); // India's population is above average



/*  Coding Challenge
// const massMark = 78;
// const heightMark = 1.69;
// const massJohn = 92;
// const heightJohn = 1.95;
// */
// const massMark = 95;
// const heightMark = 1.88;
// const massJohn = 85;
// const heightJohn = 1.76;
// const BMIMark = massMark / heightMark ** 2;
// const BMIJohn = massJohn / (heightJohn * heightJohn);
// const markHigherBMI = BMIMark > BMIJohn;
// console.log(BMIMark, BMIJohn, markHigherBMI);


// if (BMIMark > BMIJohn) {
//     console.log(`Mark's BMI (${BMIMark}) is higher than John's (${BMIJohn})!`)
// } else {
//     console.log(`John's BMI (${BMIJohn}) is higher than Marks's (${BMIMark})!`)
// }


// const scoreDolphins = (96 + 108 + 89) / 3;
// const scoreKoalas = (88 + 91 + 110) / 3;
// console.log(scoreDolphins, scoreKoalas);
// if (scoreDolphins > scoreKoalas) {
//   console.log('Dolphins win the trophy 🏆');
// } else if (scoreKoalas > scoreDolphins) {
//   console.log('Koalas win the trophy 🏆');
// } else if (scoreDolphins === scoreKoalas) {
//   console.log('Both win the trophy!');
// }
// // BONUS 1
// const scoreDolphins = (97 + 112 + 80) / 3;
// const scoreKoalas = (109 + 95 + 50) / 3;
// console.log(scoreDolphins, scoreKoalas);
// if (scoreDolphins > scoreKoalas && scoreDolphins >= 100) {
//   console.log('Dolphins win the trophy 🏆');
// } else if (scoreKoalas > scoreDolphins && scoreKoalas >= 100) {
//   console.log('Koalas win the trophy 🏆');
// } else if (scoreDolphins === scoreKoalas && scoreDolphins >= 100 && scoreKoalas >= 100) {
//   console.log('Both win the trophy!');
// } else {
//   console.log('No one wins the trophy 😭');
// }


// Coding Challenge 4
const bill = 430;
const tip = bill <= 300 && bill >= 50 ? bill * 0.15 : bill * 0.2;
console.log(`The bill was ${bill}, the tip was ${tip}, and the total value ${bill + tip}`);



