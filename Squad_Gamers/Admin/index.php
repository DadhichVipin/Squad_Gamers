<!doctype html>

<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <title>Admin Login</title>
     <link rel="stylesheet" href="loginstyle.css">
  </head>
  <body>
      <div class="login-container d-flex align-items-center justify-content-center">
           <form class="login-form text-center" action="adminlogin.php" method="post">
              <h1 class="mb-5 font-weight-light text-danger display-2 text-uppercase text-center">Admin <span class=" text-light">Login</span></h1>
              <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" name="admusr" placeholder="Enter Email Address" autocomplete="off" >
            </div>
              <div class="form-group"> 
                <input type="password" class="form-control rounded-pill form-control-lg" name="admpas" placeholder="Enter password" >
            </div>
           <button type="submit" class="btn mt-4   btn-custom btn-block rounded-pill btn-block font-weight-bold" >LOGIN</button>
         </form>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>