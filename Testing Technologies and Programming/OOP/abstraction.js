// Abstract class representing a generic bank account
class BankAccount {
  // Constructor with balance initialisation and abstract instance check
  constructor(balance) {
    // Check if an attempt is made to instantiate the abstract class directly
    if (this.constructor === BankAccount) {
      throw new TypeError("Cannot construct Abstract instances directly.");
    }

    // Initialise the balance property
    this.balance = balance;
  }

  // Abstract method for deposit
  deposit(amount) {
    // Throw an error if the abstract method is called directly from a child class
    throw new TypeError("Do not call abstract method deposit from child.");
  }

  // Abstract method for withdrawal
  withdraw(amount) {
    // Throw an error if the abstract method is called directly from a child class
    throw new TypeError("Do not call abstract method withdraw from child.");
  }
}

// Concrete subclass representing a savings account
class SavingsAccount extends BankAccount {
  // Constructor with balance and interest rate initialisation
  constructor(balance, interestRate) {
    // Call the parent class constructor
    super(balance);
    // Initialise the interest rate property
    this.interestRate = interestRate;
  }

  // Implementing the deposit method for SavingsAccount
  //   deposit(amount) {
  //     // Calculate interest and update the balance
  //     this.balance += amount + (amount * this.interestRate) / 100;
  //   }

  // Implementing the withdraw method for SavingsAccount
  withdraw(amount) {
    // Check if there are sufficient funds for withdrawal
    if (amount <= this.balance) {
      this.balance -= amount;
    } else {
      console.log("Insufficient funds.");
    }
  }
}

// Concrete subclass representing a current account
class CurrentAccount extends BankAccount {
  // Constructor with balance and overdraft limit initialisation
  constructor(balance, overdraftLimit) {
    // Call the parent class constructor
    super(balance);
    // Initialise the overdraft limit property
    this.overdraftLimit = overdraftLimit;
  }

  // Implementing the deposit method for CurrentAccount
  deposit(amount) {
    // Update the balance with the deposited amount
    this.balance += amount;
  }

  // Implementing the withdraw method for CurrentAccount
  withdraw(amount) {
    // Check if there are sufficient funds (including overdraft limit) for withdrawal
    if (amount <= this.balance + this.overdraftLimit) {
      this.balance -= amount;
    } else {
      console.log("Insufficient funds.");
    }
  }
}

// Create a SavingsAccount instance
const savingsAccount = new SavingsAccount(1000, 5);

// Deposit funds into SavingsAccount
savingsAccount.deposit(500);
console.log("Savings Account balance after deposit:", savingsAccount.balance);

// Withdraw funds from SavingsAccount
savingsAccount.withdraw(200);
console.log("Savings Account balance after withdrawal:", savingsAccount.balance);

// Create a CurrentAccount instance
const currentAccount = new CurrentAccount(1500, 200);

// Deposit funds into CurrentAccount
//currentAccount.deposit(300);

// Attempt to call the deposit method directly
// try {
//     currentAccount.deposit(300);
// } catch (error) {
//     console.log('Deposit Error:', error.message); // Expected output: "Do not call abstract method deposit from child."
// }

console.log("Current Account balance after deposit:", currentAccount.balance);

// Withdraw funds from CurrentAccount
currentAccount.withdraw(2100); // This will exceed the balance and overdraft limit

// Attempt to call the withdraw method directly
try {
  currentAccount.withdraw(100);
} catch (error) {
  console.log("Withdraw Error:", error.message); // Expected output: "Do not call abstract method withdraw from child."
}

console.log("Current Account balance after withdrawal:", currentAccount.balance);

// Attempt to create an instance of BankAccount
// const account = new BankAccount(1000); // With error

// With try-catch
// try {
//     const account = new BankAccount(1000);
//   } catch (error) {
//     console.log(error.message); // This will output: "Cannot construct Abstract instances directly."
// }
