<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<div class="container">
      <a class="navbar-brand" href="#">BLOOD BANK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <?php 
          if (isset($_SESSION['hos_email']) && !empty($_SESSION['hos_email'])) {
            echo '
            <li class="nav-item">
            <a class="nav-link" href="#">Welcome ! '.$_SESSION['hos_name'].'</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="addbloodinfo.php">Add Blood Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="availablesamples.php">Available Blood Samples</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="requests.php">View Requests</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>';
          }
          elseif (isset($_SESSION['rec_email']) && !empty($_SESSION['rec_email'])){
            echo '
            <li class="nav-item">
            <a class="nav-link" href="#">Welcome ! '.$_SESSION['rec_name'].'</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="availablesamples.php">Available Blood Samples</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>';
          }
          else{
            echo 
            '<li class="nav-item">
            <a class="nav-link" href="availablesamples.php">Available Blood Samples</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.php">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModalCenter">Register</a>
            </li>';
          }
          ?>
        </ul>
      </div>
  </div>
</nav>

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
