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

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Admins Reset List</h1>
             </div>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                

                <div class="card-body">
                    <?php 
                if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                {
                    echo '<h3 class="bg-success text-white p-1"> '.$_SESSION['success'].'</h3>';
                    unset($_SESSION['success']);
                }
                if(isset($_SESSION['status']) && $_SESSION['status'] != '')
                {
                    echo '<h3 class="bg-danger text-white p-1">'.$_SESSION['status'].'</h3>';
                    unset($_SESSION['status']);
                }
            ?>

                    <div class="table-responsive">
                        <?php
                    $query = "SELECT * FROM admins_reset";
                    $query_run = mysqli_query($con,$query);

                ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Serial </th>
                                    <th>Email </th>
                                    <th>DELETE </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        if(mysqli_num_rows($query_run)  > 0)
                        {
                            $count = 0;
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                
                                ?>

                                <tr>
                                    <td> <?php echo $count += 1; ?> </td>
                                    <td> <?php echo $row['email']; ?> </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="admin_reset_del_btn" class="btn btn-danger">
                                                DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                        ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

    <?php 
    include('include/scripts.php');
    include('include/footer.php');
  ?>