<?php 
include("Admin/include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <link rel="stylesheet" href="owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <title>4Gamers</title>
</head>
<body>
  <nav class="navbar  navbar-expand-md navbar-dark bg-dark">
  <a href="index.php" class="brand-link">
    <span class="brand-text font-weight-bold"><i class="fas fa-1.5x fa-dragon">4Gamers</i></span>
</a>
<button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
  <span class="navbar-toggler-icon" ></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a class="nav-link text-light"  href="index.php">Home</a></li>
    <li class="nav-item dropdown">
      <a href="" class="nav-link text-light dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Register Now</a>
      <div class="dropdown-menu" aria-labelledby="#navbarDropdown">
       <a class="dropdown-item" href="solo.html" >Solo</a>
        <div class="dropdown-item" href="#"></div>
        <a href="duo.html" class="dropdown-item">Duo</a>
        <div class="dropdown-item" href="#"></div>
        <a href="squad.html" class="dropdown-item">Squad</a>
      </div>
    </li>
  </ul>
</div>
</nav>
<?php
$query_ev = "SELECT * FROM `event` order by E_Id DESC limit 3";
$result = mysqli_query($conn, $query_ev);

?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    $i = 0;
    foreach($result as $row){
      $actives = '';
      if($i == 0){
        echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
      }
      else{
        echo '<li data-target="#carouselExampleIndicators" data-slide-to="<= $i ?>" class="active"></li>';
      }
    ?>
    <?php $i++; } ?>
  </ol>
  <div class="carousel-inner">
  <?php
    $i = 0;
    foreach($result as $row){
      $actives = '';
      if($i == 0){
       echo '<div class="carousel-item active">';
      }else{
        echo '<div class="carousel-item">';
      }
    ?>
      <img class="d-block w-100" src="Admin/<?php echo $row['E_poster']; ?>" >
    <?php
    echo '</div>';
    $i++; } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <section class="backage">
  <section class="video-card ">
  <?php 
    $query_vid = "SELECT * FROM `videos` WHERE `mark` = 'new' order by 'Id' DESC limit 6 ";
    $query_vid_run = mysqli_query($conn, $query_vid);
  ?>       

    <div class="vtxt"><h3 class="text-center text-danger display-2">Trailer<span class="text-light">Video</span></h3>  </div>
    <div class="carouselvideo owl-carousel " >
      <?php
      if(mysqli_num_rows($query_vid_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_vid_run))
            {
      ?>
      <div class="item">
        <iframe src="https://www.youtube.com/embed/<?php echo $row['video']; ?>" title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
      </div>
      <?php
          }
        }
      ?>
      </div>
</section>
<section class="suard-card ">
  <div class="stxt"><h3 class="text-center text-danger display-2">Squad<span class="text-light">Video</span></h3>  </div>
  <?php 
    $query_vid = "SELECT * FROM `videos` WHERE `mark` = 'old' order by 'Id' DESC limit 6 ";
    $query_vid_run = mysqli_query($conn, $query_vid);
  ?> 
  <div class="carouselsuard owl-carousel " >
  <?php
      if(mysqli_num_rows($query_vid_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_vid_run))
            {
      ?>
    <div class="item">
        <iframe src="https://www.youtube.com/embed/<?php echo $row['video']; ?>" title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
      </div>
    <?php
          }
        }
      ?>
    
    </div>
  </section>
    <section class="image-contanier">
    <?php 
      $query_win = "SELECT * FROM `winner` order by Id DESC limit 3";
      $query_win_run = mysqli_query($conn, $query_win);
    ?>
      <div class="imgtxt">
        <h4 class="text-center text-danger display-2">Winner<span class="text-light">Photo</span></h4> 
      </div>
      <div class="image-cards">
      <?php
      if(mysqli_num_rows($query_win_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_win_run))
            {
      ?>
      <div class="card">
        <div class="card-img img-squad1"><img src="Admin/<?php echo $row['w_photo'];?>" width="100%" height="100%" alt=""></div>
        <h3><?php echo $row['w_name'];?></h3>
        <p><?php echo $row['w_ename'];?></p>
      </div>
      <?php 
            }
        }
      ?>
    </div> 
      
    </section>  
  
   <section class="gamer">
      <div class="contact-txt">
           <h2 class="text-center text-danger display-2">Contact<span class="text-light">Us</span></h2></div>
           <div class="contact-icons text-center">
             <a class="text-muted" href="#"><i  class="fab fa-cog  fa-facebook"></i></a>
             <a class="text-muted" href="#"><i class="fab fa-cog  fa-youtube"></i></a>
             <a class="text-muted" href="#"><i class="fab  fa-cog fa-twitter"></i></a>
             <a class="text-muted" href="#"><i class="fab fa-cog  fa-instagram"></i></a>
         </div>
         <div class="footer">
         <p class="copyright"> &copy; copyright All Rights Reserved. </p>
       </div>
      </div>

 </section>
</section>

  
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="jqueryfile.js"></script>
    <script src="owl.carousel.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


  
  
  <script type="text/javascript">
    $('.carouselvideo').owlCarousel({
      margin:10,
        loop:true,
         nav:true,
      responsive:{
        0:{
          items:1,
        },
           300:{
             items:1,
           },

           
           400:{
             items:1,
           },
           
           500:{
             items:2,
           },
           
           800:{
             items:3,
           },
           
           1080:{
             items:3,
           },
           1580:{
             items:4,
           },
        
         }


       
        
    });

</script>

<script type="text/javascript">
  $('.carouselsuard').owlCarousel({
    margin:10,
      loop:true,
      nav:true,
  
      responsive:{
        0:{
             items:1,
           },

        
        300:{
             items:1,
           },

           
           400:{
             items:1,
           },
           
           500:{
             items:2,
           },
           
           800:{
             items:3,
           },
           
           1080:{
             items:3,
           },
           1580:{
             items:4,
           },
        
      }
      
  });
</script>


</body>
</html>