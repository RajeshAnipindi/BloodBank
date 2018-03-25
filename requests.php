<!DOCTYPE html>
<html>
<head>
<title>BLOOD BANK SYSTEM - RAJESH ANIPINDI</title>
<!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-grid.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-reboot.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php session_start(); 
if (!empty($_SESSION['hos_email'])) {

?>
<?php include 'header.php'; ?>
<div class="container">
<nav style="margin-top: 8%;">
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-tab-1" data-toggle="tab" href="#navA+" role="tab" aria-controls="nav-home" aria-selected="true">A Positive</a>
    <a class="nav-item nav-link" id="nav-tab-2" data-toggle="tab" href="#navA-" role="tab" aria-controls="nav-profile" aria-selected="false">A Negative</a>
    <a class="nav-item nav-link" id="nav-tab-3" data-toggle="tab" href="#navB+" role="tab" aria-controls="nav-contact" aria-selected="false">B Positive</a>
    <a class="nav-item nav-link" id="nav-tab-4" data-toggle="tab" href="#navB-" role="tab" aria-controls="nav-profile" aria-selected="false">B Negative</a>
    <a class="nav-item nav-link" id="nav-tab-5" data-toggle="tab" href="#navO+" role="tab" aria-controls="nav-home" aria-selected="true">O Positive</a>
    <a class="nav-item nav-link" id="nav-tab-6" data-toggle="tab" href="#navO-" role="tab" aria-controls="nav-profile" aria-selected="false">O Negative</a>
    <a class="nav-item nav-link" id="nav-tab-7" data-toggle="tab" href="#navAB+" role="tab" aria-controls="nav-contact" aria-selected="false">AB Positive</a>
    <a class="nav-item nav-link" id="nav-tab-8" data-toggle="tab" href="#navAB-" role="tab" aria-controls="nav-contact" aria-selected="false">AB Negative</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="navA+" role="tabpanel" aria-labelledby="nav-tab-1">
    <br/>
    <div class="row">
    <?php Retreive('A+'); ?>
 </div>
  </div>
  <div class="tab-pane fade" id="navA-" role="tabpanel" aria-labelledby="nav-tab-2">
    <br/>
    <div class="row">
    <?php Retreive('A-'); ?>
  </div>
  </div>
  
  <div class="tab-pane fade" id="navB+" role="tabpanel" aria-labelledby="nav-tab-3">
    <br/>
    <div class="row">
    <?php Retreive('B+'); ?>
  </div>
  </div>

<div class="tab-pane fade" id="navB-" role="tabpanel" aria-labelledby="nav-tab-4">
    <br/>
    <div class="row">
    <?php Retreive('B-'); ?>
  </div>
  </div>

<div class="tab-pane fade" id="navO+" role="tabpanel" aria-labelledby="nav-tab-5">
    <br/>
    <div class="row">
    <?php Retreive('O+'); ?>
  </div>
  </div>

<div class="tab-pane fade" id="navO-" role="tabpanel" aria-labelledby="nav-tab-6">
    <br/>
    <div class="row">
    <?php Retreive('O-'); ?>
  </div>
  </div>

 <div class="tab-pane fade" id="navAB+" role="tabpanel" aria-labelledby="nav-tab-7">
    <br/>
    <div class="row">
    <?php Retreive('AB+'); ?>
  </div>
  </div>

<div class="tab-pane fade" id="navAB-" role="tabpanel" aria-labelledby="nav-tab-8">
    <br/>
    <div class="row">
    <?php Retreive('AB-'); ?>
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

</body>
</html>

<?php
}
else{

  echo '<script>swal("Not Logged In !", "Please Login First", "error");</script>';
  header('Refresh:3;url=index.php');
}
function Retreive($bloodgroup){
  
  if (!empty($_SESSION['hos_email'])) {
  $hospitalemail = $_SESSION['hos_email'];
  }
  require 'connection.php';
  $blood = $bloodgroup;
  $query = "SELECT * FROM requests WHERE requestedgroup='$blood' AND email='$hospitalemail'";
  $result = mysql_query($query);
  if (mysql_num_rows($result) != 0) {
    while ($row = mysql_fetch_assoc($result)) {
    $email= $row['requesteremail'];
    $name = $row['requestername'];
    $phone = $row['requestermobile'];
    $address = $row['requesteraddress'];
    
  echo '
  <div class="col-sm-4">
    <div class="card text-left">
      <div class="card-body">
        <p class="card-title">Requested By : <b>'.$name.'</b></p>
        <p class="card-title">E-Mail : <b>'.$email.'</b></p>
       <p class="card-text">Contact : <b>'.$phone.'</b></p>
       <p class="card-text">Address : <b>'.$address.'</b></p>';
    
     echo '
      </div>
    </div><br/>
  </div>';
}
}

}

?>
