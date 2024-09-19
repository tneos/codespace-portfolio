// Classes and instances
class User {
  constructor(firstName, lastName) {
    this.firstName = firstName;
    this.lastName = lastName;
  }

  hello() {
    console.log(`hello ${this.firstName} ${this.lastName}`);
  }
}

const user1 = new User("John", "Doe");
const user2 = new User("Jane", "Doe");

user1.hello();
user2.hello();
