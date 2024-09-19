<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Love Fashion</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <h1 display-3>LoveFashion</h1>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto  d-flex justify-content-end w-100">
            <li class="nav-item mt-2">
              <h1 class="m-2"><i class="bi bi-shop fs-6 align-top"></i></h1>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" href="create.php">Create</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" href="update.php">Update</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" href="delete.php">Delete</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
  
      <h2 class="my-4 text-center">Featured products</h2>
      <div class="row my-4">
        <div class="col-lg-4 col-md-4">
          <div class="card">
            <img
              src="img/red-t.jpg"
              style="height: 18rem"
              class="card-img-top img-responsive"
              alt="adidas"
            />
            <div class="card-body">
              <h5 class="card-title">Adidas</h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugit quod
                voluptatem, minus rem, consectetur saepe eveniet.
              </p>
              <a href="#" class="btn btn-primary">Find out more</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="card">
            <img src="img/purple-t.jpg" style="height: 18rem" class="card-img-top" alt="nike" />
            <div class="card-body">
              <h5 class="card-title">Nike</h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe dignissimos dolorem
                cupiditate illo commodi eius dolor cumque, soluta.
              </p>
              <a href="#" class="btn btn-primary">Find out more</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="card">
            <img
              src="img/green-t.jpg"
              style="height: 18rem"
              class="card-img-top img-responsive"
              alt="puma"
            />
            <div class="card-body">
              <h5 class="card-title">Puma</h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ipsam quia
                distinctio tempora similique commodi itaque numquam.
              </p>
              <a href="#" class="btn btn-primary">Find out more</a>
            </div>
          </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
</body>
</html>