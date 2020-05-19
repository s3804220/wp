<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cinemax</title>

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee+Inline">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

  <!-- Link to web icon-->
  <!-- Creative Commons image sourced from https://www.freelogodesign.org/preview?lang=en&name=&logo=3cb08b7e-706d-4539-a663-82c8ea221204 and used for educational purposes only -->
  <link rel="icon" href="media/icon.png">
  <script src='../wireframe.js'></script>

  <!-- Link to script.js -->
  <script defer src="script.js"></script>

  <!-- Link to tools.php and link index.php to style.css -->
  <?php include 'tools.php';?>
  <style><?php include('style.css');?></style>
</head>

<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nameErr = '';
    if (empty($_POST["custname"])) {
      $nameErr = "Name is required";
    } else {
      $name = $_POST["custname"];
      if (!preg_match("/^[a-zA-Z\'\.\-]+[\s]?([a-zA-Z\'\.\-]+[\s]?)+$/", $name)){
        $nameErr = "Invalid name format.";
      }
    }

    $emailErr = "";
    if (empty($_POST["custemail"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $emailErr = "Invalid email format";
      }
    }

    $mobileErr = "";
    if (empty($_POST["custmobile"])) {
      $mobileErr = "Mobile phone is required";
    } else {
      $mobile = test_input($_POST["custmobile"]);
      if (!preg_match("/^(\(04\)|04|\+61[\s]?4)[\s]?(\d[\s]?){8}$/", $mobile)){
        $mobileErr = "Invalid phone number format. Australian mobie phone only.";
      }
    }

    $cardErr = "";
    if (empty($_POST["custcard"])) {
      $cardErr = "Credit card is required";
    } else {
      $card = test_input($_POST["custcard"]);
      if (!preg_match("/^(\d[\s]?){14,19}$/", $card)){
        $cardErr = "Invalid credit card format.";
      }
    }
    
    $expiryErr = "";
    if (empty($_POST["custexpiry"])) {
      $expiryErr = "Credit card expiry date is required.";
    } else {
      $expiry = test_input($_POST['custexpiry']);
      if (date_diff(date(Y-m), $expiry)){
        $expirydErr = "Credit card is about to expire. Please choose another card.";
      }
    }
  } 
  ?>
  <div class="container">
    <header id="top">
      <a href="index.html"><img src="media/logo-banner.jpg" alt="company-logo" id="logo" width="100%"></a>
      <div class="jumbotron">
        <p id="company">Bring your cine experience to new heights <br> Here at <span id="company-name">CINEMAX</span>
        </p>
        <!-- Creative Commons image sourced from https://www.freelogodesign.org/preview?lang=en&name=&logo=3cb08b7e-706d-4539-a663-82c8ea221204 and used for educational purposes only -->
        <img src="media/icon.png" alt="cinema-icon">
      </div>
    </header>
    <div class="head-strip"></div>

    <nav id="navigation" class="navbar sticky-top navbar-expand-sm shadow">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link btn btn-primary btn-lg" href="#About-us" role="button">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary btn-lg" href="#pricing" role="button">PRICES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary btn-lg" href="#now-showing" role="button">NOW SHOWING</a>
        </li>
      </ul>
    </nav>
    <div class="head-strip"></div>
    <main>
      <article id='About-us' class="main-section">
        <div id="headBanner" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#headBanner" data-slide-to="0" class="active"></li>
            <li data-target="#headBanner" data-slide-to="1"></li>
            <li data-target="#headBanner" data-slide-to="2"></li>
            <li data-target="#headBanner" data-slide-to="3"></li>
            <li data-target="#headBanner" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="#now-showing"><img src="media/showing-banner.jpg" class="d-block w-100"
                  alt="Now Showing banner"></a>
            </div>
            <div class="carousel-item">
              <a href="#seat-intro"><img src="media/seating-banner.jpg" class="d-block w-100"
                  alt="Cinema seats banner"></a>
            </div>
            <div class="carousel-item">
              <a href="#Dolby-vision"><img src="media/dolby-vision-banner.jpg" class="d-block w-100"
                  alt="Dolby Vision banner"></a>
            </div>
            <div class="carousel-item">
              <a href="#Dolby-atmos"><img src="media/dolby-atmos-banner.jpg" class="d-block w-100"
                  alt="Dolby Atmos banner"></a>
            </div>
            <div class="carousel-item">
              <a href="#pricing"><img src="media/deal-banner.jpg" class="d-block w-100" alt="Special deals banner"></a>
            </div>
          </div>
          <a class="carousel-control-prev" href="#headBanner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#headBanner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br>
        <div id="intro">
          <h1 id="about-us-header">ABOUT US</h1>
          <br>
          <p style="text-align: justify;">Cinemax is a movie theatre that was established to serve local movie
            enthuasiasts. Even though Cinemax was
            founded a long time ago, our facilites has recently been renovated to make the experience of movie going
            even
            more enjoyable. This is an homage to all the time that this local communnity has supported us, so we also
            wanted
            to
            give back to this lovely town.</p>
        </div>
        <br>

        <h3 id="cinema-intro" class="content-title">Complete renovations</h3>
        <p class="intro-text">The experience of movie-goers is not contained only in the screen room, but it is in their
          every interaction with our cinema: from stepping in to get tickets, waiting for friends, to activities like
          buying popcorn or taking photos.
          <br>
          With that thought in mind, we have renovated our cinema to not only bring customers comfort <em>during</em>
          the movie-watching time, but also <em>before</em> and <em>after</em> watching the movie.</p>
        <div class="row">
          <div class="col-md-4">
            <img src="media/main-lobby.jpeg" alt="Main lobby image" class="img-fluid" style="padding: 10px;">
          </div>
          <div class="col-md-8">
            <p class="intro-text">
              Our lobby has been upgraded to include more food and drinks to suit customer's needs, as well as more
              chairs
              and even comfy sofas for customer to relax on. Other areas have also been renovated to bring a more
              stylish, modern and enjoyable experience to movie-goers.
            </p>
            <div class="more-info">
              <a class="dolby-btn" data-toggle="modal" data-target="#cinemalayout-modal" role="button">
                >> A more detailed look of our new cinema layout can be found here
              </a>
            </div>
          </div>
        </div>
        <div id="cinemalayout-modal" class="modal fade" tabindex="-1" role="dialog"
          aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content dolby-expand">
              <div class="modal-header dolby-header">
                <h5 class="modal-title"><b>Cinemax layout</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body dolby-body">
                <div id="cinemalayout-slide" class="carousel slide carousel-fade" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="media/lobby-1.jpg" class="img-fluid lobby-img" alt="Cinema Layout Image 1">
                      <div class="carousel-caption d-none d-md-block">
                        <p>Upgraded hallway to screen rooms with large, easy-to-see numbers and smooth flooring!</p>
                      </div>
                    </div>
                    <div class=" carousel-item">
                      <img src="media/lobby-2.jpg" class="img-fluid lobby-img" alt="Cinema Layout Image 2">
                      <div class="carousel-caption d-none d-md-block">
                        <p>More popcorns - the staple movie snack! Plus other food and drinks!</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="media/lobby-3.jpg" class="img-fluid lobby-img" alt="Cinema Layout Image 3">
                      <div class="carousel-caption d-none d-md-block">
                        <p>Hallway to washrooms even have a cinematic feel!</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="media/lobby-4.jpg" class="img-fluid lobby-img" alt="Cinema Layout Image 4">
                      <div class="carousel-caption d-none d-md-block">
                        <p>Cool cardboard images and posters of currently showing movies to take pictures and show off
                          with friends!</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="media/lobby-5.jpg" class="img-fluid lobby-img" alt="Cinema Layout Image 5">
                      <div class="carousel-caption d-none d-md-block">
                        <p>Kids (and older animated-movie-lovers) have something to take pictures with too!</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#cinemalayout-slide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#cinemalayout-slide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <div class="modal-footer dolby-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <br>

        <p class="intro-text">Of course, we did not forget to upgrade the <em>actual</em> movie-watching experience in
          the screen room. You can find
          out more about our newly installed seats and cinematic systems below. <img src="media/down-arrow.png"
            alt="Down arrow icon" height="25em" width="25em"></p>
        <br>

        <h3 id="seat-intro" class="content-title">More comfortable seats</h3>

        <p class="intro-text">Our goal is for you to have an immersive movie experience, with that in mind, we would
          like to introduce you
          to our newly equipped seats with better cushioning system. We acknowledge that movies' durations can be
          extensive, these newly upgraded seats will ensure your comfortability and prevent lumbar and back pain. </p>

        <br><br>

        <div class="row">
          <div class="col-md-4">
            <img src="media/standard-seat.jpg" alt="standard-seat" class="img-fluid seat-img">
          </div>
          <div class="col-md-8 seat-info">
            <h5 class="content-title">Standard Seating</h5>
            <p class="intro-text">Our new standard seats will now come with cupholders so you will never have to worry
              out spilling your
              drinks ever again. Our new standard seats will now come with more padding than ever before. Not only that,
              the seat
              cover is made with high quality faux leather to bring you an enjoyable movie
              exprience.</p>
          </div>
        </div>

        <br><br>

        <div class="row">
          <div class="col-md-4">
            <img src="media/first-class-seat.jpg" alt="first-class-seat" class="img-fluid seat-img">
          </div>
          <div class="col-md-8 seat-info">
            <div class="seat-content">
              <h5 class="content-title">First Class Seating</h5>
              <p class="intro-text">For those who craves a more luxurious movie experience, we have updated our first
                class furnitures.
                Which
                includes real leather covers, reclinable seats for a more comfortable sitting position to retractable
                tables to store all your needs. Never will you miss "the good part" of the movie from reaching down your
                seat to grab your popcorn again.</p>
            </div>
          </div>
        </div>
        <br><br>
        <div class="more-info">
          <div style="text-align: center;" class="seat-center">
            <a class="seat-btn" data-toggle="modal" data-target="#seat-modal" role="button">>> Snippet of our newly
              upgraded high quality seats</a></div>
        </div>
        <div id="seat-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content seat-expand">
              <div class="modal-header seat-header">
                <h5 class="modal-title"><b>Newly Upgraded Seats</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body seat-body">
                <div id="seat-slide" class="carousel slide carousel-fade" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="media/seat-img.jpeg" class="img-fluid" alt="Seat Image 1"
                        style="width:100%; height:555px;">
                    </div>
                    <div class=" carousel-item">
                      <img src="media/seat-img0.jpg" class="img-fluid" alt="Seat Image 2"
                        style="width:100%; height:555px;">
                    </div>
                    <div class=" carousel-item">
                      <img src="media/seat-img1.jpg" class="img-fluid" alt="Seat Image 3"
                        style="width:100%; height:555px;">
                    </div>
                    <div class="carousel-item">
                      <img src="media/seat-img3.jpg" class="img-fluid" alt="Seat Image 4"
                        style="width:100%; height:555px;">
                    </div>
                    <div class="carousel-item">
                      <img src="media/seat-img2.jpg" class="img-fluid" alt="Seat Image 5"
                        style="width:100%; height:555px;">
                    </div>

                  </div>
                  <a class="carousel-control-prev" href="#seat-slide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#seat-slide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <div class="modal-footer seat-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <br>
        <hr style="border: grey solid 1px;" size="10px">
        <div id="about-div">
        </div>
        <br>

        <h3 class="content-title">Cutting edge projection and sound system</h3>
        <p class="intro-text">As a stride toward cutting edge movie technologies, we have upgraded our movie projection
          and sound systems.
          We officially partnered with Dolby to brings you the best movie viewing experience without any compromises
          thanks to their Dolby 3D Vision and Dolby Atmos technologies.</p>

        <br>

        <div class="row">
          <div class="col-md-4">
            <img src="media/dolby-vision-img.png" alt="Dolby Vision Image" class="img-fluid dolby-sys-img">
          </div>
          <div class="col-md-8 dolby-info">
            <div class="dolby-content">
              <h5 id="Dolby-vision" class="content-title">Dolby 3D Vision</h5>
              <p class="intro-text">With Dolby 3D Vision, you now have the option to view your favorite upcoming movies
                in 3D with out any
                compromise to the video quality. Integrated with advanced HDR technology, movies quality will now come
                with a wider spectrum of color palette and contrast range. Furthermore, thanks to Dolby's 3D technology,
                our 3D option will now have superior picture quality comparing to other projection technologies. Not
                only that, it also comes with better 3D glasses which have different sizes to fit both adult and
                children.</p>
              <div class="more-info">
                <a class="dolby-btn" data-toggle="modal" data-target="#dVision-modal" role="button">
                  >> Snippet of the cinematic world through Dolby Vision
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="dVision-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content dolby-expand">
              <div class="modal-header dolby-header">
                <h5 class="modal-title"><b>Dolby 3D Vision</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body dolby-body">
                <div id="dVision-slide" class="carousel slide carousel-fade" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="media/dolby-vision-img1.png" class="img-fluid" alt="Dolby Vision Image 1">
                    </div>
                    <div class=" carousel-item">
                      <img src="media/dolby-vision-img2.png" class="img-fluid" alt="Dolby Vision Image 2">
                    </div>
                    <div class="carousel-item">
                      <img src="media/dolby-vision-img3.png" class="img-fluid" alt="Dolby Vision Image 3">
                    </div>
                    <div class="carousel-item">
                      <img src="media/dolby-vision-img4.png" class="img-fluid" alt="Dolby Vision Image 4">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#dVision-slide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#dVision-slide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <div class="modal-footer dolby-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


        <br><br>

        <div class="row">
          <div class="col-md-4">
            <img src="media/dolby-atmos-img.png" alt="Dolby Atmos Image" class="img-fluid dolby-sys-img">
          </div>
          <div class="col-md-8 dolby-info">
            <div class="dolby-content">
              <h5 id="Dolby-atmos" class="content-title">Dolby Atmos</h5>
              <p class="intro-text">Dolby Atmos will give you powerful and moving audio by using multiple speakers
                placed all around the room to give out high definition sound quality, so that you can now pick up every
                bit of sound that the
                sound producers intended for you to pick up, even the tiniest sounds such as when a movie character
                steps on a
                twig or things approaching from behind. As the result, movies now come to life like never before -
                making
                the experience even more immersive for the audience.</p>
              <div class="more-info">
                <a class="dolby-btn" data-toggle="modal" data-target="#dAtmos-modal" role="button">
                  >> Snippet of the cinematic world through Dolby Atmos
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="dAtmos-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content dolby-expand">
              <div class="modal-header dolby-header">
                <h5 class="modal-title"><b>Dolby Atmos</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body dolby-body">
                <div id="dAtmos-slide" class="carousel slide carousel-fade" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <p style="font-weight: bold; text-align: center;">The world of sound - Dolby Atmos</p>
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/91BUM3WhCfo" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen
                        style="display: block; margin: 0 auto;"></iframe>
                    </div>
                    <div class="carousel-item">
                      <img src="media/dolby-atmos1.jpg" class="img-fluid" alt="Dolby Atmos Image 1">
                    </div>
                    <div class=" carousel-item">
                      <img src="media/dolby-atmos2.jpg" class="img-fluid" alt="Dolby Atmos Image 2">
                    </div>
                    <div class="carousel-item">
                      <img src="media/dolby-atmos3.jpg" class="img-fluid" alt="Dolby Atmos Image 3">
                    </div>
                    <div class="carousel-item">
                      <img src="media/dolby-atmos4.jpg" class="img-fluid" alt="Dolby Atmos Image 4">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#dAtmos-slide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#dAtmos-slide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <div class="modal-footer dolby-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      </article>
      <div class="break">
      </div>
      <section id="pricing" class="main-section">
        <h1 id="pricing-header"><img src="media/tickets.svg" id="tickets-icon" alt="Tickets icon"> TICKET PRICES</h1>
        <br>
        <h4 id="special-offer">CELEBRATE OUR GRAND RE-OPENING WITH <img src="media/special-offer.png"
            alt="Special offer icon" style="width: 120px; vertical-align: bottom;"></h4>
        <br>
        <img src="media/promotion-banner.jpg" alt="Promotion banner" class="img-fluid">
        <br><br>
        <p class="intro-text">As an event to celebrate our re-opening and welcome back old as well as new movie-goers,
          we are offering
          special
          discounts on tickets for every type of seats. The discounted periods are:
          <ul>
            <li>
              <img src="media/popcorn.svg" alt="Popcorn icon" style="width: 40px; vertical-align: bottom;"> At 12PM on
              weekdays (from Monday to Friday <em>only</em>, does not include Saturday nor Sunday)
            </li>
            <li>
              <img src="media/popcorn.svg" alt="Popcorn icon" style="width: 40px; vertical-align: bottom;"> All day long
              on Mondays <strong>and</strong> Wednesdays
            </li>
          </ul>
          For more detailed information on our prices, please refer to the <a href="#price-table" id="price-ref">price
            table</a> below.
          <br>
          <br>
          <p class="intro-text">We have <strong>6</strong> types of seats for customers to choose from, including seats
            fitted for both
            adult
            and children.
            We hope the different choices of cinema seatings will provide our audience with the best comfort.</p>

          <i>Images of the seats can be found below (click to enlarge).</i>
          <br><br>
          <div class="row">
            <div class="col-md-4">
              <a role="button" data-toggle="modal" data-target="#sta-seat"><img src="media/STA.jpg"
                  alt="Standard Adult Seats" class="img-fluid seating-type seat-toggle"></a>
              <p class="seat-description">Standard Adult Seats</p>
            </div>
            <div class="col-md-4">
              <a role="button" data-toggle="modal" data-target="#stp-seat"><img src="media/STP.jpg"
                  alt="Standard Concession Seats" class="img-fluid seating-type seat-toggle"></a>
              <p class="seat-description">Standard Concession Seats</p>
            </div>
            <div class="col-md-4">
              <a role="button" data-toggle="modal" data-target="#stc-seat"><img src="media/STC.jpg"
                  alt="Standard Child Seats" class="img-fluid seating-type seat-toggle"></a>
              <p class="seat-description">Standard Child Seats</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <a role="button" data-toggle="modal" data-target="#fca-seat"><img src="media/FCA.jpg"
                  alt="First Class Adult Seats" class="img-fluid seating-type seat-toggle"></a>
              <p class="seat-description">First Class Adult Seats</p>
            </div>
            <div class="col-md-4">
              <a role="button" data-toggle="modal" data-target="#fcp-seat"><img src="media/FCP.jpg"
                  alt="First Class Concession Seats" class="img-fluid seating-type seat-toggle"></a>
              <p class="seat-description">First Class Concession Seats</p>
            </div>
            <div class="col-md-4">
              <a role="button" data-toggle="modal" data-target="#fcc-seat"><img src="media/FCC.jpg"
                  alt="First Class Child Seats" class="img-fluid seating-type seat-toggle"></a>
              <p class="seat-description">First Class Child Seats</p>
            </div>
          </div>
          <div id="sta-seat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body dolby-body">
                  <img src="media/STA.jpg" alt="Standard Adult Seats" class="img-fluid seating-type">
                </div>
                <div class="modal-footer dolby-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div id="stp-seat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body dolby-body">
                  <img src="media/STP.jpg" alt="Standard Concession Seats" class="img-fluid seating-type">
                </div>
                <div class="modal-footer dolby-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div id="stc-seat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body dolby-body">
                  <img src="media/STC.jpg" alt="Standard Child Seats" class="img-fluid seating-type">
                </div>
                <div class="modal-footer dolby-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div id="fca-seat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body dolby-body">
                  <img src="media/FCA.jpg" alt="First Class Adult Seats" class="img-fluid seating-type">
                </div>
                <div class="modal-footer dolby-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div id="fcp-seat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body dolby-body">
                  <img src="media/FCP.jpg" alt="First Class Concession Seats" class="img-fluid seating-type">
                </div>
                <div class="modal-footer dolby-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div id="fcc-seat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body dolby-body">
                  <img src="media/FCC.jpg" alt="First Class Child Seats" class="img-fluid seating-type">
                </div>
                <div class="modal-footer dolby-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <br>
          <p class="intro-text">
            With the variety of seats installed in our cinema, plus the lighting in the screen room as well as any extra
            equipments provided (such as tables for putting belongings, food or beverages), we hope customers can feel
            at
            home while enjoying the best movie experience without any discomfort or interference.
            Please choose tickets for the seats to your liking, we hope to see you real soon!
          </p>
          <br>
          <h5>Pricing table:</h5>
          <div class="table-responsive">
            <table class="table" id="price-table">
              <thead id="price-head">
                <tr>
                  <th scope="col" id="seat-head">Seat Type <span class="badge badge-dark">Seat Code</span></th>
                  <th scope="col" id="sale-head">
                    <p><span class="badge badge-success">ALL DAY</span> Monday & Wednesday <br>
                      <hr style="border: white solid 1px;"> 12PM <span class="badge badge-success">EVERY</span> weekday
                    </p>
                  </th>
                  <th scope="col" id="time-head">All other times</th>
                </tr>
              </thead>
              <tbody id="price-body">
                <tr>
                  <th scope="row">Standard Adult <span class="badge badge-dark">STA</span></th>
                  <td>14.00</td>
                  <td>19.80</td>
                </tr>
                <tr>
                  <th scope="row">Standard Concession <span class="badge badge-dark">STP</span></th>
                  <td>12.50</td>
                  <td>17.50</td>
                </tr>
                <tr>
                  <th scope="row">Standard Child <span class="badge badge-dark">STC</span></th>
                  <td>11.00</td>
                  <td>15.30</td>
                </tr>
                <tr>
                  <th scope="row">First Class Adult <span class="badge badge-dark">FCA</span></th>
                  <td>24.00</td>
                  <td>30.00</td>
                </tr>
                <tr>
                  <th scope="row">First Class Concession <span class="badge badge-dark">FCP</span></th>
                  <td>22.50</td>
                  <td>27.00</td>
                </tr>
                <tr>
                  <th scope="row">First Class Child <span class="badge badge-dark">FCC</span></th>
                  <td>21.00</td>
                  <td>24.00</td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
      </section>
      <div class="break">
      </div>
      <section id="now-showing" class="main-section">
        <h1 id="showing-header"><img src="media/camera.svg" id="movie-icon" alt="Camera icon"> NOW SHOWING</h1>
        <br>
        <div id="carouselMovies" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselMovies" data-slide-to="0" class="active"></li>
            <li data-target="#carouselMovies" data-slide-to="1"></li>
            <li data-target="#carouselMovies" data-slide-to="2"></li>
            <li data-target="#carouselMovies" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="media/avengers-banner.jpg" class="d-block w-100" alt="Avengers Endgame banner">
            </div>
            <div class="carousel-item">
              <img src="media/topend-banner.jpg" class="d-block w-100" alt="Top End Wedding banner">
            </div>
            <div class="carousel-item">
              <img src="media/Dumbo-banner.jpeg" class="d-block w-100" alt="Dumbo banner">
            </div>
            <div class="carousel-item">
              <img src="media/the-happy-prince-banner.jpg" class="d-block w-100" alt="The Happy Prince banner">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselMovies" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselMovies" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br>
        <p>To read the movie's synopsis, watch the trailer and book tickets, please refer to the "Details & Booking"
          link for each movie.</p>

        <div class="row row-cols-1 row-cols-md-2">
          <div class="col d-flex">
            <div class="card mb-4 flex-fill movie-card" id="moviePanelACT">
              <div class="row no-gutters">
                <div class="col-lg-6">
                  <img src="media/avengers.jpg" class="card-img movie-poster" alt="Avengers Endgame Poster">
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <h5 class="card-title">Avengers: Endgame</h5>
                    <p class="card-text showtime">Wednesday - 9pm
                      <br>
                      Thursday - 9pm
                      <br>
                      Friday - 9pm
                      <br>
                      Saturday - 6pm
                      <br>
                      Sunday - 6pm
                    </p>
                    <br>
                    <p class="card-text more-details" onclick="toggleSynopsis('ACT');"><a
                        href="#synopsisACT"><img src="media/clapperboard.svg" alt="clapperboard icon"
                          class="more-details-icon"> Details & Booking</a></p>
                    <img src="media/PG-13.svg" alt="Rated PG-13" width="35%" class="movie-rating">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card mb-4 flex-fill movie-card" id="moviePanelRMC">
              <div class="row no-gutters">
                <div class="col-lg-6">
                  <img src="media/topend-wedding.jpg" class="card-img movie-poster" alt="Top End Wedding Poster">
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <h5 class="card-title">Top End Wedding</h5>
                    <p class="card-text showtime">Monday - 6pm
                      <br>
                      Tuesday - 6pm
                      <br>
                      Saturday - 3pm
                      <br>
                      Sunday - 3pm
                      <br>
                      <br>
                      <br>
                      <p class="card-text more-details" onclick="toggleSynopsis('RMC');">
                        <a href="#synopsisRMC"><img src="media/clapperboard.svg" alt="clapperboard icon"
                            class="more-details-icon"> Details & Booking</a></p>
                      <img src="media/Mature.png" alt="Rated" width="15%" class="movie-rating">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2">
          <div class="col d-flex">
            <div class="card mb-4 flex-fill movie-card" id="moviePanelANM">
              <div class="row no-gutters">
                <div class="col-lg-6">
                  <img src="media/dumbo.jpg" class="card-img movie-poster" alt="Dumbo Poster">
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <h5 class="card-title">Dumbo</h5>
                    <p class="card-text showtime">Monday - 12pm
                      <br>
                      Tuesday - 12pm
                      <br>
                      Wednesday - 6pm
                      <br>
                      Thursday - 6pm
                      <br>
                      Friday - 6pm
                      <br>
                      Saturday - 12pm
                      <br>
                      Sunday - 12pm
                    </p>
                    <br>
                    <p class="card-text more-details" onclick="toggleSynopsis('ANM');"><a
                        href="#synopsisANM"><img src="media/clapperboard.svg" alt="clapperboard icon"
                          class="more-details-icon"> Details & Booking</a></p>

                    <img src="media/G.svg" alt="Rated G" width="15%" class="movie-rating">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card mb-4 flex-fill movie-card" id="moviePanelAHF">
              <div class="row no-gutters">
                <div class="col-lg-6">
                  <img src="media/happy-prince.jpg" class="card-img movie-poster" alt="The Happy Prince Poster">
                </div>
                <div class="col-lg-6">
                  <div class="card-body">
                    <h5 class="card-title">The Happy Prince</h5>
                    <p class="card-text showtime">Wednesday - 12pm
                      <br>
                      Thursday - 12pm
                      <br>
                      Friday - 12pm
                      <br>
                      Saturday - 9pm
                      <br>
                      Sunday - 9pm
                    </p>
                    <br>
                    <br>
                    <br>
                    <p class="card-text more-details" onclick="toggleSynopsis('AHF');"><a
                        href="#synopsisAHF"><img src="media/clapperboard.svg" alt="clapperboard icon"
                          class="more-details-icon"> Details & Booking</a></p>
                    <img src="media/R.svg" alt="Rated R" width="15%" class="movie-rating">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="synopsis-section" id="synopsisACT">
        <div class="break">
        </div>
        <h1 class="synopsis-header">MOVIE SYNOPSIS</h1>
        <br>
        <div class="synopsis-area">
          <div class="row synopsis">
            <div class="col-md-6">
              <h5 class="synopsis-title">Avengers: Endgame <img src="media/PG-13.svg" alt="Rated PG-13"
                  class="movie-rating-synopsis" width="20%"></h5>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-6">
              <h6 class="summary-head"><img class="synop-icon" src="media/video-camera.png" alt="Video icon"> Plot
                description:
              </h6>
              <p style="text-align: justify;">After vanishing half the population of the galaxy, Thanos was on the edge
                of fulfilling his mission.<br>
                However, the rest of the heroes, including Tony Stark (Iron Man), Thor, Captain America, etc. are trying
                to look for a plan to bring back their love ones and allies to unite once again in order to fight back
                Thanos and his army. This is the perfect sequel to Avengers Infinity War. This movie ensures a thrilling
                and action packed movie experience.</p>
            </div>
            <div class="col-md-6 order-first order-md-last">
              <div class="trailer-container"><iframe width="560" height="315"
                  src="https://www.youtube.com/embed/TcMBFSGVi1c" frameborder="0"
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-4">
              <h5 class="booking-head"><img class="synop-icon" src="media/book-tickets.png" alt="Tickets icon"> Make a
                Booking:</h5>
            </div>
            <div class="col-md-8">

              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Wednesday - 9pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Thursday - 9pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Friday - 9pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Saturday - 6pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Sunday - 6pm</a>

            </div>
          </div>
        </div>
      </section>

      <section class="synopsis-section" id="synopsisRMC">
        <div class="break">
        </div>
        <h1 class="synopsis-header">MOVIE SYNOPSIS</h1>
        <br>
        <div class="synopsis-area">
          <div class="row synopsis">
            <div class="col-md-6">
              <h5 class="synopsis-title">Top End Wedding <img src="media/Mature.png" alt="Rated M"
                  class="movie-rating-synopsis" height="80%"></h5>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-6">
              <h6 class="summary-head"><img class="synop-icon" src="media/video-camera.png" alt="Video icon"> Plot
                description:
              </h6>
              <p style="text-align: justify;">Engaged and in love Lauren and Ned have just 10 days to reunite her newly separated parents and pull off their dream Top End Wedding. But Lauren's mother has gone missing, experiencing a midlife crisis. In order to find her, the couple goes on a fantastic road trip across northern Australia. <br>Along the way they find fulfillment for their own personal journeys through the wild beauty of the landscapes and the unbeatable charm of the characters that they meet along the way. But will they finally recover Lauren's mother and pursue their dream wedding?</p>
            </div>
            <div class="col-md-6 order-first order-md-last">
              <div class="trailer-container"><iframe width="560" height="315"
                  src="https://www.youtube.com/embed/uoDBvGF9pPU" frameborder="0"
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-4">
              <h5 class="booking-head"><img class="synop-icon" src="media/book-tickets.png" alt="Tickets icon"> Make a
                Booking:</h5>
            </div>
            <div class="col-md-8">

              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Monday - 6pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Tuesday - 6pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Saturday - 3pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Sunday - 3pm</a>
            </div>
          </div>
        </div>
      </section>

      <section class="synopsis-section" id="synopsisANM">
        <div class="break">
        </div>
        <h1 class="synopsis-header">MOVIE SYNOPSIS</h1>
        <br>
        <div class="synopsis-area">
          <div class="row synopsis">
            <div class="col-md-6">
              <h5 class="synopsis-title">Dumbo <img src="media/G.svg" alt="Rated G" class="movie-rating-synopsis" height="70%"></h5>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-6">
              <h6 class="summary-head"><img class="synop-icon" src="media/video-camera.png" alt="Video icon"> Plot
                description:
              </h6>
              <p style="text-align: justify;">A young circus elephant is born with comically large ears and given the cruel nickname Dumbo. One day at a show, he is taunted by a group of kids, inciting his mother into a rage that gets her locked up. After Dumbo's ears cause an accident that injures many of the other elephants, he is made to dress like a clown and perform dangerous stunts.<br>
                Everything changes when Dumbo discovers that his enormous ears actually allow him to fly, and he astounds everyone at the circus with his new talent.</p>
            </div>
            <div class="col-md-6 order-first order-md-last">
              <div class="trailer-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tLtQ3bCvBA0" frameborder="0"
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>

              </div>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-4">
              <h5 class="booking-head"><img class="synop-icon" src="media/book-tickets.png" alt="Tickets icon"> Make a
                Booking:</h5>
            </div>
            <div class="col-md-8">

              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Monday - 12pm<a>
                  <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                    aria-controls="Booking-collapse">Tuesday - 12pm</a>
                  <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                    aria-controls="Booking-collapse">Wednesday - 6pm</a>
                  <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                    aria-controls="Booking-collapse">Thursday - 6pm</a>
                  <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                    aria-controls="Booking-collapse">Friday - 6pm</a>
                  <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                    aria-controls="Booking-collapse">Saturday - 12pm</a>
                  <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                    aria-controls="Booking-collapse">Sunday - 12pm</a>
            </div>
          </div>
        </div>
      </section>

      <section class="synopsis-section" id="synopsisAHF">
        <div class="break">
        </div>
        <h1 class="synopsis-header">MOVIE SYNOPSIS</h1>
        <br>
        <div class="synopsis-area">
          <div class="row synopsis">
            <div class="col-md-6">
              <h5 class="synopsis-title">The Happy Prince<img src="media/R.svg" alt="Rated R"
                  class="movie-rating-synopsis" height="70%"></h5>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-6">
              <h6 class="summary-head"><img class="synop-icon" src="media/video-camera.png" alt="Video icon"> Plot
                description:
              </h6>
              <p style="text-align: justify;">In a cheap Parisian hotel room Oscar Wilde lies on his death bed. The past floods back, taking him to other times and places. Was he once the most famous man in London? The artist crucified by a society that once worshipped him? <br>Under the microscope of death he reviews the failed attempt to reconcile with his long suffering wife Constance, the ensuing reprisal of his fatal love affair with Lord Alfred Douglas and the warmth and devotion of Robbie Ross, who tried and failed to save him from himself. <br>Travelling through Wilde's final act and journeys through England, France and Italy, the transience of lust is laid bare and the true riches of love are revealed. It is a portrait of the dark side of a genius who lived and died for love.</p>
            </div>
            <div class="col-md-6 order-first order-md-last">
              <div class="trailer-container"><iframe width="560" height="315"
                  src="https://www.youtube.com/embed/tXANCJQkUIE" frameborder="0"
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="row synopsis">
            <div class="col-md-4">
              <h5 class="booking-head"><img class="synop-icon" src="media/book-tickets.png" alt="Tickets icon"> Make a
                Booking:</h5>
            </div>
            <div class="col-md-8">

              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Wednesday - 12pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Thursday - 12pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Friday - 12pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Saturday - 9pm</a>
              <a class="booking-btn" href="#Booking-collapse" role="button" aria-expanded="false"
                aria-controls="Booking-collapse">Sunday - 9pm</a>

            </div>
          </div>
        </div>
      </section>

      <div id="Booking-collapse">
        <div class="break">
        </div>
        <section id="booking-section">
          <button type="button" id="close-booking" class="close" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
          <h1 id="booking-header"><b>BOOK YOUR TICKET</b></h1>
          <br>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p id="auto-info"></p>
            <input type="hidden" name="movie[id]" id="movie-id">
            <input type="hidden" name="movie[day]" id="movie-day">
            <input type="hidden" name="movie[hour]" id="movie-hour">
          
            <div class="row">
              <div class="col-md-4">
                <br>
                <p id="seat-req">Please select your seat(s)</p>
                <fieldset>
                  <legend>Standard</legend>
                  <div class="form-group">
                    <label for="seats-STA">Adult</label>
                    <select class="seat-select" name="seats[STA]" id="seats-STA">
                      <option value=''>Please Select</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="seats-STP">Concession</label>
                    <select class="seat-select" name="seats[STP]" id="seats-STP">
                      <option value=''>Please Select</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="seats-STC">Child</label>
                    <select class="seat-select" name="seats[STC]" id="seats-STC">
                      <option value=''>Please Select</option>
                    </select>
                  </div>
                </fieldset>
                
                <fieldset>
                  <legend>First Class</legend>
                  <div class="form-group">
                  <label for="seats-FCA">Adult</label>
                    <select class="seat-select" name="seats[FCA]" id="seats-FCA">
                      <option value=''>Please Select</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="seats-FCP">Concession</label>
                    <select class="seat-select" name="seats[FCP]" id="seats-FCP">
                      <option value=''>Please Select</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="seats-FCC">Child</label>
                    <select class="seat-select" name="seats[FCC]" id="seats-FCC">
                      <option value=''>Please Select</option>
                    </select>
                  </div>
                </fieldset>
                <br>
                <p style="text-align: right;"><b>Total: $</b> <span id="total"></span></p>
              </div>

              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-3 d-none d-md-block"></div>
                  <div class="col-md-9">
                    <br><br>
                    <p class="require">* are required fields</p>
                    <div class="form-group">
                      <label for="cust-name">Name <span class="require">*</span></label>
                      <input type="text" name="custname" id="cust-name" style="width: 100%;" value ="<?php echo $name?>">
                      <span class="require"><?php echo $nameErr;?></span>
                    </div>

                    <div class="form-group">
                      <label for="cust-email">Email <span class="require">*</span></label>
                      <input type="email" name="custemail" id="cust-email" style="width: 100%;" value="<?php echo $email?>">
                      <span class="require"><?php echo $emailErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="cust-mobile">Mobile <span class="require">*</span></label>
                      <input type="tel" name="custmobile" id="cust-mobile" style="width: 100%;" >
                    </div>
                    <div class="form-group">
                      <label for="cust-card">Credit Card <span class="require">*</span></label>
                      <input type="text" name="custcard" id="cust-card" style="width: 100%;" >
                    </div>
                    <div class="form-group">
                      <label for="cust-expiry">Expiry <span class="require">*</span></label>
                      <input type="month" name="custexpiry" id="cust-expiry" style="width: 100%;" placeholder="YYYY-MM">
                    </div>
                    <br><br>
                    <input type="submit" name="order" value="Order" id="order" href="booking-section">
                    <input type="submit" name='session-reset' value ='Reset the session' id='session-reset'>
                  </div>
                </div>
              </div>
          </form>
        </section>
      </div>
    </main>

    <a href="#top"><img id="TopBtn" src="media/top.png" alt="Back to Top"></a>
    <div class="break">
    </div>
    <footer>
      <div id="contact-info" style="position: relative;">
        <b>CINEMAX</b>
        <br>
        <p><b>Contact information:</b>
          <br>
          <b>Email:</b> contact_support@cinemax.com
          <br>
          <b>Phone number:</b> +84 900779977
          <br>
          <b>Address:</b> 221B Baker Street Faraway City
        </p>
        <br>
        <img src="media/cinemax_logo.png" alt="Cinemax logo"
          style="position: absolute; right: 0px; bottom: 0px; background-color: rgba(255, 255, 255, 0.2);">
      </div>
      <hr style="border: grey solid 1px;" size="10px">
      <?php helloWorld();
        echo '<br>';
      ?>
      <hr style="border: grey solid 1px;" size="10px">
      <div>&copy;
        <script>
          document.write(new Date().getFullYear());
        </script> - Assignment by Group 7: <br> Vo An Huy (s3804220 - <a
          href="https://github.com/s3804220/s3804220.github.io" class="git-link" target="_blank">Github
          Repo</a>),<br>Doan Nguyen My Hanh (s3639869 - <a href="https://github.com/s3639869/wp" class="git-link"
          target="_blank">Github Repo</a>)<br>Last
        modified 08/05/2020
        <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <br>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
        Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
  </div>
</body>

</html>