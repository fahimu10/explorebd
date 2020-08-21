<?php 
    include('source/session.php');
    include('source/security.php');
    include('source/config.php');
    include('include/header.php');
    include('include/navbar.php');
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
                    <h6 class="m-0 font-weight-bold text-primary"> Edit User Profile</h6>
                </div>
                <div class="card-body">
                    <?php
                if(isset($_POST['user_edit_btn']))
                    {
                        $id = $_POST['user_edit_id'];

                        $query = "SELECT * FROM users WHERE id='$id' ";
                        $query_run = mysqli_query($con,$query);
                        
                        foreach ($query_run as $row)
                        {
                            ?>
                    <form action="code.php" method="POST">
                        <input type="hidden" name="user_update_id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                            <label> Username </label>
                            <input type="text" name="user_update_username" value="<?php echo $row['username']; ?>"
                                class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="user_update_email" value="<?php echo $row['email']; ?>"
                                class="form-control" placeholder="Enter Email">
                        </div>
                        <a href="users.php" class="btn btn-danger">Cancel</a>
                        <button name="user_update_btn" class="btn btn-primary">Update</button>
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