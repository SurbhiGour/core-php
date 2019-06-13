<?php  
include("config.php");
session_start();
if (isset($_SESSION['user_id'])) {
    $id=$_SESSION['user_id'];


 // echo $utype=$_SESSION['utype']; 
 $sub=mysqli_query($connection,"SELECT * FROM user WHERE id='$id'")or die(mysqli_error($connection));
 $array=mysqli_fetch_array($sub);
  $type=$array['type'];
  $name = $array['name'];
}
else{
  header('location:index.php');
}
 

?>

<!DOCTYPE html>
<html>
<head>
   

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- Bootstrap 3.3.6 -->

  
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="datatables/media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="datatables/media/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  

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

<!-- <div class="login-box" style="position: relative;top: 101px;">
          <div class="panel-heading-heading" style="color: #333;background-color: #e0e0e0;
    border-color: #867e7e;height: 39px; border: 2px;">
             <h3 class="panel-title" style="text-align: center;position: relative;top: 7px;font-size: 19px;color: #0c537b;">USER REGISTRATION FORM</h3>
          </div> -->
  <!-- /.login-logo -->
  <!-- <div class="login-box-body"> -->
             

    <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List</h3>
              <a href="logout.php" title="logout"  class="btn btn-primary btn-xs"  style="float: right;"></i> Logout</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;" >
              <table id="" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>Sr. No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Mobile no.</th>
                  <th>DOB</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                    include "config.php";
                    $sr_no=0;
                    $sql =mysqli_query($connection,"SELECT * FROM user")or die(mysqli_error($connection));
                         while($row=mysqli_fetch_array($sql))
                       {
                         $sr_no++;
                         $id=$row['id'];
                         
                  ?>
                
                    <tr>
                      <td><?php echo $sr_no; ?></td>                      
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['password']; ?></td>
                      <td><?php echo $row['phone_no']; ?></td>
                      <td><?php echo $row['dob']; ?> </td>
                      <td>
                      <a href="#" data-toggle="modal" title="Record Update" data-target="#editModal" class="btn btn-primary btn-xs" onclick="getdata(<?php echo $id; ?>)"><i class="fa fa-pencil"></i> Edit</a>
                      <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-xs"  onclick="$('#del_id').val('<?php echo $id;?>');"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                <?php  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


             

  <!-- </div> -->
  <!-- /.login-box-body -->
<!-- </div> -->
<!-- /.login-box -->


<div class="modal fade" id="editModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Edit User Details</h4>
        </div>
        <div class="modal-body">
   
    <form id="edit_reg" name="edit_reg" method="post" >

      <input type="hidden" name="rec_id" id="rec_id">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="ename" id="ename" placeholder="Enter Name" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="eemail" id="eemail" placeholder="Enter Email" required="">
        <p id="eml"></p>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="epassword" id="epassword" placeholder="Enter Password">
        <p id="pswrd"></p>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="ephone_no" id="ephone_no" placeholder="Enter Mobile no" maxlength="10" pattern="^[789]\d{9}$" required="">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="date" class="form-control" name="edob" id="edob" placeholder="Enter DOB">
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
          <p id="msg"></p>

         <button  name="submit" id="save" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
        </div>
      </div>
    </div>
</div>

<!-- delete model -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Delete Details</h4>
        </div>
         <form  id="del" autocomplete="off" enctype="multipart/formdata" method="POST">
            <div class="modal-body" id="deleteContent">
                   <input type="hidden" name="data" id="del_id">
                   <div class="form-group">
                         <p><b>Are you sure want to delete ?</b></p>
                  </div>
            </div>
            <center><div id='res1'></div></center>
              <div class="modal-footer">
                   <button class="btn btn-success submit" id="delete_btn" name="submit">Confirm</button>
                   <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>  

              </div>
        </form>
    </div>
  </div>
</div>




<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatables/media/js/dataTables.bootstrap.min.js"></script>


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- <script>
$(document).ready( function () {
    $('#example1').DataTable({
      
      
    })
} );
</script> -->

<script>
    $("#delete_btn").click(function(e)
       { 
            var id=$('#del_id').val();
        e.preventDefault();
    
             $.ajax({
                            url:'user_delete.php',
                            type: "POST",
                            data: {
                                   id:id  
                                  },
                            success: function(data)
                                {
                                  //alert(data);
                                       if(data==1)
                                         {
                                             $("#res1").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Record Successfully Deleted!</div>');
              window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                location.reload();
              }, 1500);
                        
                                         }
                                      else 
                                         {
                                           alert('error');
                                         }                          
                                }
                        });
        })
</script>


<script>
  
  $('#edit_reg').submit(function(e){
    var id = $('#id').val();

    var pass=$('#epassword').val();
 
  e.preventDefault();
        
var x = $('#eemail').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
  
      if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)//mail condition//
       {
          $('#eemail').css('borderColor','red');
      $('#eml').html('Not A valid Email Address.');
      $('#eml').css('color','red');
          return false;
      
       }
       else
       {

         if(pass.length>=4 && pass.length<=10)//validation of password length
        {

          $.ajax({
                     url:'user_update.php',
                     type:'POST',
                     data:new FormData(this),
                     contentType:false,
                        processData:false,

                  success: function(data)

                         {
                           // alert(data);
                          if(data==1)
                            {
                              $("#msg").html('<div class="alert alert-success"><button type="button" class="close">×</button>Record Successfully Updated!</div>');
                                window.setTimeout(function() {
                                  $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                      $(this).remove(); 
                                  });
                                  location.reload();
                                }, 1500);
                            
                          
                            }
                            else 
                            {
                             alert('error');
                              }
                          }//end of success


                })//end of ajax
        }

        else
        {
          $('#epassword').css('borderColor','red');
          $('#pswrd').html('password must be greater then 4  and less then 10 digit / chracter');
          $('#pswrd').css('color','red');
        }
            }
             });
          
</script>
<script>

function getdata(id)
{
  var id=id;
  
  $.ajax({
        url:'get_user_data.php',
        type:'POST',
        data:{
          id:id
        },

        success: function(data)
        {
          var obj = $.parseJSON(data); // this 

          $('#rec_id').val(obj.id);          
          $('#ename').val(obj.name);
          $('#eemail').val(obj.email);
          $('#epassword').val(obj.password);
          $('#ephone_no').val(obj.phone_no);
          $('#edob').val(obj.dob);
          
        } 

      })
}
</script>






</body>
</html>
