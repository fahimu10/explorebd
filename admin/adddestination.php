<?php 
    include('source/session.php');
    include('source/security.php');
    include('include/header.php');
    include('include/navbar.php');
    include('source/config.php');
    
?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <?php
            include('include/topbar.php');
        ?>
        <!-- End of Topbar -->

        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Add Destination</h6>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Destination's Name</label>
                            <input type="text" name="destination_name" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label>Destination's Overview</label>
                            <input type="text" name="destination_sdes" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label>Destination's Description</label>
                            <textarea  type="textarea" name="destination_des" class="form-control" cols="50" rows="10"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Destination's Cost</label>
                            <input type="number" name="destination_cost" class="form-control"  required>
                        </div>
                        <div class="form-group">            
                        <label for="destination_division">Destination's Division</label>
                        <select name="destination_division" class="form-control" requireed>
                            <?php 
                                $query = "SELECT * FROM divisions ";
                                $query_run = mysqli_query($con,$query);
                                
                                foreach ($query_run as $row)
                                {
                                    ?>
                                        <option value="<?php echo $row['divisions_id']; ?>"><?php echo $row['divisions_name']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        </div>
  
                        <div class="form-group">
                            <label>Destination's Image</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <a href="destinations.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="adddestinationbtn" class="btn btn-primary">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>




    </div>
    <!-- End of Main Content -->


<?php 
    include('include/scripts.php');
    include('include/footer.php');
?>