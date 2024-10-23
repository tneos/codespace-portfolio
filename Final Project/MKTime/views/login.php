<?php
include_once 'navbar.php';
include_once 'head.php';


// Start the session at the beginning
//start_session_function();

// Display any error messages if present
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    echo '<p id="err_msg">Oops! There was a problem:<br>';
    foreach ($_SESSION['errors'] as $msg) {
        echo " - $msg<br>";
    }
    echo 'Please try again or <a href="register.php">Register</a></p>';
    unset($_SESSION['errors']);
}
?>

<section class="vh-100 mt-5" >
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center montserrat-300 h1 mb-5 mx-1 mx-md-4 mt-4">Login</p>

                <form class="mx-1 mx-md-4" action="login_action.php" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <label class="form-label" for="email">Email</label>
                      <input type="text" name="email" class="form-control" required placeholder="* Enter email" />
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password">Password</label>
                      <input type="text" name="password" class="form-control" placeholder="* Enter password" />
                      
                    </div>
                  </div>

                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light card-button montserrat-300">Login</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../images/log-in.png"
                  class="img-fluid w-50 mx-auto" alt="Registration image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>