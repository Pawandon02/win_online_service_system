<?php
include'admin_conn.php';
session_start();//get data from user
if(isset($_POST['submit']))
{
    $femail=$_POST["uemail"];
    $pwd=$_POST["pswd"];
    $sql="select * from user_reg where email='$femail' and password='$pwd'";
//    echo $sql;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    // $row=mysqli_fetch_array($res);
    if($row)
     {
          // $_SESSION['uid']=$row["uid"];
          $_SESSION['uid']=$row[0];
          header("location:user_welcome.php") ;
        }
    else{
        echo "Your email or  Password is incorrect.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Online Service</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript">
<!--//
    function sizeFrame(frameId) {

        var F = document.getElementById(frameId);
        if (F.contentDocument) {
            F.height = F.contentDocument.documentElement.scrollHeight + 30; //FF 3.0.11, Opera 9.63, and Chrome
        } else {



            F.height = F.contentWindow.document.body.scrollHeight + 30; //IE6, IE7 and Chrome

        }

    }

    // window.onload=sizeFrame;

    //-->
</script>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<?php
     if(isset($_SESSION['msg1']))
     {
        echo $_SESSION['msg1'];
     }
    ?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">

        </div>
      </div>
     </div>
  </header>
  <section id="navArea">
  <h1>Online Service Provider</h1>
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>

      <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="#"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li><a href="user_login.php">Login</a></li>
          <li><a href="user_registration.php">Registration</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="aboutus.php">About Us</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My First News Item</font></li>
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My Second News Item</font></li>
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My Third News Item</font></li>
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My Four News Item</font></li>
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My Five News Item</font></li>
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My Six News Item</font></li>
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My Seven News Item</font></li>
            <li><img src="images/news_thumbnail3.jpg" alt=""><font color="white"> My Eight News Item</font></li>
            <!--<li><a href="#"><img src="images/news_thumbnail2.jpg" alt="">My Nine News Item</a></li>-->
          </ul>
          <!--<div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>-->
        </div>
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div style="border:2px solid #d083cf; border-radius:11px; padding:20px;">
    <form style="text-align: center;" action="user_login.php" method="POST">
        <input type="email" id="uname" placeholder="Enter email" name="uemail" required><br><br>
        <input type="password" id="pswd" placeholder="Enter password" name="pswd" required><br><br>
        <input type="submit" name="submit" value="submit" >
        </div>
    </form>
    <p style="text-align: center;">Not a User <a href="user_registration.php.php">Create an Account</a></p>

       </div>
      </div>

    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">


          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/1.jpg" > <img src="images/1.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/2.jpg" > <img src="images/2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/3.jpg" > <img src="images/3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/4.jpg" > <img src="images/4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/5.jpg" > <img src="images/5.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/6.jpg" > <img src="images/6.jpg" alt=""/> </a> </figure>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                <div class="media"> <a class="media-left"> <img alt="" src="images/1.jpg"> </a>
                  <div class="media-body"> <a class="catg_title"> Post 1 </a></div>
                </div>
              </li>
              <li>
                <div class="media"> <a class="media-left"> <img alt="" src="images/2.jpg"> </a>
                  <div class="media-body"><a class="catg_title"> Post 2</a></div>
                </div>
              </li>
              <li>
                <div class="media"> <a class="media-left"> <img alt="" src="images/1.jpg"> </a>
                  <div class="media-body"> <a class="catg_title"> Post 3 </a></div>
                </div>
              </li>
              <li>
                <div class="media"> <a class="media-left"> <img alt="" src="images/2.jpg"> </a>
                  <div class="media-body"><a class="catg_title"> Post 4</a></div>
                </div>
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer id="footer">
   <!-- <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav">
              <li><a href="#">Games</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Life &amp; Style</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Photo</a></li>
              <li><a href="#">Slider</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <address>
            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
            </address>
          </div>
        </div>
      </div>
    </div>-->
    <div class="footer_bottom">
      <p class="copyright">Designed By: </p>
      <!--<p class="developer">Developed By Wpfreeware</p>-->
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/js/jquery.newsTicker.min.js"></script>
<script src="assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>


