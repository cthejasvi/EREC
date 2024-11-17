<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<script>
      function displayPopup() {
    alert(" customer details has been edited!");
    // Delay the form reset by 1 second (1000 milliseconds)
    setTimeout(function() {
        document.getElementById("editcustomerForm").reset();
    }, 1000);
}

    </script>
</head>
<body>
    <form id="editcustomerForm" action="saveeditcustomer.php" method="post" onsubmit="displayPopup()">





<center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Customer_name :</span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['customer_name']; ?>" /><br>
<span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['address']; ?>" /><br>
<span>Contact_number: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['contact']; ?>" /><br>
<span>Product_id : </span><input type="text" style="width:265px; height:60px;" name="product_id" value="<?php echo $row['product_id']; ?>"/><br>
<span>Suplier_id : </span><input type="text" style="height:60px; width:265px;" name="suplier_id" value="<?php echo $row['suplier_id'];?>"/><br>
<div style="float:right; margin-right:10px;">


<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>