<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "atmdhs";

    // Create connection
    $conn = new mysqli("localhost", "root", "", "atmdhs");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "connection failed";
    }


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present in the $_POST array
    if (isset($_POST['inchargeName']) && isset($_POST['date']) && isset($_POST['startHour']) && isset($_POST['startMinute']) && isset($_POST['startAMPM']) && isset($_POST['endHour']) && isset($_POST['endMinute']) && isset($_POST['endAMPM']) && isset($_POST['teaLeafTemperature']) && isset($_POST['aerationType']) && isset($_POST['rawMaterials']) && isset($_POST['measurements']) && isset($_POST['unit']) && isset($_POST['employeeCount']) && isset($_POST['MachineCount']) && isset($_POST['teaLeafTemperature']) && isset($_POST['Weight1'])) {
        // Process the form data
        $inchargeName = $_POST['inchargeName'];
        $date = $_POST['date'];
        $startTime = $_POST['startHour'] . ':' . $_POST['startMinute'] . ' ' . $_POST['startAMPM'];
        $endTime = $_POST['endHour'] . ':' . $_POST['endMinute'] . ' ' . $_POST['endAMPM'];
        $teaLeafTemperature = $_POST['teaLeafTemperature'];
        $aerationType = $_POST['aerationType'];
        $rawMaterials = $_POST['rawMaterials'];
        $measurements = $_POST['measurements'];
        $unit = $_POST['unit'];
        $employeeCount = $_POST['employeeCount'];
        $machineCount = $_POST['MachineCount'];
        $teaLeafTemperatureAfter = $_POST['teaLeafTemperatureAfter'];
        $weightAfter = $_POST['Weight1After'];

        // Now you can use these variables as needed in your PHP code
        // For example, you can insert them into a database or perform further processing
    } else {
        
    }
}



    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Asst Factory Officer page</title>
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

<body>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="custom-collapsed-content p-4">
            <h5 class="custom-collapsed-heading h4">Collapsed content</h5>
            <span class="custom-collapsed-text">ToggSleable via the navbar brand.</span>
        </div>
    </div>
    <nav class="navbar custom-navbar-color-green"></nav>
    <nav class="navbar navbar-dark  bg-dark">
        <div class="btn-group">
            <button class="btn btn-secondary btn-sm" type="button">
                Asst Factory Officer
            </button>
        </div>

        <div class="btn-group">
            <a href="index.php" class="btn btn-secondary btn-sm">
                Log out
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="logo-container">
            <img src="img/l2.PNG" alt="logo" width="250">
        </div>
        <section class="h-70">
            <div class="container h-70">
                <label class="withering-label">Areation Department</label>
            </div>
        </section>
    </div>

    <div class="d-flex justify-content-center">
        <div class="card mt-4">
            <div class="card-body">
                <form id="Aerationform" action="#" method="POST" class="needs-validation" novalidate autocomplete="off">
                    <div class="form-group">
                        <label for="inputInchargeName" class="mr-2">Officer Name</label>
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

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <label for="inputTeaLeafTemperature" class="mr-2">Tea Leaf Temperature</label>
                            <input type="number" step="0.1" class="form-control" id="inputTeaLeafTemperature" name="teaLeafTemperature" placeholder="" required />
                            <span class="pl-1">°C</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAerationType" class="mr-2">Aeration Type</label>
                            <select class="form-control" id="inputAerationType" name="aerationType" required>
                                <option value="" disabled selected>Select Aeration Type</option>
                                <option value="Fire Wood ">Firewood</option>
                                <option value="Fuel">Fuel</option>
                                <!-- Add more aeration type options as needed -->
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputRawMaterials" class="mr-2">Raw Materials</label>
                            <select class="form-control" id="inputRawMaterials" name="rawMaterials" required>
                                <option value="" disabled selected>Select Raw Materials</option>
                                <option value="FireWood">Fire Wood</option>
                                <option value="Fuel">Fuel</option>
                                <!-- Add more raw material options as needed -->
                            </select>
                        </div>

                        <div class="form-group col-md-4 align-items-center">
                            <label for="inputMeasurements" class="mr-2">Measurement</label>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <input type="number" step="1" class="form-control" id="inputMeasurements" name="measurements" placeholder="" required />
                                <select class="form-control ml-2" id="inputUnit" name="unit" required>
                                    <option value="" disabled selected>Select Unit</option>
                                    <option value="m">Meters</option>
                                    <option value="L">Liters</option>
                                    <!-- Add more unit options as needed based on the raw material -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="add-icon-wrapper form-row align-items-center">
                            <i class="bi bi-plus-square-dotted" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-4">
                            <label for="inputEmployeeCount" class="mr-2">Labour Count</label>
                            <input type="number" class="form-control" id="inputEmployeeCount" name="employeeCount" placeholder="" required />
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-4">
                            <label for="inputMachineCount" class="mr-2">Machine Count</label>
                            <input type="number" class="form-control" id="inputMachineCount" name="MachineCount" placeholder="" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <label for="inputTeaLeafTemperature" class="mr-2">Tea Leaf Temperature</label>
                            <input type="number" step="0.1" class="form-control" id="inputTeaLeafTemperature" name="teaLeafTemperature" placeholder="After Aeration " required />
                            <span class="pl-1">°C</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputWeight" class="mr-2">Weight</label>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <input type="number" step="1" class="form-control" id="inputWeight" name="Weight1" placeholder="After Aeration" required />
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
    </div>
</body>
</html>
