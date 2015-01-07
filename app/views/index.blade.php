<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>TWITTER - LINKEDIN - draft UX</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<!--==============GOOGLE FONT - OPEN SANS=================-->
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

<!--==============MAIN CSS FOR COMING SOON PAGE=================-->

<link href="{{asset('assets/css/hosting.css')}}" rel="stylesheet" media="all">

<!--==============Mordernizr =================-->

<script src="{{asset('assets/js/modernizr.js')}}"></script>

<!--===================FLEX SLIDER STARTS=======================-->

<link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}" />
<script src="{{asset('assets/js/jquery-1.9.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
<script type="text/javascript">
  $(window).load(function() {
     $('.flexslider').flexslider({
        animation: "slide",
		useCSS: Modernizr.touch
      });
  });
</script>

<!--===================FLEX SLIDER ENDS=======================-->

</head>
<body>

<!--==============Logo & Menu Bar=================-->

<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.html"> <img src="{{asset('assets/images/flathost-logo.png')}}" alt="logo"></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="{{URL::to('/')}}">HOME</a></li>
        <li class="hidden-sm"><a href="{{URL::to('/unfollow')}}">UNFOLLOW</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
    
  </div>
</nav>

<!--==============HEADER =================-->
<div class="jumbotron masthead">
  <div class="container"> 
    
    <!--==============Hero Unit=================-->
    
    <div class="flexslider">
      <ul class="slides">
        <li>
          <div class="hero-unit">
            <h1>Twitter App</h1>
            <h3>Twitter App that unfollows anyone with a LinkedIn URL in their bio. </h3>
            <div class="slider-actions text-center"><a href="{{URL::to('twitter/login')}}" class="btn btn-primary btn-lg">Login with Twitter </a> </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<!--==============Content Area=================-->

<div class="container"> 
  <!--============== Main Features ==============-->
  
  <div class="row mainFeatures" id="features">
    <div class="col-sm-6 col-md-4">
      <div class="img-thumbnail"> <img src="{{asset('assets/images/secure_img.png')}}" width="85" height="88" alt="secure">
        <div class="caption">
          <h4>FEATURE ONE</h4>
          <p>Flathost servers are having high physical security and power redundancy Your data will be secure with us.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="img-thumbnail"> <img src="{{asset('assets/images/fast_img.png')}}" width="85" height="88" alt="secure">
        <div class="caption">
          <h4>FEATURE TWO</h4>
          <p>With our ultra mordern servers and optical cables, your data will be transfered to end user in milliseconds.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-0">
      <div class="img-thumbnail"> <img src="{{asset('assets/images/support_img.png')}}" width="85" height="88" alt="secure">
        <div class="caption">
          <h4>FEATURE THREE</h4>
          <p>We have a dedicated team of support for sales and support to help you in anytime. You can also chat with us.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--============== Footer ==============-->

<div class="footer">
  <div class="container">
    <div class="row footerlinks">
      <div class="col-sm-4 col-md-2">
        <p>CALL US</p>
        <ul>
          <li> +1 4528 254 247</li>
          <li>+1 4002 188 355</li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>FOLLOW US</p>
        <ul>
          <li><a href="http://twitter.com/" target="_blank">Follow on Twitter</a></li>
          <li><a href="http://facebook.com" target="_blank">Like us on Facebook</a></li>
          <li><a href="http://google.in" target="_blank">Join on Google</a> </li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>COMPANY</p>
        <ul>
          <li> <a href="#">About us</a></li>
          <li><a href="#">Latest from Blog</a></li>
          <li><a href="#">Our Team</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>EMAIL US</p>
        <ul>
          <li><a href="mailto:support@mail.in" target="_blank">support@mail.com</a></li>
          <li><a href="mailto:mail@mail.in" target="_blank">sales@mail.com</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>LEGAL TERMS</p>
        <ul>
          <li><a href="#">Terms of use</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>Live Chat</p>
        <ul>
          <li> <a href="#" class="btn btn-success btn-small">CHAT WITH US </a> </li>
        </ul>
      </div>
    </div>
    <div class="row copyright">
      <p>Copyright &copy; 2015.</p>
    </div>
  </div>
</div>


<!--==============BOOTSTRAP JS=================--> 

<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>