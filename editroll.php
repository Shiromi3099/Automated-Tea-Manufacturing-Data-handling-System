<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atmdhs";

$conn = new mysqli("localhost", "root", "", "atmdhs");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inchargeName = $_POST["inchargeName"];
    $date = $_POST["date"];
    $startHour = $_POST["startHour"];
    $startMinute = $_POST["startMinute"];
    $endHour=$_POST["endHour"];
    $endMinute=$_POST["endMinute"];
    $employeeCount=$_POST["employeeCount"];
    $machineCount=$_POST["count"];
    $teaLeafTemperature=$_POST["teaLeafTemperature"];
    $Weight1=$_POST["Weight1"];


    if (isset($_GET['id'])) {
        $id = $_GET['id'];

    $sql = "UPDATE rolling_dpt SET inchargeName='$inchargeName', date='$date', startHour='$startHour', startMinute='$startMinute', endHour='$endHour', endMinute='$endMinute', employeeCount='$employeeCount',MachineCount='$machineCount',teaLeafTemperature='$teaLeafTemperature', Weight1= '$Weight1'WHERE id=$id";
   

    if ($conn->query($sql) === TRUE) {
        $popupMessage = "updated successfully";
      } else {
          echo "Error updating user: " . $conn->error;
      }
  } else {
      echo "User ID not found in the URL";
  }
}




$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Asst Factroy officer page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="css/style1.css" rel="stylesheet">
</head>

<div class="collapse" id="navbarToggleExternalContent">
  <div class="custom-collapsed-content p-4">
    <h5 class="custom-collapsed-heading h4">Collapsed content</h5>
    <span class="custom-collapsed-text">Toggleable via the navbar brand.</span>
  </div>
</div>
<nav class="navbar navbar-dark  bg-dark">
    <div class="btn-group">
      <button class="btn btn-secondary btn-sm" type="button">
          Asst Factroy Officer
      </button>
    </div>

    <div class="btn-group">
    <a href="dashroll.php" class="btn btn-secondary btn-sm">
  Back
</a>

    </div>
  </div>
</nav>
<body>
  
 <div class="container-fluid">
    <div class="logo-container">
     <img src="img/l2.PNG" alt="logo" width="250">
    </div>
    <section class="h-70">
      <div class="container h-70">
       <label class="withering-label">Rolling Department</label>
      </div>
    </section>
    
 </div>

 <div class="d-flex justify-content-center">
  <div class="card mt-4">
   <div class="card-body">
    <form id="WitheringForm" action="#" method="" class="needs-validation" novalidate autocomplete="off">
      <div class="form-group">
        <label for="inputInchargeName" class="mr-2"> Officer Name</label>
        <input type="text" class="form-control" id="inputInchargeName" name="inchargeName" placeholder="" required />
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputDate" class="mr-2">Date</label>
          <input type="date" class="form-control" id="inputDate" name="date" required />
        </div>

        <div class="form-group col-md-4">
          <label for="inputStartTimeHour">Start Time</label>
          <div class="d-flex flex-row justify-content-between align-items-center">
            <input type="number" min="1" max="12" class="form-control mr-1" id="inputStartTimeHour" name="startHour" placeholder="HH" required />
            <div class="pl-1 pr-2">:</div>
            <input type="number" min="0" max="59" class="form-control" id="inputStartTimeMinute" name="startMinute" placeholder="MM" required />
            <select class="form-control ml-2" id="inputStartTimeAMPM" name="startAMPM" required>
              <option value="" disabled selected>Select</option>
              <option value="AM">AM</option>
              <option value="PM">PM</option>
            </select>
          </div>
        </div>
        
        

        <div class="form-group col-md-4">
          <label for="inputEndTimeHour">End Time</label>
          <div class="d-flex flex-row justify-content-between align-items-center">
            <input type="number" min="1" max="12" class="form-control mr-1" id="inputEndTimeHour" name="endHour" placeholder="HH" required />
            <div class="pl-1 pr-2">:</div>
            <input type="number" min="0" max="59" class="form-control" id="inputEndTimeMinute" name="endMinute" placeholder="MM" required />
            <select class="form-control ml-2" id="inputEndTimeAMPM" name="endAMPM" required>
              <option value="" disabled selected>Select</option>
              <option value="AM">AM</option>
              <option value="PM">PM</option>
            </select>
          </div>
        </div>
        
    </div>
      
</div>

      <div class="form-row align-items-center"> <!-- Use form-row and align-items-center to align label and input horizontally -->
        <div class="form-group col-md-4">
          <label for="inputEmployeeCount" class="mr-2">labour Count</label>
          <input type="number" class="form-control" id="inputEmployeeCount" name="employeeCount" placeholder="" required />
        </div>
      </div>


      <div class="form-row align-items-center"> <!-- Use form-row and align-items-center to align label and input horizontally -->
        <div class="form-group col-md-4">
          <label for="inputMachineCount" class="mr-2">MachineCount</label>
          <input type="number" class="form-control" id="inputMachineCount" name="count" placeholder="" required />
        </div>
      </div>

      <div class="form-group">
        <div class="d-flex align-items-center">
          <label for="inputTeaLeafTemperature" class="mr-2">Tea Leaf Temperature</label>
          <input type="number" step="0.1" class="form-control" id="inputTeaLeafTemperature" name="teaLeafTemperature" placeholder="After rolling" required />
          <span class="pl-1">°C</span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputWeight" class="mr-2">Weight</label>
          <div class="d-flex flex-row justify-content-between align-items-center">
            <input type="number" step="1" class="form-control" id="inputWeight" name="Weight1" placeholder=" After rolling" required />
            <span class="pl-1 pr-2">Kg</span>
          </div>
        </div>
      </div>

      

      <!-- Start Submit Button -->
      <div class="submit-button-wrapper">
        <button class="btn btn-primary btn-block col-lg-2" type="submit">Submit</button>
      </div>
      <!-- End Submit Button -->
    </form>
  </div>
  </div>
 </div>>
 <script type="text/javascript" src="js/rolling.js"></script>
</body>

<script>
        var popupMessage = '<?php echo $popupMessage; ?>';

        if (popupMessage !== '') {
            // Display the popup message
            if (confirm(popupMessage )) {
                // Redirect to another page (e.g., Dash.php)
                window.location.href = 'dashshift.php';
            }
        }
    </script>

    </html>