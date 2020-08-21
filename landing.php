<?php 

//index.php
    include('source/session.php');
    include ('source/security.php');
    include('productfilter/database_connection.php');
    include ('include/header.php');
    include ('include/navbar.php');
    

?>

<div class="landing-header">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4 text-white my-2">Welcome</h3>
          <p class="lead my-2">Find Your Next Adventure</p>
          <a href="dashboard.php" class="btn btn-primary btn-lg active my-2" role="button" aria-pressed="true">Get Started</a>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
        <h3 class="display-4 text-white my-2">Welcome</h3>
          <p class="lead my-2">Find Your Next Adventure</p>
          <a href="dashboard.php" class="btn btn-primary btn-lg active my-2" role="button" aria-pressed="true">Get Started</a>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/O7fzqFEfLlo/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
        <h3 class="display-4 text-white my-2">Welcome</h3>
          <p class="lead my-2">Find Your Next Adventure</p>
          <a href="dashboard.php" class="btn btn-primary btn-lg active my-2" role="button" aria-pressed="true">Get Started</a>
        </div>
      </div>
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
</div>

<?php 
    include ('include/footer.php');
?>