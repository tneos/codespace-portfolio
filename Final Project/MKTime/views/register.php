<?php
include('head.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  # Connect to the database.
  require('../connect_db.php');

  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if (empty($_POST['first_name'])) {
    $errors[] = 'Enter your first name.';
  } else {
    $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
  }
  # Check for last name
  # Check for a first name.
  if (empty($_POST['last_name'])) {
    $errors[] = 'Enter your last name.';
  } else {
    $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
  }

  # Check for an email address:
  # Check for a first name.
  if (empty($_POST['email'])) {
    $errors[] = 'Enter your email address.';
  } else {
    $e = mysqli_real_escape_string($link, trim($_POST['email']));
  }

  # Check for a password and matching input passwords.
  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Passwords do not match.';
    } else {
      $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
    }
  } else {
    $errors[] = 'Enter your password.';
  }

  # Check if email address already registered.
  if (empty($errors)) {
    $q = "SELECT user_id FROM users WHERE email='$e'";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0)
      $errors[] =
        ' <p class="alert-link" data-test="register-error-msg">Email address already registered 
<a class="alert-link" href="login.php" data-test="register-error-msg">Sign In Now</a>
</p>';
  }

  # On success register user inserting into 'users' database table.
  if (empty($errors)) {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	VALUES ('$fn', '$ln', '$e', '$p', NOW() )";
    $r = @mysqli_query($link, $q);
    if ($r) {
      echo '
      <div class="container" data-test="register-success-container">
     <p data-test="register-success-msg">You are now registered.</p>
	  <a class="btn btn-light card-button montserrat-300" href="login.php" data-test="register-success-btn">Login</a>
    </div>
    ';
    }

    # Close database connection.
    mysqli_close($link);
    exit();
  }

  # Or report errors.
  else {
    foreach ($errors as $msg) {
      echo '
    <div id="validation-error" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <h3 class="item-added-message montserrat-300 text-center">'
        . $msg .
        '</h3>
          <button type="button" id="close-error" class="btn-close me-2 m-auto"></button>
        </div>
    </div>
';

      // Handle error message
      echo '
            <script type="module">
              const validationError = document.getElementById("validation-error");
              const btnClose = document.getElementById("close-error");

              btnClose.addEventListener("click", (e) => {
                  validationError.classList.add("validation-error-remove");

              }); 
              setTimeout(() => {
                 validationError.classList.add("validation-error-remove");
              }, 2000);                 
            </script>';
    }

    # Close database connection.
    mysqli_close($link);
  }
}
?>

<section class="vh-75 pt-2">
  <div class="container h-75">
    <div class="row d-flex justify-content-center align-items-center register-container">
      <a class="btn btn-light back-home" href="../views/index.php" data-test="back-home-button">Back Home</a>
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center montserrat-300 h1 mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="register.php" method="post">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="inputfirst_name">First Name</label>
                      <input
                        type="text"
                        name="first_name"
                        id="firstName"
                        class="form-control"
                        required
                        value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"
                        data-test="register-first-name" />

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="inputlast_name">Last Name</label>
                      <input
                        type="text"
                        name="last_name"
                        id="last_name"
                        class="form-control"
                        required
                        value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"
                        data-test="register-last-name" />

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="inputemail">Your Email</label>
                      <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="<?php if (isset($_POST['email']))
                                  echo $_POST['email']; ?>"
                        data-test="register-email" />

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="inputpass1">Password</label>
                      <input
                        type="password"
                        name="pass1"
                        id="pass1"
                        class="form-control"
                        value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"
                        data-test="register-pass1" />

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="inputpass2">Repeat your password</label>
                      <input
                        type="password"
                        name="pass2"
                        id="pass2"
                        class="form-control"
                        value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"
                        data-test="register-pass2" />

                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button
                      type="submit"
                      data-mdb-button-init
                      data-mdb-ripple-init
                      class="btn btn-light card-button montserrat-300"
                      data-test="register-submit">
                      Register
                    </button>
                  </div>
                  <div class="form-group">
                    <p class="montserrat-300">Do you have an account?<a href="login.php" class="link-underline-dark montserrat-300 text-dark mx-2">Login</a></p>
                  </div>
                </form>
              </div>
              <div
                class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img
                  src="../assets/images/registration.png"
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