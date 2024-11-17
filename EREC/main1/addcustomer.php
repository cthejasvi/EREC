<!DOCTYPE html>
<html>
<head>
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <script>
      function displayPopup() {
    alert("New customer registered!");
    // Delay the form reset by 1 second (1000 milliseconds)
    setTimeout(function() {
        document.getElementById("customerForm").reset();
    }, 1000);
}

    </script>
</head>
<body>
    <form id="customerForm" action="savecustomer.php" method="post" onsubmit="displayPopup()">
        <center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
        <hr>
        <div id="ac">
            <span>Customer_name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" Required/><br>
            <span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" placeholder="Address"/><br>
            <span>Contact_number : </span><input type="text" style="width:265px; height:30px;" name="contact" placeholder="Contact"/><br>
            <span>Product_id : </span><input type="number" style="height:70px; width:265px;" name="product_id"></textarea><br>
            <span>Suplier_id: </span><input type="number" style="height:60px; width:265px;" name="suplier_id"></textarea><br>
            <div style="float:right; margin-right:10px;">
                <button type="submit" class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
            </div>
        </div>
    </form>
</body>
</html>
