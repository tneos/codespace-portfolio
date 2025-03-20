<?php
include_once 'head.php';


// Start the session at the beginning
session_start();

// Display any error messages if present
if (isset($errors) && !empty($errors)) {
  foreach ($errors as $msg) {
    echo // Error message element
    '
    <div id="user-msg" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <h3 class="item-added-message montserrat-300 text-center">'
      . $msg .
      '</h3>
          <button type="button" id="close-msg" class="btn-close me-2 m-auto"></button>
        </div>
    </div>
';

    // Handle error message
    echo '
            <script type="module">
              const userMsg = document.getElementById("user-msg");
              const btnClose = document.getElementById("close-msg");

              btnClose.addEventListener("click", (e) => {
                  userMsg.classList.add("user-msg-remove");

              }); 
              setTimeout(() => {
                 userMsg.classList.add("user-msg-remove");
              }, 2000);                 
            </script>';
  }
}




?>

<section class="vh-75 pt-2">
  <div class="container h-75">
    <div class="row d-flex justify-content-center align-items-center login-container">
      <a class="btn btn-light back-home" href="../views/index.php">Back Home</a>
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center montserrat-300 h1 mb-5 mx-1 mx-md-4 mt-4">Login</p>

                <form class="mx-1 mx-md-4" action="../actions/login_action.php" method="post">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Email</label>
                      <input
                        data-test="email-input"
                        type="text"
                        name="email"
                        class="form-control"
                        required
                        placeholder="Enter email" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="pass">Password</label>
                      <input
                        data-test="password-input"
                        type="password"
                        name="pass"
                        class="form-control"
                        placeholder="Enter password" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button
                      type="submit"
                      data-mdb-button-init
                      data-mdb-ripple-init
                      class="btn btn-light card-button montserrat-300"
                      data-test="login-submit">
                      Login
                    </button>
                  </div>
                  <div class="form-group">
                    <p class="montserrat-300">Don't have an account?<a href="register.php" class="link-underline-dark montserrat-300 text-dark mx-2">Register </a></p>
                  </div>
                </form>
              </div>
              <div
                class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img
                  src="../assets/images/log-in.png"
                  class="img-fluid w-50 mx-auto"
                  alt="Registration image" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include 'footer.php'; ?>