<?php



include('config.php');


  if(isset($_GET['id'])){
     $ticketID = $_GET['id'];
    $sql3 = "SELECT * FROM ticket where ticket_id = '$ticketID'";
    $result = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result);

 
 }

 if(isset($_POST['Sub'])){
     $ticketID = $_POST['hiddenID'];
     $ticket_name = $_POST['ticket_name'];
    $ticket_date = $_POST['ticket_date'];
     $ticket_venue = $_POST['ticket_venue'];
    $ticket_price = $_POST['ticket_price'];
     $sql3 = "UPDATE ticket SET ticket_name='$ticket_name',ticket_date='$ticket_date',ticket_venue='$ticket_venue',ticket_price='$ticket_price' WHERE ticket_id='$ticketID'";
 
    if ($conn->query($sql3) === TRUE) {
        echo "Record updated successfully";
        header('location:ticketview.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }

 }

      

 

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FANFAIR</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
       <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>FANFAIR</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user2.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">USER</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    
                       
                    <a href="signin.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Sign In</a>
                    <a href="signup.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Sign Up</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Channels</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Insertwarfaze.php" class="dropdown-item">Add Warfaze Information</a>
                            <a href="warfazetable.php" class="dropdown-item">View Warfaze Information</a>
                            <a href="Insertartcell.php" class="dropdown-item">Add Artcell Information</a>
                            <a href="artcelltable.php" class="dropdown-item">View Artcell Information</a>
                            <a href="Insertkarnival.php" class="dropdown-item">Add Karnival Information</a>
                            <a href="karnivaltable.php" class="dropdown-item">View Karnival Information</a>
                            <a href="Insertnemesis.php" class="dropdown-item">Add Nemesis Information</a>
                            <a href="nemesistable.php" class="dropdown-item">View Nemesis Information</a>
                            <a href="Insertminerva.php" class="dropdown-item">Add Minerva Information</a>
                            <a href="minervatable.php" class="dropdown-item">View Minerva Information</a>
                            

                        </div>
                    </div>
                       <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Merch</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="form.php" class="dropdown-item">Categories</a>
                            <a href="merchandiseproducts.php" class="dropdown-item">Merchandise Products</a>
                            <a href="Products.php" class="dropdown-item">View Products</a>
                            <a href="cartitems.php" class="dropdown-item">Cart-items</a>
                        </div>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Ticket Selling</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="ticketSelling.php" class="dropdown-item">Add Ticket Selling Information</a>
                            <a href="ticketview.php" class="dropdown-item">View Ticket Information</a>
                            <a href="ticketbilling.php" class="dropdown-item"> Billing Information</a>
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Album</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Musicview.php" class="dropdown-item">Add Album Information</a>
                            <a href="Musicviewlist.php" class="dropdown-item">View Ticket Information</a>
                          
                           
                        </div>

                    </div>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>User Messages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                             <a href="contactView.php" class="dropdown-item">Contact Form Messages</a>
                           
                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                    
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user2.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">ADMIN</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid">
                <div class="row  pt-4 px-4">

                         

                     <div class="col-sm-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h2 class="mb-4">Edit Category</h2>
                            <form  method="post">
                                   <input type="hidden" value='<?php echo $ticketID ?>' name='hiddenID'>
                                <div class="row mb-3 py-4">
                                  

                                    <label for="ticketname" class="col-sm-2 col-form-label"> Band Name</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" id="ticketname" name='ticket_name' 
                                            value='<?php echo $row['ticket_name'];?>'> 
                                       
                                     
                                    </div>
                                     <label for="ticketdate" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" id="ticketdate" name='ticket_date' 
                                            value='<?php echo $row['ticket_date'];?>'> 
                                       
                                       
                                    </div>
                                     <label for="ticketvenue" class="col-sm-2 col-form-label">Venue</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" id="tickevenue" name='ticket_venue' 
                                            value='<?php echo $row['ticket_venue'];?>'> 
                                       
                                        
                                    </div>
                                     <label for="ticketprice" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" id="ticketprice" name='ticket_price' 
                                            value='<?php echo $row['ticket_price'];?>'> 
                                       
                                       
                                    </div>
                                </div>
                               
                               
                               <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="Sub">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>



                  
                
                   

                </div>
                   </div>


            <!-- Form End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">FANFAIR</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">FANFAIR</a>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>