// Abstraction example

class User {
  constructor(username) {
    this._username = username;
  }

  stateYourRole() {
    console.log("Function that will be called from child class");
  }

  get username() {
    return this._username;
  }
  set username(username) {
    this._username = username;
  }
}

class Admin extends User {
  stateYourRole() {
    console.log("Admin");
  }
}

class Viewer extends User {
  stateYourRole() {
    console.log("viewer");
  }
}

const admin = new Admin("Balthazar");
const viewer = new Viewer("Melchior");

admin.stateYourRole();
viewer.stateYourRole();
