<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atmdhs";

$conn = new mysqli("localhost", "root", "", "atmdhs");

// Check if order_id is set and fetch its details
if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql = "SELECT * FROM teaorder WHERE order_id = $order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $order_date = $row['order_date']; // Store ordered_date separately
    } else {
        die("Invalid order ID.");
    }
} else {
    die("Order ID not provided.");
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
                        <p class="title bold">Tea Order Report</p>
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
                    <span><?php echo isset($order_date) ? $order_date : "N/A"; ?></span> <!-- Output ordered_date -->
                </p>
            </div>
        </div>
        <div class="body">
            <div class="main_table">
                <div class="table_header">
                    <div class="row">
                        <div class="col col_no">NO</div>
                        <div class="col col_no">Name</div>
                        <div class="col col_des">Tea Type</div>
                        <div class="col col_qty">Quantity</div>
                        <div class="col col_total">Ordered Date</div>
                    </div>
                </div>
                <div class="table_body">
                    <div class="row">
                        <div class="col col_no"><?php echo $row['order_id']; ?></div>
                        <div class="col col_no"><?php echo $row['teabuyer_name']; ?></div>
                        <div class="col col_des"><?php echo $row['tetype']; ?></div>
                        <div class="col col_qty"><?php echo $row['order_weight']; ?></div>
                        <div class="col col_total"><?php echo $row['order_date']; ?></div>
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
