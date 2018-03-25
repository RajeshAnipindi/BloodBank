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
    <!-- Bootstrap 4.0.0 core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-grid.css" rel="stylesheet">
    <!-- Custom style for the Fields in the Form -->
    <link href="bootstrap/css/floating-labels.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>
  <body>

<!-- PHP CODE FOR FORM -->
<?php
require('connection.php');
if (isset($_POST['registerreceiver']) && !empty(isset($_POST['registerreceiver']))) {

$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
$name = $_POST['inputName'];
$blood = $_POST['inputBlood'];
$address = $_POST['inputAddress'];
$pincode = $_POST['inputPincode'];
$contact = $_POST['inputContact'];

$verify = "SELECT * FROM receivers WHERE email='$email' OR mobile='$contact'";
$verified = mysql_query($verify);
if(mysql_num_rows($verified) == 1){
   echo '<script>swal("OOPS !", "You Already Have An Account", "error");</script>';
}
else{
$query = "INSERT INTO receivers VALUES ('$email','$password','$name','$blood','$address',$pincode,$contact)";
  $result = mysql_query($query);
  if($result == true){
    echo '<script>swal("Hurrah !", "Account Created Successfully", "success");</script>';
  }
  else{
   echo '<script>swal("OOPS !", "Something Went Wrong", "warning");</script>';
  }
}
}
?>
<!-- END OF PHP FORM CODE -->

<!-- Importing the Navigation Header -->
    <?php include 'header.php'; ?>

<!-- Registration Form for Receiver -->

    <form class="form-signin" action="" method="POST" style="margin-top: 30%;">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Receiver Registration</h1>
      </div>

      <div class="form-label-group">
        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      </div>

      <div class="form-label-group">
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
      </div>

      <div class="form-label-group">
        <input type="text" name="inputName" class="form-control" placeholder="Receiver Name" required>
      </div>

      <div class="form-label-group">
        <select name="inputBlood" class="form-control" required>
          <option value="">Blood Group</option>
        <?php
           $group=array("A+","A-","B+","B-","O+","O-","AB+","AB-");
           $i=0;
           foreach($group as $bgroup){
           $i++;
           echo"<option value='$bgroup'>$bgroup</option>";   
           }
        ?>
        </select>
      </div>

      <div class="form-label-group">
      <textarea name="inputAddress" class="form-control" placeholder="Receiver Address" required></textarea>
      </div>


      <div class="form-label-group">
        <input type="text" name="inputPincode" class="form-control" placeholder="Pincode" maxlength="6" onkeypress="return isNumberKey(event);" required>
      </div>

      <div class="form-label-group">
        <input type="text" name="inputContact" class="form-control" placeholder="Mobile Number" maxlength="10"
        onkeypress="return isNumberKey(event);" required>
      </div>

      <div class="text-center col-sm-4 col-lg-12">
        <p>Already Having an Account ?&emsp;<a href="login.php">Login Here</a></p>
      </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="registerreceiver">Register</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018 - 2019</p>
    </form>

<!-- End Of Form -->

<!-- JavaScript Files -->

<script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="bootstrap/js/jquery-slim.min.js"><\/script>')</script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
};
</script>
</body>
</html>