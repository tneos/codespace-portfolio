describe("RPS Game", () => {
  beforeEach(() => {
    cy.visit("http://127.0.0.1:5500/index.html", {failOnStatusCode: false});
    // Assign aliases to option buttons
    cy.get('[data-cy="rock"]').as("rock");
    cy.get('[data-cy="paper"]').as("paper");
    cy.get('[data-cy="scissors"]').as("scissors");
    // Assign aliases to option buttons
    cy.get('[data-cy="user-option"]').as("userOption");
    cy.get('[data-cy="computer-option"]').as("computerOption");
    cy.get('[data-cy="result"]').as("result");
  });
  it("Play the game with the rock option and check the result", () => {
    // Click the rock option
    cy.get("@rock").should("exist").click();
    // Check the computer option and the result
    cy.get("@computerOption").then(option => {
      // If computer option is set to rock
      if (option.text().includes("Rock")) {
        cy.get("@result").contains("It's a tie!");
      }
      // If computer option is set to paper
      else if (option.text().includes("Paper")) {
        cy.get("@result").contains("You lose!");
      }
      // If computer option is set to scissors
      else {
        cy.get("@result").contains("You win!");
      }
    });
  });
});
