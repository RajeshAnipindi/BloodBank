<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
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
require('connection.php');

if (isset($_POST['addbloodinfo']) && !empty(isset($_POST['addbloodinfo']))) {

$email = $_SESSION['hos_email'];
$donorname = $_POST['inputName'];
$donormobile = $_POST['inputContact'];
$bloodgroup = $_POST['inputBlood'];
$hospitalname = $_SESSION['hos_name'];
$hospitaladdress = $_SESSION['hos_address'];
$pincode = $_SESSION['hos_pincode'];
$hospitalmobile = $_SESSION['hos_mobile'];

$query = "INSERT INTO mybank (email,donorname,donormobile,bloodgroup,hospitalname,hospitaladdress,pincode,hospitalmobile) VALUES ('$email','$donorname',$donormobile,'$bloodgroup','$hospitalname','$hospitaladdress',$pincode,$hospitalmobile)";
$result = mysql_query($query);
if($result == true){
    echo '<script>swal("Hurrah !", "Added To Your Bank Successfully", "success");</script>';
}
else{
  echo '<script>swal("OOPS !", "Something Went Wrong", "warning");</script>';
  }
}
?>

<?php 
if (!empty($_SESSION['hos_email'])) {
?>	

<?php include 'header.php'; ?>
   <form class="form-signin" style="margin-top: 20%;" action="" method="POST"> 
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">ADD BLOOD INFO</h1>
      </div>

      
      <div class="form-label-group">
        <input type="text" name="inputName" class="form-control" placeholder="Donor Name" required>
      </div>


      <div class="form-label-group">
        <input type="text" name="inputContact" class="form-control" placeholder="Donor Contact" 
        maxlength="10" required>
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

     <input class="btn btn-lg btn-primary btn-block" type="submit" value="ADD TO MY BANK" name="addbloodinfo">
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018 - 2019 | Rajesh Anipindi</p>
    </form>
<?php }
else{
	echo '<script>swal("Not Logged In !", "Please Login First", "warning");</script>';
	header('Refresh:3;url=index.php');
}
?>

</body>
</html>