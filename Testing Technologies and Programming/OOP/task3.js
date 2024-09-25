// class inheritance

class User {
  constructor(username) {
    this._username = username;
  }

  get username() {
    return this._username;
  }

  set username(username) {
    this._username = username;
  }
}

class Admin extends User {
  expressYourRole() {
    console.log("Admin");
  }

  sayHello() {
    console.log(`Hello admin, ${this.username}`);
  }
}

const admin = new Admin();
// Set property
admin.username = "Balthasar";
admin.sayHello();
