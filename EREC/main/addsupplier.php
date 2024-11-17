<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<script>
      function displayPopup() {
    alert("New supplier has been added!");
    // Delay the form reset by 1 second (1000 milliseconds)
    setTimeout(function() {
        document.getElementById("suplierForm").reset();
    }, 1000);
}

    </script>


<form id="suplierForm" action="savesupplier.php" method="post" onsubmit="displayPopup()">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4></center>
<hr>
<div id="ac">
<span>Supplier Name : </span><input type="text" style="width:265px; height:30px;" name="name" required/><br>
<span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" /><br>
<span>Contact No : </span><input type="text" style="width:265px; height:30px;" name="contact" /><br>
<span>Contact Person : </span><input type="text" style="width:265px; height:30px;" name="cperson" /><br>
<span>Note : </span><textarea style="width:265px; height:80px;" name="note" /></textarea><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>