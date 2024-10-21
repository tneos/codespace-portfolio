// Random Number Game

const secretNumber = () => {
  let secretNum = Math.floor(Math.random() * 10);
  let choice = parseInt(prompt("Enter your choice(0-9): "));

  while (choice !== secretNum) {
    choice = parseInt(prompt("Enter your choice(0-9): "));
    if (choice > 9 || choice < 0 || choice === NaN) {
      console.log("Please add a number between 0 and 9");
    } else if (choice > secretNum) {
      console.log(`You answered ${choice}. The correct answer is lower.Try again`);
    } else if (choice < secretNum) {
      console.log(`You answered ${choice}. The correct answer is higher.Try again`);
    } else {
      console.log("Your answer is correct!");
    }
  }
};

secretNumber();
