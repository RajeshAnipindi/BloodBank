<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BLOOD BANK SYSTEM - RAJESH ANIPINDI</title>
    <style type="text/css">
      input::-webkit-input-placeholder {
      color: #000000 !important;
      }
      input:-moz-placeholder { /* Firefox 18- */
      color: #000000 !important; 
      }
      input::-moz-placeholder {  /* Firefox 19+ */
      color: #000000 !important; 
      }
      input:-ms-input-placeholder { 
      color: #000000 !important; 
      }
    </style>
    <!-- BOOTSTRAP CORE CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-grid.css" rel="stylesheet">
    <link href="bootstrap/css/floating-labels.css" rel="stylesheet">
    <!-- SCRIPT FILE FOR ALERTS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 </head>
<body>

<?php 

session_start();

/*VERIFYING WHETHER HOSPITAL LOGIN FORM WAS SUBMITTED OR NOT*/
if (!empty('$_SESSION[hos_email')) {
if (isset($_POST['hospital_login']) && !empty($_POST['hospital_login'])){
require 'connection.php';  
$username = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
$loginquery = "SELECT * FROM hospitals WHERE email='$username' AND password='$password'";
$loginresult = mysql_query($loginquery);
$rowcount = mysql_num_rows($loginresult);
while ($row = mysql_fetch_assoc($loginresult)) {
$hos_email = $row['email'];
$hos_name = $row['name'];
$hos_address = $row['address'];
$hos_pincode = $row['pincode'];
$hos_mobile = $row['mobile'];
}
echo $hos_pincode;
if($rowcount == 1){
    $_SESSION['hos_email'] = $hos_email;
    $_SESSION['hos_name'] = $hos_name;
    $_SESSION['hos_address'] = $hos_address;
    $_SESSION['hos_pincode'] = $hos_pincode;
    $_SESSION['hos_mobile'] = $hos_mobile;
    header('location:addbloodinfo.php');
}
else{
echo '<script>swal("OOPS ! Invalid Credentials", "Please Check E-Mail/Password", "error")</script>';
}

}
/*VERIFYING WHETHER RECEIVER LOGIN FORM WAS SUBMITTED OR NOT*/

else if(isset($_POST['receiver_login']) && !empty($_POST['receiver_login'])){

require 'connection.php';  
$username = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
$loginquery = "SELECT * FROM receivers WHERE email='$username' AND password='$password'";
$loginresult = mysql_query($loginquery);
$rowcount = mysql_num_rows($loginresult);   /*COUNTING THE FETCHED ROWS */
while ($row = mysql_fetch_assoc($loginresult)) {
$rec_email = $row['email'];
$rec_name = $row['name'];
$rec_bloodgroup = $row['bloodgroup'];
$rec_phone = $row['mobile'];
$rec_address = $row['address'];
}
if($rowcount == 1){
    $_SESSION['rec_email'] = $rec_email;
    $_SESSION['rec_name'] = $rec_name;
    $_SESSION['rec_bloodgroup'] = $rec_bloodgroup;
    $_SESSION['rec_phone'] = $rec_phone;
    $_SESSION['rec_address'] = $rec_address;
    header('location:availablesamples.php');
}
else{
echo '<script>swal("OOPS ! Invalid Credentials", "Please Check E-Mail/Password", "error")</script>';
}
}
}
?>

    <?php include 'header.php'; ?>
    <form class="form-signin" action="" method="POST" style="padding-top: 15%;">
      <div class="text-center mb-4">
        <img class="mb-4" src="images/logo.png" alt="logo" width="100%">
        <h1 class="h3 mb-3 font-weight-normal">Hospital Login Here</h1>
      </div>

      <div class="form-label-group">
        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      </div>

      <div class="form-label-group">
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
      </div>

      <div class="text-center col-sm-4 col-lg-12">
        <p>Not Having Account ?&emsp;<a href="" data-toggle="modal" data-target="#exampleModalCenter">Register Here</a></p>
      </div>

      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign In" name="hospital_login">
      <p class="mt-5 mb-3 text-muted text-center">2018 - 2019 | Rajesh Anipindi</p>
    </form>

    <form class="form-signin" action="" method="POST" style="padding-top: 15%;">
      <div class="text-center mb-4">
        <img class="mb-4" src="images/logo.png" alt="logo" width="100%">
        <h1 class="h3 mb-3 font-weight-normal">Receiver Login Here</h1>
      </div>

      <div class="form-label-group">
        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      </div>

      <div class="form-label-group">
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
      </div>

      <div class="text-center col-sm-4 col-lg-12">
        <p>Not Having Account ?&emsp;<a href="" data-toggle="modal" data-target="#exampleModalCenter">Register Here</a></p>
      </div>

      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign In" name="receiver_login">
      <p class="mt-5 mb-3 text-muted text-center">2018 - 2019 | Rajesh Anipindi</p>
    </form>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">How Do You Want To Register With Us ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-6">
        <a href="registerhospital.php"><img src="images/hospital.png"></a>
      </div>
      <div class="col-md-6 mr-auto">
        <a href="registerreceiver.php"><img src="images/user.png" class="ml-auto"></a>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
<script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="bootstrap/js/jquery-slim.min.js"><\/script>')</script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>