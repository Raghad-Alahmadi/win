<?php

include './inc/db.php';
include './inc/form.php';


$sql = 'SELECT * FROM users ORDER  BY RAND() LIMIT 1 ';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);



mysqli_free_result($result);
mysqli_close($conn);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
    <img src="images/prize.png" alt="" style="width: 350px; height: auto; margin-top: 10px;">
      <h1 class="display-4 fw-normal">Win a prize</h1>
      <p class="lead fw-normal">Registration remains open</p>
      <p id="count"></p>
      <p class="lead fw-normal">free copy of a program</p>

      
      </div>

      <div class="container">
        <h3>To enter the draw, please do the following</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">watch the stream on Facebook </li>
            <li class="list-group-item">a one hour streame to answer your Questions</li>
            <li class="list-group-item">After one hour the registeration link will be available, your gonna type your name and your email</li>
            <li class="list-group-item">After ending the stream a random name will be choosen from the Database</li>
            <li class="list-group-item">the winner will get a free copy of kamtazia</li>
          </ul>
      </div>
  </div>


<div class="container">
<div class="position-relative text-center ">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        
<form action="<?php $_SERVER['PHP_SELF'] ?>" method = "POST">
    <h3>Please enter your information</h3>
  <div class="mb-3">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" name = "fname" id="exampleInputEmail1" value="<?php  echo $fname?>" >
    <div  class="form-text error"><?php echo $errors['fnameError'] ?></div>
  </div>

  <div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" name = "lname" id="exampleInputEmail1" value="<?php  echo $lname?>" >
    <div class="form-text error"><?php echo $errors['lnameError'] ?></div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="text" class="form-control" name = "email" id="exampleInputEmail1"value="<?php  echo $email?>" >
    <div  class="form-text error"><?php echo $errors['EmailError'] ?></div>
  </div>

  <button type="submit"name="submit" class="btn btn-primary" value="send">Submit</button>
</form>
</div>
  </div>
</div>

</html>
<div id= "loader-con">
<div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>


<div class="d-grid gap-2 col-6 mx-auto my-5">
<!-- Button trigger modal -->
<button  id = "winner" type="button" class="btn btn-primary">
  Choose a Winner
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-titel" id="exampleModalLabel">The Winner</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php foreach ($users as $user): ?>
        <h1 class="display-3 text-center modal-body" id="exampleModalLabel"><?php echo htmlspecialchars($user['fname']) . ' ' . htmlspecialchars($user['lname']) . '<br>' ?></h1>
        <?php endforeach; ?>

    </div>
  </div>
</div>

    <div id="cards" class="row mb-5 pb-5">
    
        <div class="col-sm-6">
            <div class="card my-2 bg-light">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"><?php echo htmlspecialchars($user['email']) ?></p>
                </div>
            </div>
        </div>

</div>
<script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/loader.js"></script>
    <script src="./js/script.js"></script>

   
</body>

