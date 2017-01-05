<?php
ob_start();
session_start();

require './include/init.php';
$general->logged_in_protect();

//Login
if (isset ( $_POST ['signin'] )) {
 
  $Email_s = strip_tags(trim($_POST['Email_s']));
  $Password_s = strip_tags(trim($_POST['Password_s']));
 
  if ($users->email_exists($Email_s) === false) {
    $errors_s[] = 'Sorry that email does not exist.';
  }  else {
 
    $login = $users->login($Email_s, $Password_s);
    if ($login === false) {
      $errors_s[] = 'Incorrect login information. <a href="forgotPassword.php">Reset password?</a>';
    } else {
 
      $_SESSION['Email'] =  $login; 
        header('Location: ./pages/dashboard.php');
        
        exit();
    }
  }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Admission Program</title>
    <meta name="description" content="Boston College Student Admission Program">
    <!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="./dist/css/home.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top" style="font-size:150%;"><b id="brand">SAP</b></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                  
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#overview">Overview</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#coordinators">Meet the Coordinators</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="#contact">Contact Us</a>
                    </li>
                </ul>
                
                <form class="navbar-form navbar-right" method="POST">
                    <div class="form-group">
                         <?php
                            if (empty ( $errors_s ) == false) {
                                echo '<p class="navbar-text">' . implode ( '</p><p class="navbar-text">', $errors_s ) . '</p>';
                            }
                    
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="Email_s" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="Password_s" placeholder="Password" required>
                    </div>
                    <button type="submit" name="signin"class="btn btn-default">Login</button>
                    <!--<div class="navbar-form navbar-right">
                </div>-->
                </form>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="color:white; text-shadow:1px 1px 7px #CB8E51;">Boston College Student Admission Program</h1>
                    <br/>

                    <!--<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#registerModal">Register Your Account</button>-->

                </div>
            </div>
        </div>
    </section>


    <!-- Overview Section -->
    <section id="overview" class="overview-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Representing the Heights</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="center-block">
                    <img id='seal' src="./img/bc_seal.jpg" class="img-responsive center-block" alt="BC Seal">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                     <h4>The Student Admission Program is one of Boston College’s largest student groups. With roughly 700 members, we work to provide an honest, personal and unique experience for every prospective student during his or her visit to BC. Volunteers serve in a variety of programs, and its diversity allows for students to truly make the SAP experience their own. There are currently 12 programs under the SAP umbrella:</h4>
                 </div>
             </div>
             <div class="row">
                     <div class="col-md-3 programs col-md-offset-3">
                        <h4>Office Programs:</h4>
                        <ul>
                            <li>Panels</li>
                            <li>Tours</li>
                            <li>Greeting</li>
                            <li>Office Management</li>
                            <li>Eagle for a Day</li>
                            <li>Admitted Eagle Day</li>
                        </ul>
                    </div>
                    <div class="col-md-3 programs">
                        <h4>Outreach Programs:</h4>
                        <ul>
                            <li>Outreach</li>
                            <li>High School Visits</li>
                            <li>International Outreach</li>
                            <li>AHANA Outreach</li>
                            <li>Transfer Outreach</li>
                            <li>Media</li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>

    <!-- Meet the Coordinators Section -->
    <section id="coordinators" class="coordinators-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Meet the Coordinators</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="center-block">
                    <img id="council" src="./img/council.jpg" class="img-responsive center-block" alt="Council">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>A council of 14 undergraduates dedicated to providing prospective students and their families with the most authentic and fulfilling visit experience possible. Learn more about who we are and why we love Boston College!</h4></br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 coords col-md-offset-3">
                    <img class="img-thumbnail" src="./img/coord_jon.jpg" alt="Jon Pic"/></br>
                    <h5><strong>Jon Giara</strong></h5></br>
                    <h5>Head Coordinator</h5></br>
                    <h5><a href="mailto:giara@bc.edu">giara@bc.edu</a></h5></br></br>
                </div>
                <div class="col-md-3 coords col-md-offset-1">
                    <img class="img-thumbnail" src="./img/coord_priscilla.jpg" alt="Priscilla Pic"/></br>
                    <h5><strong>Priscilla Nyarko</strong></h5></br>
                    <h5>AHANA Outreach Coordinator</h5></br>
                    <h5><a href="mailto:nyarkop@bc.edu">nyarkop@bc.edu</a></h5></br></br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="col-md-3 coords col-md-offset-3">
                    <img class="img-thumbnail" src="./img/coord_gail.jpg" alt="Gail Pic"/></br>
                    <h5><strong>Abigail Brown</strong></h5></br>
                    <h5>Panels Coordinator</h5></br>
                    <h5><a href="mailto:brownbba@bc.edu">brownbba@bc.edu</a></h5></br></br>
                </div>
                <div class="col-md-3 coords col-md-offset-1">
                    <img class="img-thumbnail" src="./img/coord_emi.jpg" alt="Emi Pic"/></br>
                    <h5><strong>Emi Omick</strong></h5></br>
                    <h5>Greeting Coordinator</h5></br>
                    <h5><a href="mailto:omick@bc.edu">omick@bc.edu</a></h5></br></br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 coords col-md-offset-3">
                    <img class="img-thumbnail" src="./img/coord_will.jpg" alt="Will Pic"/></br>
                    <h5><strong>Will Hennessy</strong></h5></br>
                    <h5>International Outreach Coordinator</h5></br>
                    <h5><a href="mailto:henneswa@bc.edu">henneswa@bc.edu</a></h5></br></br>
                </div>
                <div class="col-md-3 coords col-md-offset-1">
                    <img class="img-thumbnail" src="./img/coord_olivia.jpg" alt="Olivia Pic"/></br>
                    <h5><strong>Olivia Palmer</strong></h5></br>
                    <h5>Eagle for a Day Coordinator</h5></br>
                    <h5><a href="mailto:palmeroc@bc.edu">palmeroc@bc.edu</a></h5></br></br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 coords col-md-offset-3">
                    <img class="img-thumbnail" src="./img/coord_jessica.jpg" alt="Jessica Pic"/></br>
                    <h5><strong>Jessica Ilaria</strong></h5></br>
                    <h5>Outreach/High School Visits Coordinator</h5></br>
                    <h5><a href="mailto:ilariaj@bc.edu">ilariaj@bc.edu</a></h5></br></br>
                </div>
                <div class="col-md-3 coords col-md-offset-1">
                    <img class="img-thumbnail" src="./img/coord_nick.jpg" alt="Nick Pic"/></br>
                    <h5><strong>Nick Raposo</strong></h5></br>
                    <h5>Admitted Eagle Day Coordinator</h5></br>
                    <h5><a href="mailto:raposon@bc.edu">raposon@bc.edu</a></h5></br></br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="col-md-3 coords col-md-offset-3">
                    <img class="img-thumbnail" src="./img/coord_chloe.jpg" alt="Chloe Pic"/></br>
                    <h5><strong>Chloe Mansour</strong></h5></br>
                    <h5>Eagle for a Day Coordinator</h5></br>
                    <h5><a href="mailto:mansourc@bc.edu">mansourc@bc.edu</a></h5></br></br>
                </div>
                <div class="col-md-3 coords col-md-offset-1">
                    <img class="img-thumbnail" src="./img/coord_kevin.jpg" alt="Kevin Pic"/></br>
                    <h5><strong>Kevin Reardon</strong></h5></br>
                    <h5>Office Management Coordinator</h5></br>
                    <h5><a href="mailto:reardokd@bc.edu">reardokd@bc.edu</a></h5></br></br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 coords col-md-offset-3">
                    <img class="img-thumbnail" src="./img/coord_kristin.jpg" alt="Kristin Pic"/></br>
                    <h5><strong>Kristin Morisseau</strong></h5></br>
                    <h5>Tours Coordinator</h5></br>
                    <h5><a href="mailto:morissek@bc.edu">morissek@bc.edu</a></h5></br></br>
                </div>
                <div class="col-md-3 coords col-md-offset-1">
                    <img class="img-thumbnail" src="./img/coord_haydn.jpg" alt="Haydn Pic"/></br>
                    <h5><strong>Haydn White</strong></h5></br>
                    <h5>Eagle for a Day Coordinator</h5></br>
                    <h5><a href="mailto:whiteqo@bc.edu">whiteqo@bc.edu</a></h5></br></br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 coords col-md-offset-3">
                    <img class="img-thumbnail" src="./img/coord_robyn.jpg" alt="Robyn Pic"/></br>
                    <h5><strong>Robyn Naragon</strong></h5></br>
                    <h5>Media Coordinator</h5></br>
                    <h5><a href="mailto:naragon@bc.edu">naragon@bc.edu</a></h5></br>
                </div>
                <div class="col-md-3 coords col-md-offset-1">
                    <img class="img-thumbnail" src="./img/coord_beth.jpg" alt="Beth Pic"/></br>
                    <h5><strong>Beth Yarze</strong></h5></br>
                    <h5>Transfer Outreach Coordinator</h5></br>
                    <h5><a href="mailto:yarze@bc.edu">yarze@bc.edu</a></h5></br>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Us</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="center-block">
                    <img src="./img/logo.jpg" class="img-responsive center-block" alt="Logo">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Feel free to reach out to an individual coordinator if you have any questions about their respective programs. You can also email <a href="mailto:sap@bc.edu">sap@bc.edu</a> with any general SAP questions and inquiries.</h4>
                </div>
            </div>
        </br>
            <div class="row">
                
                <div class="col-md-4 col-md-offset-2">
                    <a class="twitter-timeline" width="350" height="500" href="https://twitter.com/BC_Admission" data-widget-id="513022033576206337">Tweets by @BC_Admission</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div class="col-md-1"> </br></br>
                    <a href="https://www.facebook.com/BCProspectiveStudents"><i class="fa fa-facebook social"></i></a>
                </div>
                <div class="col-md-1"></br></br>
                    <a href="https://instagram.com/bc_admission/"><i class="fa fa-instagram social"></i></a>
                </div>
                <div class="col-md-1"></br></br>
                    <a href="https://twitter.com/bc_admission"><i class="fa fa-twitter social"></i></a>
                </div>
                <div class="col-md-1"></br></br>
                    <a href="http://www.pinterest.com/bostoncollege/"><i class="fa fa-pinterest social"></i></a>  
                </div>
                <div class="col-md-4"></br></br>
                <h4 id="social_header">Stay connected by following us on Facebook, Twitter, and Instagram!</h4> 
            </div>
            </div>
        </div>
    </section>

    <!-- MODAL FOR Registration -->
        <div id="registerModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Register Your Account</h4>
                    <h5 class="modal-title">Note: You must be enrolled in an SAP program in order to register.</h5>
                  </div>
                  <div class="modal-body">
                    <form method="POST" name="registerForm">
                    <div class="form-group">
                        <label for="eagleid">Eagle ID:</label>
                        <input type="number" name="eagleid" class="form-control" id="eagleid" placeholder="Eagle ID" required>
                    </div>    
                    <div class="form-group">
                        <label for="email">BC Email:</label>
                        <input type="email" name="Email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="repassword">Re-Enter Password</label>
                        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Re-Enter Password" required>
                    </div>
                    <input type="submit" name="submit" value="Register" class="btn btn-default"></input>
                    </form>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
              </div>
            </div>
            <!--end MODAL -->

    <!-- scripts & BS/custom JS -->

     <script src="./bower_components/jquery/dist/jquery.easing.min.js"></script>
    <!-- jQuery -->
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"> 
         $(window).scroll(function() {
            if ($(".navbar").offset().top > 50) {
                $(".navbar-fixed-top").addClass("top-nav-collapse");
            } else {
                $(".navbar-fixed-top").removeClass("top-nav-collapse");
            }
        });

        //jq for page scroll, using hte easing lib
        $(function() {
            $('a.page-scroll').bind('click', function(event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });
        });

    </script>


</body>
</html>
