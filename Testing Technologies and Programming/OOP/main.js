class Car {
  // constructor
  constructor(make, model) {
    this.make = make;
    this.model = model;
  }

  drive() {
    console.log("Engine started..");
  }
}

const myCar = new Car("Toyota", "Corolla");
console.log(myCar._make);

// class Circle {
//   // Class constructor
//   constructor(radius) {
//     this._radius = radius;
//   }

//   // Getter method
//   get radius() {
//     return this._radius;
//   }
//   // Setter method
//   set radius(radius) {
//     this._radius = radius;
//   }

//   // Other methods
//   calculateArea() {
//     return Math.PI * this.radius ** 2;
//   }
// }

// // Example usage:
// const myCircle = new Circle(5);
// console.log("Radius:", myCircle.radius);
// console.log("Area:", myCircle.calculateArea());

// // Changing the radius using the setter method
// myCircle.radius = 7;
// console.log("New Radius:", myCircle.radius);
// console.log("New Area:", myCircle.calculateArea());

// Parent Class animal
class Animal {
  constructor(name) {
    this.name = name;
  }

  // Methods
  speak() {
    console.log(`${this.name} makes a sound`);
  }
}

// Sub Class Dog
class Dog extends Animal {
  speak() {
    console.log(`${this.name} barks...`);
  }
}
// Sub Class Cat
class Cat extends Animal {
  speak() {
    console.log(`${this.name} meows...`);
  }
}

// Create dog instance
const myDog = new Dog("buddy");

myDog.speak();

// Parent Class Shape
class Shape {
  area() {
    console.log("Area claculation not implemented");
  }
}

class Square extends Shape {
  constructor(side) {
    super();
    this.side = side;
  }

  area() {
    return this.side ** 2;
  }
}

class Circle extends Shape {
  constructor(radius) {
    super();
    this.radius = radius;
  }

  area() {
    return Math.PI * this.radius ** 2;
  }
}

const square = new Square(4);
const circle = new Circle(6);

console.log("Square area: ", square.area());
console.log("Circle area: ", circle.area());

// Parent Class Bank Account
class BankAccount {
  // constructor
  constructor(balance) {
    if (this.constructor === BankAccount) {
      throw new TypeError("Cannot construct Abstract Instances directly");
    }
    this.balance = balance;
  }
  // Abstract method for deposit
  deposit(amount) {
    throw new TypeError("Do not call abstract method deposit from child.");
  }
  // Abstract method for withdraw
  withdraw(amount) {
    throw new TypeError("Do not call abstract method deposit from child.");
  }
}

// Concrete subclass representing a Savings account
class SavingsAccount extends BankAccount {
  // constructor
  constructor(balance, interestRate) {
    super(balance);

    // Initialize interest rate attribute
    this.interestRate = interestRate;
  }

  deposit(amount) {
    this.balance += amount + (amount * this.interestRate) / 100;
  }

  withdraw(amount) {
    if (amount <= this.balance) {
      this.balance -= amount;
    } else {
      console.log("Insufficient funds...");
    }
  }
}

// Concrete subclass representing a Current account
class CurrentAccount extends BankAccount {
  // constructor
  constructor(balance, overdraft) {
    super(balance);
    this.overdraft = overdraft;
  }
  // @override
  deposit(amount) {
    this.balance += amount;
  }

  //@override
  withdraw(amount) {
    if (amount <= this.balance + this.overdraft) {
      this.balance -= amount;
    } else {
      console.log("Insufficient funds...");
    }
  }
}

// Create a Savings account instance
const savingsAccount = new SavingsAccount(1000, 3);

// Deposit funds
savingsAccount.deposit(500);
console.log("Savings account balance after deposit: ", savingsAccount.balance);

// Withdraw funds
savingsAccount.withdraw(200);
console.log("Savings account balance after withdraw: ", savingsAccount.balance);

// Create a Current account instance
const currentAccount = new CurrentAccount(1900, 200);

// Deposit funds
currentAccount.deposit(500);
console.log("Current account balance after deposit: ", currentAccount.balance);

// Withdraw funds
currentAccount.withdraw(20000);
console.log("Current account balance after withdraw: ", currentAccount.balance);

// const account = new BankAccount(20000);
currentAccount.deposit(100);
