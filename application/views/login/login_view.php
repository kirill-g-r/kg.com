<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Kirill Goryunov | Log In</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="css/font-awesome.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style-login.css" rel="stylesheet">
  <link href="css/style-login-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
  <div class="container">

    <form class="form-login" role="form" action="/charges" method="post">
      <h2 class="form-login-heading">SIGN IN</h2>
      <div class="login-wrap">
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <br>
        <input type="password" name="password" class="form-control" placeholder="Password" required >
        <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href=""> Forgot Password?</a>

		                </span>
        </label>
        <button class="btn btn-theme btn-block" href="" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        <hr>

        <div class="login-social-link centered">
<!--          <p>or you can sign in via your social network</p>
          <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
          <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>   -->
        </div>
        <div class="registration">
          Registration<br/>

          <a class="" href="#">
            Create an account<br/>
          </a>

        </div>
        <div class="registration">
          Home Page<br/>

          <a class="" href="/">
            Back<br/>
          </a>

        </div>

      </div>

      <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Forgot Password ?</h4>
            </div>
            <div class="modal-body">
              <p>Enter your e-mail address below to reset your password.</p>
              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

            </div>
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
              <button class="btn btn-theme" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal -->

    </form>

  </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
<script>
  $.backstretch("../../images/pic02.jpg", {speed: 500});
</script>


</body>
</html>