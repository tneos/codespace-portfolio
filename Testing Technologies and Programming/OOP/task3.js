// class inheritance

class User {
  constructor(username) {
    this._username = username;
  }

  set changeUsername(username) {
    this._username = username;
  }
}

class Admin extends User {
  expressYourRole() {
    console.log("Admin");
  }

  sayHello() {
    console.log(`Hello admin, ${this._username}`);
  }
}

const admin = new Admin("Balthazar");
admin.sayHello();
