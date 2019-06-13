<!DOCTYPE html>
<html>
<head>
   

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style type="text/css">
      
      .backimg 
        {
          background-image: url(images/signupbackground.jpg);
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
         /* height: -webkit-fill-available;*/
        }
   
     </style>


</head>
<body class="backimg">

<div class="login-box" style="position: relative;top: 101px;">
          <div class="panel-heading-heading" style="color: #333;background-color: #e0e0e0;
    border-color: #867e7e;height: 39px; border: 2px;">
             <h3 class="panel-title" style="text-align: center;position: relative;top: 7px;font-size: 19px;color: #0c537b;">Please Sign In</h3>
          </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
             

    <p class="login-box-msg"><!-- Sign in to start your session --></p>

    <form action="#" method="post" id="fid">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="username" placeholder="Emial Id">
        <p id="eml"></p>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <p id="pswrd"></p>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
         <button  name="submit" id="save" class="btn btn-primary btn-block btn-flat">Sign In</button>
          <p id="msg"></p>
        </div>
        <!-- /.col -->
      </div>
    </form> 

    <a href="registration.php">Creat New User Here</a><br>

             

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->









<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>

<script>
$('form#fid').submit(function(e)
{
   var pass=$('#password').val();
    e.preventDefault();
  
  var x = $('#username').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
  
      if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)//mail condition//
       {
          $('#username').css('borderColor','red');
      $('#eml').html('Not A valid Email Address.');
      $('#eml').css('color','red');
          return false;
      
       }
       else
       {
        if(pass.length>=4 && pass.length<=10)//validation of password length
        {
           $.ajax({
              url:'login_index.php',
              type: "POST",
              data: new FormData(this),
              contentType:false,
              processData:false,
              success: function(data)
              {
                
                  if(data==1)
                  {
                    window.location.href= "user_list.php";
                  }
                  // else if (data==2)
                  // {
                  //   window.location.href= "registration.php";
                  // }
                 else
                 {
                    window.location.href= "registration.php";
                   // alert('error');
                 }
                  
              }
                  
                  
          });  }
        else
        {
          $('#password').css('borderColor','red');
          $('#pswrd').html('password must be greater then 4  and less then 10 digit / chracter');
          $('#pswrd').css('color','red');
        }
}        
});

</script>