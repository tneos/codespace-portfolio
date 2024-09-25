describe("Cypress example", () => {
  it("Visits landing page, queries an element, and interacts with it", () => {
    // Visit the page
    cy.visit("https://example.cypress.io");

    // Query for an element
    cy.get(".home-list").contains("Querying").click();
    // Interact with element
    cy.url().should("include", "/commands/querying");
    cy.get("h1").should("contain", "Querying");
    // Assert the content on page
  });
});
