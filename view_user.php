<!DOCTYPE html>
<html lang="en">
<?php 
require("includes/function.php");
include("language/language.php");
include("includes/head.php");
?>
<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->

	<body>
		<!-- Main navbar -->
<?php 
include("includes/header.php");
$user_id = $_GET['user_id'];

// Fetch user details
$user = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM user WHERE id='$user_id'"));

// Fetch transactions
$transactions = mysqli_query($mysqli, "SELECT * FROM transactions WHERE user_id='$user_id'");

// Fetch unlocked episodes
$unlocked = mysqli_query($mysqli, "
    SELECT ue.*, e.title 
    FROM unlocked_episodes ue
    JOIN episodes e ON ue.episode_id = e.id
    WHERE ue.user_id='$user_id'
");

// Fetch payments
$payments = mysqli_query($mysqli, "SELECT * FROM payments WHERE user_id='$user_id'");

// Fetch user's active membership
$membership = mysqli_query($mysqli, "
    SELECT m.*, um.start_date, um.end_date 
    FROM user_membership um
    JOIN tbl_membership m ON um.membership_id = m.m_id
    WHERE um.user_id='$user_id' AND um.end_date >= CURDATE()
    ORDER BY um.end_date DESC
    LIMIT 1
");
?>

<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <?php include("includes/sidebar.php"); ?>
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <!-- Add a container and some basic CSS for spacing and table formatting -->
                <style>
                    .container {
                        max-width: 900px;
                        margin: 30px auto;
                        background: #fff;
                        padding: 30px;
                        border-radius: 8px;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                    }
                    h2 {
                        margin-top: 40px;
                        margin-bottom: 10px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 30px;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px 12px;
                        text-align: left;
                    }
                    th {
                        background: #f5f5f5;
                    }
                    p {
                        margin: 4px 0;
                    }
                </style>

                <div class="container">
                    <!-- User Details -->
                    <h2>User Details</h2>
                    <p>Name: <?= $user['name'] ?></p>
                    <p>Email: <?= $user['email'] ?></p>
                    <p>Status: <?= $user['status'] ?></p>

                    <!-- Transactions -->
                    <h2>Transactions</h2>
                    <table>
                        <tr><th>ID</th><th>Amount</th><th>Date</th><th>Description</th></tr>
                        <?php while($row = mysqli_fetch_assoc($transactions)) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['amount'] ?></td>
                                <td><?= $row['date'] ?></td>
                                <td><?= $row['description'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    <!-- Unlocked Episodes -->
                    <h2>Unlocked Episodes</h2>
                    <table>
                        <tr><th>Episode Title</th><th>Unlocked At</th></tr>
                        <?php while($row = mysqli_fetch_assoc($unlocked)) { ?>
                            <tr>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['unlocked_at'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    <!-- Payments -->
                    <h2>Payments</h2>
                    <table>
                        <tr><th>ID</th><th>Amount</th><th>Date</th><th>Method</th></tr>
                        <?php while($row = mysqli_fetch_assoc($payments)) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['amount'] ?></td>
                                <td><?= $row['payment_date'] ?></td>
                                <td><?= $row['method'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    <!-- Membership -->
                    <h2>Active Membership</h2>
                    <table>
                        <tr>
                            <th>Membership Name</th>
                            <th>Duration</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Price</th>
                        </tr>
                        <?php 
                        if($membership && mysqli_num_rows($membership) > 0) {
                            $row = mysqli_fetch_assoc($membership);
                        ?>
                            <tr>
                                <td><?= $row['m_name'] ?></td>
                                <td><?= $row['m_duration'] ?> days</td>
                                <td><?= date('Y-m-d', strtotime($row['start_date'])) ?></td>
                                <td><?= date('Y-m-d', strtotime($row['end_date'])) ?></td>
                                <td><?= number_format($row['m_price'], 2) ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td colspan="5" style="text-align: center;">No active membership found</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->

</body>
</html>
