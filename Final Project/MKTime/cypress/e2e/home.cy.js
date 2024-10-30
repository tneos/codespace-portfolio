describe("Home page tests", () => {
  beforeEach(() => {
    cy.visit("http://localhost/mktime/MKTime/views");
  });
  it("Navbar tests", () => {
    cy.getDataTest("our watches").click();
    cy.url().should("include", "/index.php");
  });
});
