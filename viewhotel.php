<?php
    include('productfilter/database_connection.php'); 
    include('include/session.php');
    include ('include/security.php');
    include('source/config.php');
    include('include/header.php');
    include('include/navbar.php');

    if(!isset($_GET['hotel_id']))
    {
        header('location: index.php');
    }
    
    $hotels_id = $_GET['hotels_id'];
    $division_name = $_GET['divisions_name'];

    $query = "SELECT * hotels JOIN destinations ON hotels.destinations_id=destinations.destinations_id WHERE hotels.hotels_id='$hotels_id'";
    $query_run = mysqli_query($con,$query);

    $result = mysqli_fetch_assoc($query_run);
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h3 class="mt-4"><?php echo $result['hotels_name'] ?></h3>

            <!-- Author -->
            <p class="lead">
                Around
                <a href="#"><?php echo $result['destinations_name'] ?></a>
            </p>

            <hr>


            <!-- Preview Image -->
            <img class="img-fluid rounded" src="admin/upload/<?php echo $result['hotels_img'] ?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $result['hotels_shortdes'] ?></p>

            <p><?php echo $result['hotels_des'] ?></p>

            


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">



            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Division</h5>
                <div class="card-body">
                    <p><?php echo $division_name ?></p>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<?php  
    include('include/footer.php');
?>