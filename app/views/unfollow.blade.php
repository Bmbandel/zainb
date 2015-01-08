<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Twitter - LinkedIn</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<!--==============GOOGLE FONT - OPEN SANS=================-->
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

<!--==============MAIN CSS FOR COMING SOON PAGE=================-->

<link href="{{asset('assets/css/hosting.css')}}" rel="stylesheet" media="all">

<!--==============Mordernizr =================-->

<script src="{{asset('assets/js/modernizr.js')}}"></script>

<!--===================JQUERY STARTS=======================-->

<script src="{{asset('assets/js/jquery-1.9.0.min.js')}}"></script>

<!--===================JQUERY ENDS=======================-->

<script src="{{asset('assets/js/sweet-alert.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweet-alert.css')}}">

<script type="{{asset('assets/js/jquery.countdown.js')}}"></script>

</head>
<body>

<!--==============Logo & Menu Bar=================-->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.html"> <img src="{{asset('assets/images/flathost-logo.png" alt="lo')}}go"></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{URL::to('/')}}">HOME</a></li>
        <li class="active hidden-sm"><a href="{{URL::to('/unfollow')}}">UNFOLLOW</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
    
  </div>
</nav>

<!--==============Content Area=================-->

<div class="container"> 
  
  <!--============== Features Layout ==============-->
  
  <div class="row FeatLayout">
    <div class="col-md-5 Featimg"> <img src="{{asset('assets/images/life-is-beautiful.jpg')}}" alt="feature" class="img-responsive center-block"></div>
    <div class="col-md-7">
      <h1>Twitter Followers</h1>
      <p class="lead">Scroll down to see all your followers</p>
      <p>As soon as you make a successful payment via PayPal or Google Checkout, your web hosting and domain names will be activated immediately. No waiting time whatsoever. Our network runs the latest stable and secure versions of PHP &amp; MySQL. </p>
    </div>
  </div>
  
  <!--============== Other Features ==============-->
  
  <div class="row PageHead">
    <div class="col-md-12">
      <h3>Click the yellow buttons to unfollow.</h3>

       <span id="clock">

       </span>
	  <!-- Single button -->

    </div>
  </div>
    
    <div id="usercontainer">

      {{  $i=0;  }}
      @foreach($friends as $friend)

      {{  $i=$i==2?0:$i+1;  }}

      {{  $i!=0 or "<div class='row'>"  }}

      <div class="btn-group"><button type="button" class="btn btn-warning dropdown-toggle unfollo" data-toggle="dropdown" aria-expanded="false">Unfollow <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a class="user" data-name="{{ $friend['screen_name'] }}" data-id="{{ $friend['id'] }}" href="#">Yes, unfollow!</a></li><li class="divider"></li><li><a href="#">Nevermind</a></li></ul></div>
        </h4>
        <p>{{$friend['description']}}</p><p><a href="{{$friend['url']}}" target="_blank">{{$friend['url']}}</a></p>
      </div>

      {{  $i!=0 or "</div>"  }}
      @endforeach

    </div>
    
    <div id="loadMore" style="margin:0 auto;" class="btn btn-default">Load More</div>

</div>
<!--Container Closed--> 

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
          <li><a href="http://twitter.com/surjithctly" target="_blank">Follow on Twitter</a></li>
          <li><a href="http://web3canvas.com" target="_blank">Like us on Facebook</a></li>
          <li><a href="http://surjithctly.in" target="_blank">Join on Linkedin</a> </li>
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
      <div class="pull-right"><img src="{{asset('assets/images/logo-footer.png')}}" alt="logo"></div>
      <p>Copyright &copy; 2013. Flathost Inc</p>
    </div>
  </div>
</div>


<!--==============BOOTSTRAP JS=================--> 

<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){

      var current_userid;

      $('.user').on('click',function(e){

        e.preventDefault();
        current_userid=$(this).attr('data-id');
        var name=$(this).attr('data-name');
        swal({   
          title: "Are you sure you want to unfollow "+name+"?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, unfollow!",
          closeOnConfirm: false },
          function(){

            $.ajax({
              "url":"/do_unfollow",
              "type":"get",
              "data":{id:current_userid},
              success:function(data){
                  
                  data=json.Parse(data,true);
                  if(data['success']){
                    swal( title: "Unfollowed Successfully!",text: "",timer: 1000,type:"success");
                  }
                  else if(!data['success'] && data['wait'].length<1){
                    swal( title: "Oops...Something went wrong!",text: "",timer: 1000,type:"warning");
                  }
                  else if(!data['success'] && data['wait'].length>0){

                    swal( title: "Unfollowed Successfully!",text: "",timer: 1000,type:"success");
                    start_timer(data['wait']);
                  }
              }
            });

          });
      });


      function start_timer(time){

        $("#timer").show();
        $('.unfollo').prop('disabled',true);
        $("#timer").countdown(time, function(event) {
            
            $(this).text(
              event.strftime('%M mins')
            );

        }).on('finish.countdown', function(event) {
   
              $("#timer").hide();
              $('.unfollo').prop('disabled',false);
          });
      }


      $('#loadMore').on('click',function(){

          $(this).prop('disabled',true);
          $(this).html('loading....');
          $.ajax({
            "url":"/get_friends",
            "type":"get",
            success: function(data){
                data=json.Parse(data,true);
                var i=0,html="";
                for(var friend in data){

                  i=i==2?0:i+1;
                  if(i!=0){html+="<div class='row'>";}

                  html+='<div class="btn-group">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Unfollow <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a class="user" data-name="'+friend['screen_name'] +'" data-id="'+friend['id']+'" href="#">Yes, unfollow!</a></li><li class="divider"></li><li><a href="#">Nevermind</a></li></ul></div>
                    </h4>
                    <p>'+friend['description']+'</p><p><a href="'+friend['url']+'" target="_blank">'+friend['url']+'</a></p>
                  </div>';

                  if(i!=0){html+="</div>";}

                }

                $(this).prop('disabled',false);
                $(this).html('Load More');
                $('#usercontainer').append(html);
            }
          });

      });

  });

</script>
</body>
</html>