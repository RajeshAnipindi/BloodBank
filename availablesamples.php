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

<?php
error_reporting(0);
session_start();
if (isset($_POST['request_sample'])) {
  require 'connection.php';
  $req_hosemail = $_POST['hospitalemail'];
  $req_recemail =$_POST['receiveremail'];
  $req_recname = $_POST['receivername'];
  $req_recphone = $_POST['receiverphone'];
  $req_recaddress = $_SESSION['rec_address'];
  $req_group = $_POST['requestedgroup'];
	
  $requestquery =  "INSERT INTO requests (email,requesteremail,requestername,requestermobile,requesteraddress,requestedgroup) VALUES ('$req_hosemail','$req_recemail','$req_recname',$req_recphone,'$req_recaddress','$req_group')";
  $res = mysql_query($requestquery);
  if($res == true){
echo '<script>swal("Request Sent !", "You will be notified soon", "success");</script>';
  }
  else{
echo '<script>swal("OOPS !", "Something Went Wrong", "error");</script>'; 
  }

  
}

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

<?php
function Retreive($bloodgroup){
	
	require 'connection.php';
	$blood = $bloodgroup;
  $query = "SELECT * FROM mybank WHERE bloodgroup='$blood' GROUP BY hospitalname";
	$result = mysql_query($query);
	if (mysql_num_rows($result) != 0) {
  	while ($row = mysql_fetch_assoc($result)) {
    $hospitalemail= $row['email'];
    $hospitalname = $row['hospitalname'];
    $hospitaladdress = $row['hospitaladdress'];
    $hospitalmobile = $row['hospitalmobile'];
	echo '
  <div class="col-sm-6">
    <div class="card text-center">
      <div class="card-body">
        <p class="card-title">Hospital Name : <b>'.$hospitalname.'</b></p>
        <p class="card-title">Hospital Contact : <b>'.$hospitalmobile.'</b></p>
        <p class="card-text">Hospital Address : <b>'.$hospitaladdress.'</b></p>';
        if(!empty($_SESSION['rec_email']) && ($_SESSION['rec_bloodgroup'] == $blood )){
          $receivername = $_SESSION['rec_name'];
          $receiveremail = $_SESSION['rec_email'];
          $receiverphone = $_SESSION['rec_phone'];
          
   echo '<form action="" method="POST">
   <input type="hidden" value="'.$hospitalemail.'" name="hospitalemail">
   <input type="hidden" value="'.$receivername.'" name="receivername">
   <input type="hidden" value="'.$receiveremail.'" name="receiveremail">
   <input type="hidden" value="'.$receiverphone.'" name="receiverphone">
   <input type="hidden" value="'.$blood.'" name="requestedgroup">
   <input type="submit" class="btn btn-primary bg-success" style="border-color: transparent;" value="REQUEST SAMPLE" name="request_sample"></form>';
    }
    elseif (!empty($_SESSION['hos_email'])) {
 echo '<button class="btn btn-primary bg-dark disabled" style="border-color: transparent;">HOSPITAL CANNOT REQUEST SAMPLE</button>';
    }
    elseif (!empty($_SESSION['rec_email']) && ($_SESSION['rec_bloodgroup'] != $blood)) {
echo '<button class="btn btn-primary disabled" style="background-color:red;border-color: transparent;">YOUR GROUP DOES NOT MATCH WITH THIS</button>';
     }
    elseif (empty($_SESSION['hos_email']) || empty($_SESSION['hos_email'])) {
echo '<p class="text-danger">LOGIN TO REQUEST SAMPLE</p>';
     }
    
     echo '
      </div>
    </div><br/>
  </div>';
}
}

}

?>