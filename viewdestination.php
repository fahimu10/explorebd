

<?php
    include('productfilter/database_connection.php');
    include('source/session.php');
    include ('source/security.php');
    include('source/config.php'); 
    include('include/header.php');
    include('include/navbar.php');

    $des_id = $_GET['destinations_id'];

    $query = "SELECT * FROM destinations JOIN divisions ON destinations.divisions_id = divisions.divisions_id WHERE destinations.destinations_id='$des_id'";
    $query_run = mysqli_query($con,$query);

    $result = mysqli_fetch_assoc($query_run);
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h3 class="mt-4"><?php echo $result['destinations_name'] ?></h3>

            <!-- Author -->
            <p class="lead">
                In
                <a href="#"><?php echo $result['divisions_name'] ?></a>
            </p>

            <hr>


            <!-- Preview Image -->
            <img class="img-fluid rounded" src="admin/upload/<?php echo $result['destinations_img'] ?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $result['destinations_shortdes'] ?></p>

            <p><?php echo $result['destinations_des'] ?></p>

            <h4 class="mt-5">Nearby Hotels</h4>
            <hr>

            <!-- Hotel Sections -->
            <div class="row">
            <?php 
                $hotel_query = "SELECT * FROM hotels JOIN destinations ON hotels.destinations_id=destinations.destinations_id WHERE destinations.destinations_id='$des_id'";
                $hotel_query_run = mysqli_query($con,$hotel_query);

                if(mysqli_num_rows($hotel_query_run) > 0)
                {
                    while($row = mysqli_fetch_assoc($hotel_query_run))
                    {
                        ?>
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="admin/upload/<?php echo $row['hotels_img'] ?>" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="Hotel Name mb-1"><?php echo $row['hotels_name'] ?>
                                        </h5>
                                        <p class="card-text mb-2"><?php echo $row['hotels_shortdes'] ?></p>
                                        
                                        <a href="viewhotel.php?hotels_id=<?php echo $row['hotels_id'] ?>&divisions_name=<?php echo $result['divisions_name'] ?>" class="btn btn-primary">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "<h5>No Hotel Found</h5>";
                }
            ?>
            </div>
            <!-- /.row -->

            
                
            


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">


            <!-- Categories Widget -->
            <div class="card my-4 mt-5">
                <h5 class="card-header">Type</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1">
                                    <a href="#">Relax</a>
                                </li>
                                <li class="mb-1">
                                    <a href="#">Mood Booster</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1">
                                    <a href="#">Nature</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Cost</h5>
                <div class="card-body">
                    <p><?php echo $result['destinations_cost'] ?></p>
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
