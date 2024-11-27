<?php
include('head.php');
include('navbar.php');
?>

<body>


    <!--Home-->

    <section id="home">
        <div class="container home-container">
            <h5 class="py-1 montserrat-300 home-title">NEW ARRIVALS</h5>
            <h6 class="py-2 montserrat-300 home-details">Find your favourite brand</h6>
            <h6 class="py-2 montserrat-300 home-details">Discover our selection of some of the finest luxury watches on the market</h6>
            <a href="products.php" class="btn btn-light montserrat-300">Shop Now</a>
        </div>
    </section>

    <!--Brands-->
    <section id="brands" class="container container-lg">
        <div class="row">
            <img src="../assets/images/ulysse.png" alt="seiko logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
            <img src="../assets/images/rolex.svg" alt="rolex logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
            <img src="../assets/images/omega.svg" alt="omega logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
            <img src="../assets/images/timex.png" alt="timex logo" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        </div>
    </section>

    <!--New Products-->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <?php include('../actions/get_new_products.php') ?>

            <?php while ($row = $new_products->fetch_assoc()) { ?>
                <div class="new-prod-container col-lg-4 col-md-12 col-sm-12 p-0">
                    <img src="<?php echo $row['item_img'] ?>" alt="echo $row['item_name']" class="img-fluid">
                    <div class="new-prod-details">
                        <h3 class="montserrat-300 py-2 new-prod-title"><?php echo $row['item_name'] ?></h3>
                        <a href="<?php echo "singleProduct.php?item_id=" . $row['item_id']; ?>" class="btn btn-dark montserrat-300">Shop Now</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!--Featured-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3 class="montserrat-300">Featured Products</h3>
            <hr />
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('../actions/get_featured_products.php') ?>

            <?php while ($row = $featured_products->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid featured-img" src="<?php echo $row['item_img'] ?>" alt="item image" />
                    <h5 class="montserrat-300 py-2 featured-name"><?php echo $row['item_name'] ?></h5>
                    <h4 class="montserrat-300 py-2 featured-price">£<?php echo $row['item_price'] ?></h4>
                    <a href="<?php echo "singleProduct.php?item_id=" . $row['item_id']; ?>"><button class="btn btn-light montserrat-300 featured-btn">Buy Now</button></a>
                </div>

            <?php } ?>
        </div>
    </section>

    <?php include('footer.php'); ?>