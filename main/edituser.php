<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM user WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveedituser.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit User</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" value="<?php echo $row['username']; ?>" /><br>
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['name']; ?>" /><br>
<span>Email : </span><input type="text" style="width:265px; height:30px;" name="email" value="<?php echo $row['email']; ?>" /><br>
<span>Password : </span><input type="password" style="width:265px; height:30px;" name="password" value="<?php echo $row['password']; ?>" /><br>
<span>Profession: </span><input type="text" style="width:265px; height:30px;" name="profession" value="<?php echo $row['profession']; ?>" /><br>



<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>