    <!-- Nav Section Start -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo Start -->
            <a class="navbar-brand logo" href="index.html">ExploreBD.</a>
            <!-- Logo End -->
            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Toggle Button -->
            <!-- Nav Bar Start -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="aboutus.html">About Us</a>
                    <a class="nav-item nav-link" href="contact.php">Contact</a>

                    <a class="nav-item nav-link" href="logoutcode.php">Logout</a>

                    <!-- User Profile Start-->
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle ml-2" type="button" id="dropdownMenuButton"         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username'] ?>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i
                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                    <!-- User Profile End -->

                </div>
            </div>
            <!-- Nav Bar End -->
    </nav>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="logoutcode.php" method="POST">
                        <button type="submit" class="btn btn-primary" name="logoutbtn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- Nav Section End -->