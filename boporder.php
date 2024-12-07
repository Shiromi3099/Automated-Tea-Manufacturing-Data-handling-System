<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atmdhs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $order_weight = filter_input(INPUT_POST, 'order_weight', FILTER_SANITIZE_NUMBER_FLOAT);
    $tetype = filter_input(INPUT_POST, 'tetype', FILTER_SANITIZE_STRING);

    // Check if the user is logged in
    if (!isset($_SESSION["loggedin"]) || !isset($_SESSION["user_id"])) {
        die("User not logged in.");
    }

    // Get the user ID from the session
    $user_id = $_SESSION["user_id"];

    // Retrieve the username from the users table based on user ID
    $username_query = "SELECT username FROM users WHERE user_id = ?";
    $username_stmt = $conn->prepare($username_query);

    if (!$username_stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $username_stmt->bind_param('d', $user_id);
    $username_stmt->execute();
    $username_result = $username_stmt->get_result();

    if ($username_result->num_rows > 0) {
        $username_row = $username_result->fetch_assoc();
        $buyer_name = $username_row['username'];
    } else {
        die("User not found.");
    }

    $username_stmt->close();

    // Insert order into teaorder table with user ID, buyer name, tea type, order weight, and order date
    $insert_sql = "INSERT INTO teaorder (user_id, teabuyer_name, tetype, order_weight, order_date) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($insert_sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param('sssd', $user_id, $buyer_name, $tetype, $order_weight);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();

    // Subtract ordered weight from a_weight and update b_weight in teatype table
    $update_sql = "UPDATE teatype SET b_weight = a_weight - ? WHERE tetype = ?";
    $update_stmt = $conn->prepare($update_sql);

    if (!$update_stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $update_stmt->bind_param('ds', $order_weight, $tetype);

    // Execute the update statement
    if (!$update_stmt->execute()) {
        die("Execution failed: " . $update_stmt->error);
    }

    // Close the update statement
    $update_stmt->close();

    // Alert message to inform the user that the order has been placed
    echo "<script>alert('Your order has been placed.');</script>";
}

// SQL query to select image paths
$sqlSelectImages = "SELECT tetype, image FROM teatype";
$result = $conn->query($sqlSelectImages);

// Associative array to store image paths
$imagePaths = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imagePaths[$row['tetype']] = $row['image'];
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea Order Form</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">   

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
</head>
<body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                 <div class="logo-container">
                  <img src="img/l2.PNG" alt="logo" width="250">
                 </div>
                 <button class="btn btn-outline-dark" onclick="redirectToOtherPage()"> Back</button>

                </div>
            </div>
        </nav>


   
    
 </div>

<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">  <img class="img-fluid" src="<?php echo $imagePaths['BOP']; ?>" alt=""> </div>
                    <div class="col-md-6">
                        <div class="small mb-1">Agarapatha Tea Plantation</div>
                        <h1 class="display-5 fw-bolder">Broken Orange Pekoe </h1>
                        <p class="lead"> is a system used to grade the tea. 'Broken' refers to the treatment the leaf recieves in the roller and general handeling i.e the leaves are broken. 'Orange' and 'pekoe' refer to the size and quality of the leaves used. OP is at the top of the flush and so regarded as a higher quality.
                         </p>
                         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                             <input type="number" name="order_weight" placeholder="Order Weight (in Kg)" required>
                              <input type="hidden" name="tetype" value="BOP"> <!-- Hidden field for tea type -->
                             <button type="submit" class="btn btn-outline-dark flex-shrink-0">
                              <i class="bi-cart-fill me-1"></i> Order Tea
                              </button>
                          </form>
                     

                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                        <img class="img-fluid" src="<?php echo $imagePaths['BOP1']; ?>" alt="">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">BOP 1</h5>
                                </div>
                            </div>
                            
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="bop1order.php">View options</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                        <img class="img-fluid" src="<?php echo $imagePaths['OP']; ?>" alt="">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">OP</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="oporder.php">View options</a></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                        <img class="img-fluid" src="<?php echo $imagePaths['DUST']; ?>" alt="">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Dust</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="dustorder.php">View options</a></div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="card h-100">
                        <img class="img-fluid" src="<?php echo $imagePaths['DUST1']; ?>" alt="">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Dust 1</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="dust1order.php">View options</a></div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-3">
                    <img class="img-fluid mb-3" src="img/l2.png" alt="Alternate Text" />
                    <p class="txt_whtie pt_25">PRODUCTS OF EXCELLENCE</p>
                    </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Office</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>53 1/ 1,. Sir Baron Jayathilake Mawatha, Colombo 1</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> 0115 388 388</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@lankemplantaion.lk </p>
                <div class="d-flex pt-3">
                <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Productions</h5>
                    <h6 class="text-light">BOPF</h6>
                    <h6 class="text-light">FBOP</h6>
                    <h6 class="text-light">BOP</h6>
                    <h6 class="text-light">OP</h6>
                    <h6 class="text-light">OPA</h6>
                    <h6 class="text-light">DUST</h6>
                    <h6 class="text-light">DUST 1</h6>
                </div>
            </div>
        </div>
    </div>

         <!-- Copyright Start -->
    <div class="container-fluid bg-secondary text-body copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-semi-bold" href="#">Copyright © 2012 Lankem Tea & Rubber Plantations (Pvt.) Limited.</a>, <br>All Right Reserved.</br>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    // Function to redirect to another page
    function redirectToOtherPage() {
        // Replace 'other_page.php' with the actual URL of the other page
        window.location.href = 'teaorder.php';
    }
</script>


</body>

</html>