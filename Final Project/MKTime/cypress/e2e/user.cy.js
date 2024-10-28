describe("template spec", () => {
  // For each test
  beforeEach(() => {
    cy.visit("http://localhost/mktime/MKTime/views/index.php");
  });

  it("go to the home page", () => {
    cy.visit("http://localhost/mktime/MKTime/views/index.php");
  });

  it("go to login page", () => {
    cy.visit("http://localhost/mktime/MKTime/views/index.php");
    cy.get('[data-test="user-icon"]').click();
    cy.get('[data-test="login-link"]').click();
  });

  //   it("log user in", () => {
  //     cy.visit("http://localhost/mktime/MKTime/views/index.php");
  //     cy.get('[data-test="login-link"]').click();
  //     cy.get('[data-test="email-input"]').type("johndoe@example.com");
  //     cy.get('[data-test="password-input"]').type("password123");
  //     cy.get('[data-test="login-submit"]').click();
  //   });

  //   it("create account page", () => {
  //     cy.get('[data-test="create-account-link"]').click();
  //   });

  //   it("not let users create an account with the same email address twice", () => {
  //     cy.get('[data-test="create-account-link"]').click();
  //     cy.get('[data-test="register-first-name"]').type("John");
  //     cy.get('[data-test="register-last-name"]').type("Doe");
  //     cy.get('[data-test="register-email"]').type("johndoe@example.com");
  //     cy.get('[data-test="register-pass1"]').type("mags123");
  //     cy.get('[data-test="register-pass2"]').type("mags123");
  //     cy.get('[data-test="register-submit"]').click();
  //     cy.get('[data-test="register-error"]').should("exist");
  //     cy.get('[data-test="register-first-name"]')
  //       .contains("Email address already registered")
  //       .should("exist");
  //     cy.get('[data-test="back-home-button"]').click();
  //     cy.get('[data-test="register-error"]').should("not.exist");
  //   });

  //   it("checks passwords are the same", () => {
  //     cy.get('[data-test="create-account-link"]').click();
  //     cy.get('[data-test="register-first-name"]').type("Thomas");
  //     cy.get('[data-test="register-last-name"]').type("Young");
  //     cy.get('[data-test="register-email"]').type("thomas@example.com");
  //     cy.get('[data-test="register-pass1"]').type("thomas123");
  //     cy.get('[data-test="register-pass2"]').type("thomas123");
  //     cy.get('[data-test="register-submit"]').click();
  //     cy.get('[data-test="register-error"]').should("exist");
  //     cy.get('[data-test="register-error"]').contains("Passwords do not match").should("exist");
  //     cy.get('[data-test="back-home-button"]').click();
  //     cy.get('[data-test="register-error"]').should("not.exist");
  //   });

  //   it("create an account and sign in", () => {
  //     cy.get('[data-test="create-account-link"]').click();
  //     cy.get('[data-test="create-account-link"]').click();
  //     cy.get('[data-test="register-first-name"]').type("Thomas");
  //     cy.get('[data-test="register-last-name"]').type("Young");
  //     cy.get('[data-test="register-email"]').type("thomas@example.com");
  //     cy.get('[data-test="register-pass1"]').type("thomas123");
  //     cy.get('[data-test="register-pass2"]').type("thomas123");
  //     cy.get('[data-test="register-submit"]').click();
  //     cy.get('[data-test="register-success"]').click();
  //     cy.get('[data-test="email-input"]').type("thomas@example.com");
  //     cy.get('[data-test="password-input"]').type("thomas123");
  //     cy.get('[data-test="login-submit"]').click();
  //   });

  //   it("log a user out", () => {
  //     cy.get('[data-test="logout-link"]').click();
  //     cy.get('[data-test="login-link"]').should("not.exist");
  //   });
});
