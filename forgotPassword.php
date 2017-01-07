<?php
ob_start();
session_start();

require '../resources/init.php';
?>

<?php
if (empty($_POST) === false) {
 
  $Email = strip_tags(trim($_POST['Email']));

  if ($users->email_exists($Email) === false) {
    $errors[] = 'Sorry that email doesn\'t exist.';
  } else {
    $recover = $users->recover($Email);
    echo '<script language="javascript">';
    echo 'alert("Password successfully resest, please check your email.")';
    echo '</script>';
    header('Location: ./index.php');
      exit();
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head> 

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Password Reset | Student Admission Program</title>
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
                </button>
                <a class="navbar-brand page-scroll" style="font-size:150%;" href="./index.php"><b id="brand">SAP</b></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                  
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Intro Section -->
    <section id="select" class="intro-section">
        <div class="container">
            <div class="row">
              <div class="col-lg-4">
              </div>
                <div class="well col-lg-4 center-block">
                 
                      <div class="well-header row">
                          <h1 class="text-center"><span style="color: #C9473A">Password Reset</span></h1>
                      </div> <br>
                      <div class="well-body row">
                          <form class="form col-md-12 center-block" action="forgotPassword.php" method="post">
                            <div class="form-group">
                              <input type="email" name="Email" class="form-control input-md" placeholder="Email " value="" required>
                            </div>
                            <div class="form-group">
                           
                                <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" href="" value="Recover"></input>

                              <span class="pull-right"><a href="./index.php">Back to Login</a></span>
                             
                            </div>
                          </form>

                      </div>
                      <div class="well-footer ">
                          <div class="col-md-12 text-center">      
                         <?php 

                          if(empty($errors) === false){
                            echo '<p>' . implode('</p><p>', $errors) . '</p>';  
                          };

                           ?>
                      </div>  
                      </div>
            </div>
        </div>
    </section>

       <!--Password well-->
 
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