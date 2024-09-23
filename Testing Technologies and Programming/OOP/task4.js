// Polymorphism example

class User {
  constructor() {
    this._numberOfArticles = 0;
  }

  set numberOfArticles(numArticles) {
    this._numberOfArticles = numArticles;
  }

  get numberOfArticles() {
    return this._numberOfArticles;
  }
  calcScores() {
    console.log("Number of articles will be implemented separately for each class");
  }
}

class Author extends User {
  calcScores() {
    return this.numberOfArticles * 10 * 20;
  }
}

class Editor extends User {
  calcScores() {
    return this.numberOfArticles * 6 * 15;
  }
}

const author = new Author();
author.numberOfArticles = 8;
console.log(author.calcScores());
const editor = new Editor();
editor.numberOfArticles = 15;
console.log(editor.calcScores());
