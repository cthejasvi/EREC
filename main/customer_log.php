<?php
session_start();
include('../connect.php');

// Fetch customer log from the database
$sql = "SELECT * FROM customer_log ORDER BY log_id DESC";
$stmt = $db->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <style>
        table {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    background-color: transparent;
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid #dddddd;;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #666666;
            color:white;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Customer Log</h2>
    <table>
        <tr>
            <th>Log ID</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Supplier Name</th>
            <th>Date Arrival</th>
            <th>Action</th>
        </tr>
        <?php
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['log_id']."</td>";
                echo "<td>".$row['customer_id']."</td>";
                echo "<td>".$row['customer_name']."</td>";
                echo "<td>".$row['product_name']."</td>";
                echo "<td>".$row['supplier_name']."</td>";
                echo "<td>".$row['date_arrival']."</td>";
                echo "<td>".$row['action']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No customer log available.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
