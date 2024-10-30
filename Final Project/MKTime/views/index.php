<?php 
  include('head.php');
  include('navbar.php');

  echo
  '
   <body>
        
           
                <!--Home-->
            </div>
            <section id="home">
                    <div class="container">
                        <h5 class="py-1 montserrat-300 home-title">NEW ARRIVALS</h5>
                        <h6 class="py-2 montserrat-300 home-details">Find your favourite brand</h6>
                        <h6 class="py-2 montserrat-300 home-details">Discover our selection of some of the finest luxury watches on the market</h6>
                        <button class="btn btn-light montserrat-300">Shop Now</button>
                    </div>
            </section>

            <!--Brands-->
            <section id="brands" class="container">
                <div class="row">
                    <img src="../assets/images/ulysse.png" alt="seiko logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
                    <img src="../assets/images/rolex.svg" alt="rolex logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
                    <img src="../assets/images/omega.svg" alt="omega logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
                    <img src="../assets/images/timex.png" alt="timex logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
                </div>
            </section>

            <!--Featured-->
                <section id="new" class="w-100">
                    <div class="row p-0 m-0">
                        <div class="featured-container col-lg-4 col-md-12 col-sm-12 p-0">
                            <img src="../assets/images/analog1.jpg" alt="item image" class="img-fluid">
                            <div class="featured-details">
                                <h3 class="montserrat-300 py-2 featured-title">Uhrgebiet</h3>
                                <button class="btn btn-dark montserrat-300">Shop Now</button>
                            </div>
                        </div>
                        <div class="featured-container col-lg-4 col-md-12 col-sm-12 p-0">
                            <img src="../assets/images/analog2.jpg" alt="item image" class="img-fluid">
                            <div class="featured-details">
                                <h3 class="montserrat-300 py-2">Michael Kors</h3>
                                <button class="btn btn-dark montserrat-300">Shop Now</button>
                            </div>
                        </div>
                        <div class="featured-container col-lg-4 col-md-12 col-sm-12 p-0">
                            <img src="../assets/images/analog3.jpg" alt="item image" class="img-fluid">
                            <div class="featured-details">
                                <h3 class="montserrat-300 py-2">Raymond Weil</h3>
                                <button class="btn btn-dark montserrat-300">Shop Now</button>
                            </div>
                        </div>
                    </div>
                </section>


            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
  ';
  include('footer.php')
?>


    