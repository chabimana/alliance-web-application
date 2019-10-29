<?php
$page_title = "Preview Programs";

// include database and object files
include_once 'config/database.php';
include_once 'model/Program.php';
include_once 'model/Leader.php';

$database = new Database();
$db       = $database -> getConnection ();

$program = new program( $db );
$leader  = new leader( $db ); 
// query programs
$stmt = $program -> readAll ();
$num  = $stmt -> rowCount ();

$statement = $program -> readAll ();

//Select All Leaders
$leaderStatement = $leader -> readAll ();
$leaderCount     = $leaderStatement -> rowCount ();
?>

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml" xmlns:data="http://www.w3.org/1999/xhtml">
<head>
    <title>AER</title>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link
            href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900"
            rel="stylesheet"/>

    <link rel="stylesheet" href="view/static/fontweb/css/all.css"/>

    <link rel="stylesheet" href="view/static/css/open-iconic-bootstrap.min.css"/>
    <link rel="stylesheet" href="view/static/css/animate.css"/>

    <link rel="stylesheet" href="view/static/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="view/static/css/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="view/static/css/magnific-popup.css"/>

    <link rel="stylesheet" href="view/static/old/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="view/static/css/aos.css"/>

    <link rel="stylesheet" href="view/static/css/ionicons.min.css"/>

    <link rel="stylesheet" href="view/static/css/flaticon.css"/>
    <link rel="stylesheet" href="view/static/css/icomoon.css"/>
    <link rel="stylesheet" href="view/static/css/style.css"/>
</head>
<body data-spy="scroll" data-target=".site-navbar-target"
      data-offset="300">

<nav
        class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
        id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">A.E.R</a>
        <h6>Alliance Of Envengilicals Of Rwanda</h6>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle"
                type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <nav role="navigation">
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                <li class="nav-item"><a href="#programs-section"
                                        class="nav-link"><span>Programs</span></a></li>
                <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                <li class="nav-item"><a href="#coaches-section"
                                        class="nav-link"><span>Leadership</span></a></li>
                <li class="nav-item"><a href="#contact-section"
                                        class="nav-link"><span>Contact</span></a></li>
  <li class="nav-item"><a href="#" class="nav-link">Future Project</a>
      <ul class="navbar-nav nav ml-auto">
        <li><a href="#">Sub-1</a></li>
        <li><a href="#">Sub-2</a></li>
        <li><a href="#">Sub-3</a></li>
      </ul>
    </li>
  </ul>
</nav>
            </ul>
        </div>
    </div>
