<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atmdhs";

// Create connection
$conn = new mysqli("localhost", "root", "", "atmdhs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="select *from users";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Factory Officer Dashbord</title>
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
    <link href="css/bootstrap.min1.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style02.css" rel="stylesheet">

    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>ATMDHS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
    <div class="ms-3">
        <h6 class="mb-0" style="color: white;"></h6>
        <span style="color:Green;">Factory Officer</span>
    </div>
</div>
                <div class="navbar-nav w-100">
                    <a href="dash.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Deprtment</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="dashwith.php" class="dropdown-item">Withering Department</a>
                            <a href="dashroll.php" class="dropdown-item">Rolling Department</a>
                            <a href="dashaera.php" class="dropdown-item">Aeration Department</a>
                            <a href="dashshift.php" class="dropdown-item">Shifting Department</a>
                            <a href="dashpack.php" class="dropdown-item">Packing Department</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Raw Materials</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="supplier.php" class="dropdown-item">Supply</a>
                            <a href="supplylist.php" class="dropdown-item">Supply list</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="packingdpt.php" class="nav-item nav-link active"  <i class="far fa-file-alt me-2"></i>Packing Department</a>

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
                            <span class="d-none d-lg-inline-flex">Factory Officer</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="view.php" class="dropdown-item">My Profile</a>
                            <a href="index.php" class="dropdown-item">Log Out</a>
                        </div>
                        
 
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

 <!-- Sale & Revenue Start -->
           
<div class="container-fluid2 pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4 ">
                <div class="ms-3">
                    <p class="mb-2" style="color:#2e841f;">Total Deaprtments</p>
                    <h3 class="mb-0" style="color: white;">5</h3>
                </div>
            </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <div class="ms-3">
                    <p class="mb-2" style="color:#2e841f;">Total internal Users</p>
                    <?php
// Define an array of allowed user types
$allowedUserTypes = ['fo', 'senior-fo', 'asst-fo1', 'asst-fo2', 'junior-fo1'];

// Create a comma-separated string of allowed user types for the SQL query
$userTypesString = "'" . implode("', '", $allowedUserTypes) . "'";

$dash_TotalUsers_query = "SELECT * FROM users WHERE user_type IN ($userTypesString)";
$dash_TotalUsers_query_run = mysqli_query($conn, $dash_TotalUsers_query);

if ($total_users = mysqli_num_rows($dash_TotalUsers_query_run)) {
    echo '<h3 class="mb-0" style="color: white;">' . $total_users . '</h3>';
} else {
    echo '<h3 class="mb-0" style="color: white;">No Data</h3>';
}
?>               
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="container-fluid2 pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-5">
                        <div class="bg-secondary rounded p-4">
                            <canvas id="pieChart" width="200" height="250"></canvas>
                        </div>
                    </div>
                    <!-- Bar Chart -->
                    <div class="col-sm-7">
                        <div class="bg-secondary rounded p-4">
                            <canvas id="barChart" width="200" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
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
    <script>
    <?php
    // Fetch tetype from teatype table
    $sql_tetype = "SELECT tetype FROM teatype";
    $result_tetype = $conn->query($sql_tetype);
    
    // Array to store pie chart data
    $pieChartData = array();
    
    // Loop through teatype results
    while ($row_tetype = $result_tetype->fetch_assoc()) {
        $tetype = $row_tetype['tetype'];
        
        // Fetch sum of a_weight for the specified tetype
        $sql = "SELECT a_weight FROM teatype WHERE tetype = '$tetype'";
        $result = $conn->query($sql);
        
        // Fetch result for the specified tetype
        $row = $result->fetch_assoc();
        
        // Add result to pieChartData array
        $pieChartData[] = array('tetype' => $tetype, 'a_weight' => $row['a_weight']);
    }
    ?>

    // Extracting data for D3.js
    const data = <?php echo json_encode($pieChartData); ?>;

    // Debugging: Output data to the console
    console.log(data);

    // Extracting labels and data for Chart.js
    const labels = data.map(entry => entry.tetype);
    const weights = data.map(entry => entry.a_weight);

    // Debugging: Output labels and weights to the console
    console.log(labels, weights);

    // Creating the pie chart with Chart.js
const ctx = document.getElementById('pieChart').getContext('2d');
const pieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: weights, // Changed from total_weights to weights
            backgroundColor: [
                '#006400',
                    '#556B2F',
                    '#8FBC8F',
                    '#ADFF2F',
                    '#7CFC00',
                    '#32CD32', // Add more colors as needed
                    '#00FA9A',
                    '#6B8E23'
            ],
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, // Set to false to allow explicit control over width and height
        title: {
            display: true,
            text: 'Total Orders by Tea Type', // Title for the pie chart
            fontSize: 16,
            fontColor: '#2196F3' // Set title font color to white
        },
    },
});


<?php
// Fetch data for the bar chart (a_weight from teatype and total order weight from teaorder)
$sql_bar_chart = "SELECT teatype.tetype, teatype.a_weight, SUM(teaorder.order_weight) AS total_order_weight
                  FROM teatype
                  LEFT JOIN teaorder ON teatype.tetype = teaorder.tetype
                  GROUP BY teatype.tetype";

$result_bar_chart = $conn->query($sql_bar_chart);
$barChartData = array();

while ($row = $result_bar_chart->fetch_assoc()) {
    $tetype = $row['tetype'];
    $a_weight = $row['a_weight'];
    $total_order_weight = $row['total_order_weight'];

    $barChartData[] = array('tetype' => $tetype, 'a_weight' => $a_weight, 'total_order_weight' => $total_order_weight);
}
?>


      // JavaScript code to create the bar chart
const barChartData = <?php echo json_encode($barChartData); ?>;
const barLabels = barChartData.map(entry => entry.tetype);
const aWeights = barChartData.map(entry => entry.a_weight);
const totalOrderWeights = barChartData.map(entry => entry.total_order_weight);

const ctxBar = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: barLabels,
        datasets: [{
            label: 'a_weight',
            data: aWeights,
            backgroundColor: 'rgba(255, 99, 132, 0.5)', // Red color with opacity
            borderColor: 'rgba(255, 99, 132, 1)', // Red color
            borderWidth: 1
        }, {
            label: 'Total Order Weight',
            data: totalOrderWeights,
            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue color with opacity
            borderColor: 'rgba(54, 162, 235, 1)', // Blue color
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                stacked: true // Stack bars horizontally
            },
            y: {
                stacked: true // Stack bars vertically
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            },
            title: {
                display: true,
                text: 'Comparison of a_weight and Total Order Weight for each tetype',
                fontSize: 16,
                fontColor: '#2196F3'
            }
        }
    }
});


           // Debugging: Output initialization success to the console
    console.log("Chart initialized successfully!");
    </script>

 
</script>
</body>

</body>

</html>
