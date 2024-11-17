<html>
<head>
<title>POS</title>
<?php
	require_once('auth.php');
?>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style type="text/css">
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  .sidebar-nav {
    padding: 9px 0;
  }
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<script language="javascript" type="text/javascript">
  <!-- Begin
  var timerID = null;
  var timerRunning = false;
  function stopclock() {
    if(timerRunning)
    clearTimeout(timerID);
    timerRunning = false;
  }
  function showtime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds()
    var timeValue = "" + ((hours >12) ? hours -12 :hours)
    if (timeValue == "0") timeValue = 12;
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds
    timeValue += (hours >= 12) ? " P.M." : " A.M."
    document.clock.face.value = timeValue;
    timerID = setTimeout("showtime()",1000);
    timerRunning = true;
  }
  function startclock() {
    stopclock();
    showtime();
  }
  window.onload=startclock;
  // End -->
</script>
</head>
<?php
require_once('auth.php');
require('../connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $customer_name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $product_id = $_POST['product_id'];
  $suplier_id = $_POST['suplier_id'];

  // Perform validation and sanitization of input data here

  $sql = "INSERT INTO customer (customer_name, address, contact, product_id, suplier_id) VALUES (:customer_name, :address, :contact, :product_id, :suplier_id)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':customer_name', $customer_name);
  $stmt->bindParam(':address', $address);
  $stmt->bindParam(':contact', $contact);
  $stmt->bindParam(':product_id', $product_id);
  $stmt->bindParam(':suplier_id', $suplier_id);
  $stmt->execute();


}





?>
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="contentheader">
      <i class="icon-group"></i> Customers
    </div>
    <ul class="breadcrumb">
      <li><a href="index.php">Dashboard</a></li> /
      <li class="active">Customers</li>
    </ul>
    <div style="margin-top: -19px; margin-bottom: 21px;">
      <a href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
      
    </div>

    <a rel="facebox" href="addcustomer.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Customer</button></a><br><br>
    <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
      <thead>
        <tr>
          <th width="17%">Customer_id</th>
          <th width="17%">Customer_name </th>
          <th width="10%"> Address </th>
          <th width="10%"> Contact_number</th>
          <th width="23%"> Product_id</th>
          <th width="17%">Suplier_id</th>
          <th width="14%"> Action </th>
        </tr>
      </thead>
      <tbody>
        <?php
		
        $sql = "SELECT * FROM customer ORDER BY customer_id DESC LIMIT 1 ";
      
		$stmt = $db->prepare($sql);
	
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <tr class="record">
            <td>CS<?php echo $row['customer_id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td>P<?php echo $row['product_id']; ?></td>
            <td>S<?php echo $row['suplier_id']; ?></td>
            <td>
              <a title="Click To Edit Customer" rel="facebox" href="editcustomer.php?id=<?php echo $row['customer_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a>
              <a href="#" id="<?php echo $row['customer_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <div class="clearfix"></div>
  </div>
</div>
<script src="js/jquery.js"></script>
<script type="text/javascript">
  $(function() {
    $(".delbutton").click(function(){
      //Save the link in a variable called element
      var element = $(this);
      //Find the id of the link that was clicked
      var del_id = element.attr("id");
      //Built a url to send
      var info = 'id=' + del_id;
      if(confirm("Are you sure want to delete? There is NO undo!")) {
        $.ajax({
          type: "GET",
          url: "deletecustomer.php",
          data: info,
          success: function() {}
        });
        $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
      }
      return false;
    });
  });
</script>
</body>
<?php include('footer.php');?>
</html>
