// Rock , Paper, Scissors Game

// Get the buttons
const rockBtn = document.getElementById("rock");
const paperBtn = document.getElementById("paper");
const scissorsBtn = document.getElementById("scissors");

// Get the spans
const userSpan = document.getElementById("user-option");
const computerSpan = document.getElementById("computer-option");
const resSpan = document.getElementById("result");

// Define the options
const options = ["Rock", "Paper", "Scissors"];

// Add click events to the buttons
rockBtn.addEventListener("click", e => {
  playGame(options[0]);
});
paperBtn.addEventListener("click", e => {
  playGame(options[1]);
});
scissorsBtn.addEventListener("click", e => {
  playGame(options[2]);
});

// Play the game function
const playGame = userOption => {
  const computerOption = options[Math.floor(Math.random() * options.length)];
  userSpan.innerHTML = userOption;
  // Set computer option
  computerSpan.innerHTML = computerOption;

  // Compare results
  if (userOption === computerOption) {
    resSpan.innerHTML = "It's a tie!";
  } else if (userOption === "Rock" && computerOption === "Scissors") {
    resSpan.innerHTML = "You win!";
  } else if (userOption === "Paper" && computerOption === "Rock") {
    resSpan.innerHTML = "You win!";
  } else if (userOption === "Scissors" && computerOption === "Paper") {
    resSpan.innerHTML = "You win!";
  } else {
    resSpan.innerHTML = "You loose!";
  }
};
