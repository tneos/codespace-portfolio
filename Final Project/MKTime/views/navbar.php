<?php
include('head.php');
include('../actions/retrieve_cart_items.php');
include('../actions/session.php');
require('../connect_db.php');





// Check if user logged in
if (isset($_SESSION['first_name'])) {
    $welcome = "Welcome " . $_SESSION['first_name'];

    retrieveCartItems($link);
    if (isset($_SESSION['cart'])) {
        if (count($_SESSION['cart']) === 0) {
            $countNumber = '';
        } else {
            $countNumber = count($_SESSION['cart']);
        }
    }















    echo '
    <div class="row navbar-row fixed-top bg-white">
        <nav class="navbar navbar-expand-lg">
                    <div class="nav-container">
                        <a class="navbar-brand logo-link" href="../views/index.php">
                            <img class="img-fluid logo" src="../assets/images/logo.png" alt="logo">
                        </a>
                        <button
                            class="navbar-burger navbar-toggler p-2 rounded-1 border-0 bg-light"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarText"
                            aria-controls="navbarText"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <svg
                                width="24"
                                height="24"
                                viewbox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M3 12H21"
                                    stroke="black"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M3 6H21"
                                    stroke="black"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M3 18H21"
                                    stroke="black"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </button>
                        <div class="navbar-collapse collapse nav-list-container logged" id="navbarText">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link josefin-slab-thin" aria-current="page" href="products.php" data-test="our watches">Our Watches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link josefin-slab-thin" aria-current="page" href="smartProducts.php" data-test="Smart Watches">Smart Watches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link josefin-slab-thin" aria-current="page" href="analogProducts.php" data-test="Analog">Analog</a>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-around position-relative icons icons-logged">
                                <p class="montserrat-300 welcome-message">' . $welcome . '</p>
                                <img
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#userText"
                                    type="button"
                                    aria-expanded="false"
                                    aria-controls="userText"
                                    src="../assets/images/person.svg"
                                    alt="person"
                                    id="user-icon"
                                >
                                <a href="cart.php">
                                ' .
        $countNumber
        . '
                                <img src="../assets/images/basket.svg" alt="basket" class="basket-icon">
                                </a>
                                <div class="collapse position-absolute top-100 start-0 user" id="userText">
                                    <a class="btn btn-sm josefin-slab-thin user-info" type="submit" data-test="logout-link" href = "logout.php?redirect=<?php echo base64_encode(curPageURL()); ?>">Logout</a>
                                    
                                </div>
                            </div>
  ';
} else {
    echo '
    <div class="row navbar-row fixed-top bg-white">
        <nav class="navbar navbar-expand-lg">
                    <div class="nav-container">
                        <a class="navbar-brand logo-link" href="../views/index.php">
                            <img class="img-fluid logo" src="../assets/images/logo.png" alt="logo">
                        </a>
                        <button
                            class="navbar-burger navbar-toggler p-2 rounded-1 border-0 bg-light"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarText"
                            aria-controls="navbarText"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <svg
                                width="24"
                                height="24"
                                viewbox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M3 12H21"
                                    stroke="black"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M3 6H21"
                                    stroke="black"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M3 18H21"
                                    stroke="black"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </button>
                        <div class="navbar-collapse collapse nav-list-container" id="navbarText">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link josefin-slab-thin" aria-current="page" href="products.php" data-test="our watches">Our Watches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link josefin-slab-thin" aria-current="page" href="smartProducts.php" data-test="Smart Watches">Smart Watches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link josefin-slab-thin" aria-current="page" href="analogProducts.php" data-test="Analog">Analog</a>
                                </li>
                            </ul>
    <div class="d-flex justify-content-around position-relative icons">
                                <img
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#userText"
                                    type="button"
                                    aria-expanded="false"
                                    aria-controls="userText"
                                    src="../assets/images/person.svg"
                                    alt="person"
                                    id="user-icon"
                                    data-test="user-icon"
                                >
                                <a href="#">
                                <img src="../assets/images/basket.svg" alt="basket" class="basket-icon">
                                </a>
                                <div class="collapse position-absolute top-100 start-0 user" id="userText">
                                    <a class="btn btn-sm josefin-slab-thin user-info" href="login.php" data-test="login-link">Login</a>
                                    <a class="btn btn-sm josefin-slab-thin user-info" href="register.php" data-test="create-account-link">Create an account</a>
                                </div>
                            </div>
    ';
}

echo '

                    </div>
        </nav>
</div> 
  ';
