<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Our shop</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>

  <!-- Add bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>


  <!-- Link to style.css -->
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">

  <!-- Link to web font-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

  <!-- Link to web icon-->
  <!-- Creative Commons image sourced from https://www.freelogodesign.org and used for educational purposes only -->
  <link rel="icon" href="media/theme/icon.png">
  <script src='../wireframe.js'></script>

  <!-- Link to script.js -->
  <script defer src="script.js"></script>

  <!-- Link to tools.php -->
  <?php include 'tools.php';?>
  <?php include 'database.php';?>

</head>

<body>
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "shopDatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  ?>

  <div class="container">
    <nav id="top-bar" class="navbar navbar-expand-sm shadow">
      <a class="navbar-brand" href="index.php"><img src="media/theme/logo.png" alt="Shop logo"></a>
      <ul class="nav nav-pills ml-auto user-menu">
        <li class="nav-item">
          <a class="nav-link btn btn-primary" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Products
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            foreach($categoryarray as $cate){
              echo "<a class='dropdown-item' href='category.php?cg=".str_replace(' ','-',strtolower($cate))."'>".$cate."</a>";
            }
          ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary" href="cart.php">Cart</a>
        </li>
        <?php
            if(empty($_SESSION['admin'])){
              echo "<li class='nav-item'><a class='nav-link btn btn-primary' href='login.php'>Login</a></li>";
            }
            else {
              echo "<li class='nav-item'><a class='nav-link btn btn-primary' href='controlpanel.php'>Control panel</a></li>";
              echo "<li class='nav-item'><a class='nav-link btn btn-primary' href='logout.php'>Logout</a></li>"; 
            }
          ?>
      </ul>
    </nav>

    <div id="wrapper">
      <section id="about-us">
        <h3 id="about-heading">About us</h3>
        <p style="font-size: 16px;"> Started in 2020 in Vietnam, with the mission statement of preserving people's health through quality mask products. Especially during the COVID-19 pandemic, we ensure you that we have everything in stock at all times and our quality as not been compromised. Due to that please feel free to shop as much as you need to protect yourself. your family's and community's health.<div style="color: red; font-size: 18px; text-align: center;"> **NOTE: THIS IS NOT A REAL WEBSITE. THIS IS AN ASSIGNMENT FOR WEB PROGRAMMING FROM RMIT VIETNAM**</div></p>
      </section>
      <br>
      <div class="row feature_box">
        <div class="col-md-4">
          <div class="service">
            <div class="responsive">
              <img src="media/theme/feature_img_2.png" alt="Feature image" />
              <h5>MODERN <strong>DESIGN</strong></h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <div class="customize">
              <img src="media/theme/feature_img_1.png" alt="Feature image" />
              <h5>FREE <strong>SHIPPING</strong></h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <div class="support">
              <img src="media/theme/feature_img_3.png" alt="Feature image" />
              <h5>24/7 LIVE <strong>SUPPORT</strong></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="container my-4">

        <div id="feature-carousel" class="carousel slide carousel-multi-item" data-ride="carousel">
          <div class="d-flex section-heading">
            <h4 class="title">
              <span class="text"><span class="line"><b>Feature</b> <strong>Products</strong></span></span>
            </h4>
            <div class="ml-auto">
              <a class="arrow button" href="#feature-carousel" data-slide="prev"><img src="media/theme/arrow-pleft.png"
                  alt="Left arrow"></a>
              <a class="arrow button" href="#feature-carousel" data-slide="next"><img src="media/theme/arrow-p.png"
                  alt="Right arrow"></a>
            </div>

          </div>
          <ol class="carousel-indicators">
            <li data-target="#feature-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#feature-carousel" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="row">
                <?php
                  $productselect = "SELECT id, productname, price, product_type, main_image FROM Products WHERE id ='PD003' OR id ='PD007' OR id='PD006'";
                  $result = mysqli_query($conn, $productselect) or die(mysqli_error());
                  $productarray = array();
                  while($row = mysqli_fetch_assoc($result)) {
                    $productarray[] = $row;
                  }
                  foreach ($productarray as $num => $info){
                    $imgarray = explode("|",$info['main_image']);
                    echo "<div class='col-md-4'><div class='card product-box mb-2'><a href='product-detail.php?id={$info['id']}'><img class='card-img-top' src=";
                    echo "'media/product/".$imgarray[0]."' alt='Product image'></a>";
                    echo "<div class='card-body'><a href='product-detail.php?id={$info['id']}' class='title'>".$info['productname']."</a><br>";
                    echo "<a href='category.php?cg=".str_replace(' ','-',strtolower($info['product_type']))."' class='category'>".$info['product_type']."</a>";
                    echo "<p class='price'>$".$info['price']."</p></div></div></div>";
                  }
                ?>
              </div>

            </div>

            <div class="carousel-item">
              <div class="row">
                <?php
            $productselect = "SELECT id, productname, price, product_type, main_image FROM Products WHERE id ='PD005' OR id ='PD001' OR id='PD008'";
            $result = mysqli_query($conn, $productselect) or die(mysqli_error());
            $productarray = array();
            while($row = mysqli_fetch_assoc($result)) {
              $productarray[] = $row;
            }
            foreach ($productarray as $num => $info){
              $imgarray = explode("|",$info['main_image']);
              echo "<div class='col-md-4'><div class='card product-box mb-2'><a href='product-detail.php?id={$info['id']}'><img class='card-img-top' src=";
              echo "'media/product/".$imgarray[0]."' alt='Product image'></a>";
              echo "<div class='card-body'><a href='product-detail.php?id={$info['id']}' class='title'>".$info['productname']."</a><br>";
              echo "<a href='".str_replace(' ','-',strtolower($info['product_type'])).".php' class='category'>".$info['product_type']."</a>";
              echo "<p class='price'>$".$info['price']."</p></div></div></div>";
            }
            ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container my-4">
        <h4 class="title">
          <span class="text"><span class="line"><b>All</b> <strong>Products</strong></span></span>
        </h4>
        <div class="row">
          <?php
            $productselect = "SELECT id, productname, price, product_type, main_image FROM Products";
            $result = mysqli_query($conn, $productselect) or die(mysqli_error());
            $productarray = array();
            while($row = mysqli_fetch_assoc($result)) {
              $productarray[] = $row;
            }
          foreach ($productarray as $num => $info){
            $imgarray = explode("|",$info['main_image']);
            echo "<div class='col-md-4'><div class='card product-box mb-2'><a href='product-detail.php?id={$info['id']}'><img class='card-img-top' src=";
            echo "'media/product/".$imgarray[0]."' alt='Product image'></a>";
            echo "<div class='card-body'><a href='product-detail.php?id={$info['id']}' class='title'>".$info['productname']."</a><br>";
            echo "<a href='category.php?cg=".str_replace(' ','-',strtolower($info['product_type']))."' class='category'>".$info['product_type']."</a>";
            echo "<p class='price'>$".$info['price']."</p></div></div></div>";
          }
          ?>
        </div>
      </div>

      <section class="our_client">
        <h4 class="title"><span class="text"><b>Manufacturers</b></span></h4>
        <div class="row">
          <div class="col-md-2">
            <a href="#"><img alt="" src="media/theme/manu5.png"></a>
          </div>
          <div class="col-md-2">
            <a href="#"><img alt="" src="media/theme/manu6.png"></a>
          </div>
          <div class="col-md-2">
            <a href="#"><img alt="" src="media/theme/manu1.png"></a>
          </div>
          <div class="col-md-2">
            <a href="#"><img alt="" src="media/theme/manu2.png"></a>
          </div>
          <div class="col-md-2">
            <a href="#"><img alt="" src="media/theme/manu3.png"></a>
          </div>
          <div class="col-md-2">
            <a href="#"><img alt="" src="media/theme/manu4.png"></a>
          </div>
        </div>
      </section>
    </div>

    <footer>
      <a href="#top-bar"><img id="TopBtn" src="media/theme/gotop.png" alt="Back to Top"></a>
      <section id="footer-bar">
        <div class="row">
          <div class="col-md-3">
            <h4>Navigation</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <?php
            foreach($categoryarray as $cate){
              echo "<li><a href='category.php?cg=".str_replace(' ','-',strtolower($cate))."'>".$cate."</a></li>";
            }
          ?>
            </ul>
          </div>
          <div class="col-md-4">
            <h4>User</h4>
            <ul>
            <?php
            if(empty($_SESSION['admin'])){
              echo "<li><a href='login.php'>Login</a></li>";
            }
            else {
              echo "<li><a href='logout.php'>Logout</a></li>"; 
            }
          ?>
              <li><a href="cart.php">Cart</a></li>
            </ul>
          </div>
          <div class="col-md-5">
            <p><img src="media/theme/logo.png" class="site_logo" alt=""></p>
            - Assignment by Group 17: <br>
            Vo An Huy (s3804220 - <a href="https://github.com/s3804220/s3804220.github.io" class="git-link"
              target="_blank">GithubRepo</a>),
            <br>Doan Nguyen My Hanh (s3639869 - <a href="https://github.com/s3639869/wp" class="git-link" target="
              _blank">Github Repo</a>)
          </div>
        </div>
      </section>
      <section id="copyright">
        <span>Copyright 2013 bootstrappage template All right reserved.</span>
      </section>
    </footer>
  </div>
</body>

</html>