</nav>
<section id="home-section" class="hero bg-dark">
    <div class="home-slider js-fullheight owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div
                        class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                        data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight"
                         style="background-image: url(view/static/images/pic1.jpg);">
                        <h3 class="vr" style="background-image: url(view/static/images/divider.jpg);">GOD'S</h3>
                    </div>
                    <div
                            class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">Welcome to A.E.R</span>
                            <h1 class="mb-4 mt-3">
                                <span>OUR VISION</span>
                            </h1>
                            <p>Evangelical Alliance Of Rwanda is one of the 33 National
                                Evangilical Alliances in Africa.Was founnded with the
                                objectives of promoting the church unit and reconciliation,
                                Remending the church its mission of proclaining the gospel and
                                living according to it</p>
                            <p>
                                <span class="subheading">vision is:</span>Seeing Evengilicals
                                in rwanda united and engaged in effective ministry
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div
                        class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                        data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight"
                         style="background-image: url(view/static/images/pic2.jpg);">
                        <h3 class="vr" style="background-image: url(view/static/images/divider.jpg);">WORD</h3>
                    </div>
                    <div
                            class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">Welcome to A.E.R</span>
                            <h1 class="mb-4 mt-3">
                                <span>OUR COREVALUES</span>
                            </h1>
                            <p>In order to realize the vision and mission. Alliance of
                                Evangilicals of rwanda will be guided by the coo valeus:</p>
                            <p>Patnership in the gospel,prayer for transformation of
                                individuals and communities,transformational engagement in
                                rwanda society,proclamation of the gospeln in word,deed and
                                life,stewardsship of God's creation,Being Christ like in
                                service and in leadership</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section
        class="ftco-section ftco-no-pb ftco-no-pt ftco-program bg-dark"
        id="programs-section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 ftco-animate py-5 nav-link-wrap js-fullheight">
                <div class="nav flex-column nav-pills" id="v-pills-tab"
                     role="tablist" aria-orientation="vertical">
                    <?php
                    if ($num > 0) {
                        $count = 1;
                        while ( $row = $stmt -> fetch ( PDO::FETCH_ASSOC ) ) {
                            extract ( $row );
                            ?>
                            <a class="<?php if ($count === 1) {
                                echo 'active';
                            } ?> nav-link px-4"
                               id="v-pills-<?php echo $count; ?>-tab'"
                               data-toggle="pill" href="#v-pills-<?php echo $count; ?>"
                               role="tab" aria-selected="true"
                               aria-controls="v-pills-<?php echo $count; ?>"><span
                                        class="mr-3">
                                    <i class="<?php echo $row[ 'icon_name' ]; ?>"
                                       aria-hidden="true"></i>
                                </span><span><?php echo $row[ 'title' ]; ?></span></a>
                            <?php
                            $count ++;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center js-fullheight">
                <div class="tab-content pl-md-5" id="v-pills-tabContent">
                    <?php
                    if ($num > 0) {
                        $count = 1;
                        while ( $row = $statement -> fetch ( PDO::FETCH_ASSOC ) ) {
                            extract ( $row );
                            ?>
                            <div class="<?php if ($count === 1)
                                echo 'active'; ?> tab-pane fade show  py-0"
                                 id="v-pills-<?php echo $count; ?>" role="tabpanel"
                                 aria-labelledby="v-pills-<?php echo $count; ?>">
							        <span class="icon mb-3 d-block"><i
                                                class="<?php echo $row[ 'icon_name' ]; ?>" aria-hidden="true"></i></span>
                                <h2 class="mb-4">
                                    <span><?php echo $row[ 'title' ]; ?></span>
                                </h2>
                                <p>
                                    <span><?php echo $row[ 'content' ]; ?></span>
                                </p>
                                <p>
                                    <a href="#" class="btn btn-primary px-4 py-3">Learn More</a>
                                </p>
                            </div>
                            <?php
                            $count ++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section
        class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb bg-dark"
        id="about-section" style="background-color: #FAE5D3;">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 col-lg-5 d-flex">
                <div class="img d-flex align-self-stretch align-items-center"
                     style="background-image: url(view/static/images/cross.PNG);"></div>
            </div>
            <div class="col-md-6 col-lg-7 pl-lg-5 py-5">
                <div class="py-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
								<span class="subheading">About Alliance Of Evangilicals
									Of Rwanda</span>
                            <h2 class="mb-4"
                                style="font-size: 34px; text-transform: capitalize;">
                                We're Functioning for Almost <span class="number"
                                                                   data-number="20">0</span> Years
                            </h2>
                            <p>Evangelical Alliance Of Rwanda is one of the 33 National
                                Evangilical Alliances in Africa.Was founnded with the
                                objectives of promoting the church unit and reconciliation,
                                Remending the church its mission of proclaining the gospel and
                                living according to it</p>
                            <p>Evangelical Alliance Of Rwanda is one of the 33 National
                                Evangilical Alliances in Africa.Was founnded with the
                                objectives of promoting the church unit and reconciliation,
                                Remending the church its mission of proclaining the gospel and
                                living according to it</p>
                            <p>Evangelical Alliance Of Rwanda is one of the 33 National
                                Evangilical Alliances in Africa.Was founnded with the
                                objectives of promoting the church unit and reconciliation,
                                Remending the church its mission of proclaining the gospel and
                                living according to it</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-dark" id="coaches-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <span class="subheading">Leaders</span>
                <h2 class="mb-4">Our Leaders</h2>
                <p>Seeing Evengilicals in rwanda united and engaged in
                    effective ministry</p>
            </div>
        </div>
        <div class="row">
            <?php
            if ($leaderCount > 0) {
                $count = 1;
                while ( $row = $leaderStatement -> fetch ( PDO::FETCH_ASSOC ) ) {
                    extract ( $row );
                    $data         = $row[ 'image' ];
                    $encodedImage = base64_encode ( $data );
                    ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch"
                                     style="background-image:url('data:image/jpg;base64,<?php echo $encodedImage; ?>');">
                                </div>
                            </div>
                            <div class="text d-flex align-items-center pt-3 text-center">
                                <div>
                                    <h3 class="mb-2"><?php echo $row[ 'names' ]; ?></h3>
                                    <span class="position mb-4"><?php echo $row[ 'position' ]; ?></span>
                                    <div class="faded">
                                        <a href="#"><?php echo $row[ 'email' ]; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count ++;
                }
            }
            ?>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb bg-dark"
         id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Contact</span>
                <h2 class="mb-4">Contact Us</h2>
                <p>Seeing Evengilicals in Rwanda united and engaged in
                    effective ministry</p>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-7 order-md-last d-flex">
                <form action="#" class="bg-light p-4 p-md-5 contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject"/>
                    </div>
                    <div class="form-group">
							<textarea name="" id="" cols="30" rows="7" class="form-control"
                                      placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message"
                               class="btn btn-primary py-3 px-5"/>
                    </div>
                </form>
            </div>

            <div class="col-md-5 d-flex">
                <div class="row d-flex contact-info mb-5">
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-signs"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Address</h3>
                                <p>Gasabo, Kigali, Rwanda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light d-flex">
                            <div class="icon mr-3">
                                <span class="icon-phone2"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Contact Number</h3>
                                <p>
                                    <a href="#">+25078XXXXX</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light d-flex">
                            <div class="icon mr-3">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Email Address</h3>
                                <p>
                                    <a href="mailto:info@yoursite.com">abc@gmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light d-flex">
                            <div class="icon mr-3">
                                <span class="icon-globe"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Website</h3>
                                <p>
                                    <a href="#">yoursite.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="ftco-footer ftco-section"
        style="position: fixed; width: 100%; bottom: 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <p style="margin-bottom: 0px;">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | This template is made with <i
                            class="icon-heart color-danger" aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none"
                stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none"
                stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>


<script src="view/static/js/jquery.min.js"></script>
<script src="view/static/js/jquery-migrate-3.0.1.min.js"></script>
<script src="view/static/js/popper.min.js"></script>
<script src="view/static/js/bootstrap.min.js"></script>
<script src="view/static/js/jquery.easing.1.3.js"></script>
<script src="view/static/js/jquery.waypoints.min.js"></script>
<script src="view/static/js/jquery.stellar.min.js"></script>
<script src="view/static/js/owl.carousel.min.js"></script>
<script src="view/static/js/jquery.magnific-popup.min.js"></script>
<script src="view/static/js/aos.js"></script>
<script src="view/static/js/jquery.animateNumber.min.js"></script>
<script src="view/static/js/scrollax.min.js"></script>

<script src="view/static/js/main.js"></script>

</body>
</html>