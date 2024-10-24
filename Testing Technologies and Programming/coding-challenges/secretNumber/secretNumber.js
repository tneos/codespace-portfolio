// Guess number game

const secretNumber = () => {
  // Generate random number
  let secretNum = Math.floor(Math.random() * 10 + 1);

  // Input from user
  let choice = parseInt(document.getElementById("number").value);
  // DOM element for response to user
  const answer = document.getElementById("answer");

  // Switch statements for comparison with secretNum
  switch (true) {
    // Ensure input not empty
    case isNaN(choice):
      answer.innerHTML = `Please enter a number in order to play`;
      break;
    case choice > secretNum:
      answer.innerHTML = `You answered ${choice}. The correct answer is lower.Try again`;
      break;
    case choice < secretNum:
      answer.innerHTML = `You answered ${choice}. The correct answer is higher.Try again`;
      break;
    default:
      answer.innerHTML = `You answered ${choice}. This is the correct answer!`;
  }
};

// Clear input
const onClear = () => {
  document.getElementById("form").reset();
};
