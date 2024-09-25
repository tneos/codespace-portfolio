// Abstract class example

class User {
  constructor() {
    // Check if an attempt is made to create an object(instanciate) of abstract class
    if (this.constructor == User) {
      throw new Error("Cannot instanciate abstract class..");
    }
    this._username = "";
  }

  // Abstract method
  stateYourRole() {
    throw new Error("Function can only be called from child class");
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

const admin = new Admin();
const viewer = new Viewer();
// Set usernames
admin.username = "Balthazar";
viewer.username = "Melchior";

admin.stateYourRole();
viewer.stateYourRole();
