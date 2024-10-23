// Random Number Game

const secretNumber = () => {
  // Generate random number
  let secretNum = Math.floor(Math.random() * 10);
  // Input from user
  let choice = parseInt(prompt("Enter your choice(0-9): "));

  // As long as user's guess is not right keep prompting for input
  while (choice !== secretNum) {
    // Check if choice is within limit or invalid
    if (choice > 9 || choice < 0 || isNaN(choice)) {
      console.log("Please add a number between 0 and 9");
    } else if (choice > secretNum) {
      console.log(`You answered ${choice}. The correct answer is lower.Try again`);
    } else if (choice < secretNum) {
      console.log(`You answered ${choice}. The correct answer is higher.Try again`);
    }

    // Error message if invalid input
    choice = parseInt(prompt("Enter your choice(0-9): "));
  }

  // Correct message to user
  console.log(`You answered ${choice}. This is the correct answer!`);
};

secretNumber();
