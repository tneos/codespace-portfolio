// getters and setters methods

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

  hello() {
    return "Hello World!";
  }
}

const user = new User("Thomas", "Neos");

console.log(user.hello());
console.log(`My name is ${user.firstName} ${user.lastName}`);
