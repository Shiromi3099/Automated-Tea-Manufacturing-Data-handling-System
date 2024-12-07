<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atmdhs";

$conn = new mysqli("localhost", "root", "", "atmdhs");

// Check if supply_id is set and fetch its details
if(isset($_GET['supply_id'])) {
    $supply_id = $_GET['supply_id'];
    $sql = "SELECT * FROM supply WHERE supply_id = $supply_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $date = $row['date']; // Store ordered_date separately
    } else {
        die("Invalid Supply ID.");
    }
} else {
    die("Supply ID not provided.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice Template Design</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <div class="invoice_wrapper">
        <div class="header">
            <div class="logo_invoice_wrap">
                <div class="logo_sec">
                    <div class="title_wrap">
                        <p class="title bold">Raw Material Supply Report</p>
                    </div>
                </div>
                <div class="invoice_sec">
                    <p class="invoice bold">Agarapathana Tea Plantation</p>
                    <p class="sub_title">Private Limited</p>
                </div>
            </div>
            <div class="bill_total_wrap">
                <div class="bill_sec">
                    <p class="bold name"></p>
                </div>
                <p class="date">
                    <span class="bold">Date</span>
                    <span><?php echo isset($date) ? $date : "N/A"; ?></span> <!-- Output ordered_date -->
                </p>
            </div>
        </div>
        <div class="body">
            <div class="main_table">
                <div class="table_header">
                    <div class="row">
                        <div class="col col_no">NO</div>
                        <div class="col col_no">Name</div>
                        <div class="col col_des">Raw Material</div>
                        <div class="col col_qty">Quantity</div>
                        <div class="col col_total">Supply Date</div>
                    </div>
                </div>
                <div class="table_body">
                    <div class="row">
                        <div class="col col_no"><?php echo $row['supply_id']; ?></div>
                        <div class="col col_no"><?php echo $row['supplier_name']; ?></div>
                        <div class="col col_des"><?php echo $row['r_type']; ?></div>
                        <div class="col col_qty"><?php echo $row['quantity']; ?></div>
                        <div class="col col_total"><?php echo $row['date']; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Thank you and Best Wishes</p>
            <div class="terms">
                <p class="tc bold">PRODUCTS OF EXCELLENCE</p>
                <div class="col-lg-3 col-md-6">
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>53 1/ 1,. Sir Baron Jayathilake Mawatha, Colombo 1</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> 0115 388 388</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@lankemplantation.lk</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
 