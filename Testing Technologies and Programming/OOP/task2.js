// getters and setters methods

class User {
  // Initialize empty values
  constructor() {
    this._firstName = "";
    this._lastName = "";
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

  hello() {
    return "Hello World!";
  }
}

const user = new User();

// Use setters to set firstName and lastName
user._firstName = "Thomas";
user._lastName = "Neos";

// Use getters to get firstName and lastName
let fullName = user._firstName + " " + user._lastName;

console.log(user.hello());
console.log(`My name is ${fullName}`);
