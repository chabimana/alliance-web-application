<?php
$page_title = "Preview Programs";

// include database and object files
include_once 'config/database.php';
include_once 'model/Program.php';
include_once 'model/Leader.php';
include_once 'model/Events.php';
include_once 'config/core.php';

$database = new Database();
$db       = $database -> getConnection ();

$program = new program( $db );
$leader  = new leader( $db ); 
$events  = new Events( $db ); 
// query programs
$stmt = $program -> readAll ();
$num  = $stmt -> rowCount ();

$statement = $program -> readAll ();

//Select All Leaders
$leaderStatement = $leader -> readAll ();
$leaderCount     = $leaderStatement -> rowCount ();
//Select All events
$eventsStatement = $events -> readAll ();

$eventsContent=$events->readAll();
$eventsCount     = $eventsStatement -> rowCount ();
?>

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml" xmlns:data="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AER</title>
    
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
                        <li class="nav-item"><a href="#news-section"
                            class="nav-link"><span>News And Events</span></a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                *Future Projects
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Alliance Building</a>
                                <a class="dropdown-item" href="#">RIET Building</a>
                                <a class="dropdown-item" href="#">Sponsor Of 5000 Pastors In 3 Year</a>
                            </div>
                        </li>
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
<section id="news-section" class="ftco-section bg-dark carousel slide" data-ride="carousel">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <span class="subheading">News and Events</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-12">
                <ol class="carousel-indicators">
                    <?php
                    if ($num > 0) {
                        $count = 0;                        
                        while ( $row = $eventsStatement -> fetch ( PDO::FETCH_ASSOC ) ) {
                            extract ( $row );
                            ?>
                            <li data-target="#news-section" data-slide-to="<?php echo $count;?>" class="<?php if ($count === 1) {
                                echo 'active';
                            } ?>"></li>
                            <?php
                            $count++;
                        }
                    }

                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    if ($num > 0) {
                        $counti = 0;
                        while ( $rowi = $eventsContent -> fetch ( PDO::FETCH_ASSOC ) ) {
                            extract ( $rowi );
                            ?>
                            <div class="carousel-item <?php if ($counti === 0) {
                                echo 'active';
                            } ?>">
                            <img  src="view/static/images/sunset.jpg" alt="..." style="width: 100%">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="card bg-dark mb-3">
                                    <div class="card-header">
                                     <?php echo $rowi[ 'title' ]; ?>
                                 </div>
                                 <div class="card-body">
                                    <h5 class="card-title"><?php echo $rowi[ 'title' ]; ?></h5>
                                    <p class="card-text"><?php echo $rowi[ 'summary' ]; ?></p>
                                    <td><input  type="button" name="view" value="More..." id="<?php echo $rowi['eventid']; ?>" class="btn btn-info btn-xs view_data" /></td>  
                                </tr>  
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $counti++;
            }
        }
        ?>
    </div>
    <a class="carousel-control left" href="#news-section" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="carousel-control right" href="#news-section" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>

    <a class="carousel-control-prev" href="#news-section" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#news-section" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="col-md-1"></div>
</div>
</div>
</section>
<div id="showModal" class="modal fade">  
  <div class="modal-dialog modal-lg">  
   <div class="modal-content">  
    <div class="modal-header"> 
     <h4 class="modal-title" id="title"></h4>  
 </div>  
 <div class="modal-body">  
    <p id="summary" class="font-weight-bold font-italic" style="text-align: justify;"></p>
    <p id="content" style="text-align: justify;"></p>
</div>  
<div class="modal-footer">  
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>  
</div>  
</div>  
</div>  
<div class="col-md-1"></div>
</div>
</div>
<footer class="ftco-footer ftco-section"
style="position: fixed; width: 100%; bottom: 0; background-color: white;">
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
<script type="text/javascript">   
  $(document).ready(function() {
      $('.view_data').click(function(){

          var id = $(this).attr('id'); //get the attribute value
          console.log('we reach here: '+id);
          $.ajax({
              url : '<?php echo $home_url; ?>select.php',
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                console.log('the response is:'+response.title);
                $('#summary').html(response.summary);
                $('#content').html(response.content); //hold the response in id and show on popup
                $('#title').html(response.title);
                $('#showModal').modal("show");
            },
            error: function(xhr, status, error) {
                console.log('the error is: '+error+"-----"+status+"-------"+xhr);
            }
        });
      });
  });
</script>
</body>
</html>