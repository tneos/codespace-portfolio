// ARROW FUNCTIONS

// Q1
const greet = function (name) {
  return "Hi " + name + "!";
};

// Q2
const isEven = num => num % 2 === 0;

// Q3
const counterFunc = counter => {
  counter > 100 ? (counter = 0) : counter++;
  return counter;
};

// Q4
const nameAge = (name, age) => {
  console.log(`Hello ${name}`);
  console.log(`You are ${age} years old`);
};

// Q5
const printOnly = () => console.log("printing");

// Q6
const sum = (num1, num2) => num1 + num2;

// Challenge 1
// Reverse a string
const reverseString = function (string) {
  const strArray = string.split("");

  const reverseArr = [];

  while (strArray.length > 0) {
    reverseArr.push(strArray.pop());
  }

  console.log(reverseArr.toString().replaceAll(",", ""));
};

//reverseString("John");

// Challenge 2
// Reverse an array
const reverseArray = function (arr) {
  const reverseArr = [];
  while (arr.length > 0) {
    reverseArr.push(arr.pop());
  }

  console.log(reverseArr);
};

// Challenge 3
// Find most expensive item
const mostExpensiveItem = function (array) {
  let totalPrice = 0;

  // Find and save higher cost
  array.forEach(item => {
    totalPrice < item.stock * item.price ? (totalPrice = item.stock * item.price) : totalPrice;
  });

  // Find item in array with the higher cost
  let mostExpensive = array.find(item => item.stock * item.price === totalPrice);

  console.log(mostExpensive);
};

// In this task your are required to create a user application.

// Let's write a user class with the tools we have just acquired. This class will contain the first and  last name of each user and will be able to say hello to anyone who uses our application.
// Instructions:

// Write the class User and add the properties.
// Add the method that says hello.
// Create the first instance, and call it user1. Use the new keyword to create an object from the class.
// Set the values for the first and last name to user1.

// firstName = 'John'
// lastName = 'Doe'

// Get the user first and last name, and print it to the screen.
// Use the hello() method with the first and last name variables in order to say hello to the user:

// Expected result:
// hello, John Doe

// Add another object, call it user2, give it a first name of 'Jane' and last name of 'Doe', then say hello to the user.

// Expected result:
// hello, John Doe
// hello, Jane Doe

class User {
  constructor(firstName, lastName) {
    this._firstName = firstName;
    this._lastName = lastName;
  }

  get firstName() {
    return this._firstName;
  }
  get lastName() {
    return this._lastName;
  }
  set firstName(firstName) {
    this._firstName = firstName;
  }
  set lastName(lastName) {
    this._lastName = lastName;
  }

  contact() {
    console.log("Hello world");
    console.log(`My name is ${this.firstName} ${this.lastName}`);
  }
}

// const user1 = new User("John", "Doe");
// const user2 = new User("Jane", "Doe");
const user = new User("Thomas", "Neos");
user.contact();
user.firstName = "Nick";
user.lastName = "Warren";
user.contact();

// user1.contact();
// user2.contact();

// Get and Set Methods

// Add the class constructor.
// Add the getters and setters methods after the class constructor.
// Change your hello() method to return 'Hello World!'.
// Add the following:
// 1. Create an user object called user that will represent the User class.
// 2. Use the setters methods to set the firstName and lastName instance variables of your user object.
// 3. Use getters methods to retrieve the firstName and lastName Strings from the user object and add a blank space in between.
