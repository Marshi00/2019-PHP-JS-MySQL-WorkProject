﻿
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>ورود</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

  <form class="form-signin">
    <div class="container">
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>

        <div class="login-wrap">
            <div class="alert alert-danger" id="errorLogin" style="display: none;">
                اطلاعات وارد شده اشتباه است
            </div>
            <input type="text" id="userName" class="form-control" placeholder="نام کاربری" autofocus>
            <input type="password" id="password" class="form-control" placeholder="کلمه عبور">
            <span class="btn btn-lg btn-login btn-block" onclick="login()">ورود</span>
        </div>
    </div>
  </form>

  <script>
      function login() {
          var userName = $("#userName").val();
          var password = $("#password").val();


          $.ajax({
             url:"request/login.php",
             data:{
                 userName:userName,
                 password:password
             },
              dataType: 'json',
              type: 'POST',
              success: function (data) {
                 if(data['error']){
                     $("#errorLogin").show("fast");
                 }else{
                     window.location.href="index.php";
                 }
              }
          });
      }

  </script>


  <script src="js/jquery.js"></script>
  </body>
</html>
