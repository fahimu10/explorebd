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
                    <h6 class="m-0 font-weight-bold text-primary"> Edit Admin Profile</h6>
                </div>
                <div class="card-body">
                <?php
                if(isset($_POST['edit_btn']))
                    {
                        $id = $_POST['edit_id'];

                        $query = "SELECT * FROM admins WHERE id='$id' ";
                        $query_run = mysqli_query($con,$query);
                        
                        foreach ($query_run as $row)
                        {
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label> Username </label>
                                    <input type="text" name="update_username" value="<?php echo $row['username']; ?>"
                                        class="form-control" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="update_email" value="<?php echo $row['email']; ?>"
                                        class="form-control" placeholder="Enter Email">
                                </div>
                                <a href="register.php" class="btn btn-danger">Cancel</a>
                                <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                            </form>
                            <?php
                        }
                    }
            ?>

                </div>
            </div>
        </div>


    </div>
    <!-- End of Main Content -->


    <?php 
    include('include/scripts.php');
    include('include/footer.php');
?>