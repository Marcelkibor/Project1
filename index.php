<?php 
	
	require_once('dbconnect.php');
	
	$sql = "select * from role";
	$roles = GetData($sql);

	if(isset($_POST['submit_reg'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];


		$sql = "INSERT INTO `user`(`uid`, `email`, `password`, `role_id`, `isactive`) VALUES (null,'$email','$password','$role',0)";

		InsertData($sql);

	}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Form to Enter Data</title>
</head>
<body>

	<h3>Registration Form</h3>
	<form action="index.php" method="post">
		<label for="email">EMAIL</label>
		<input type="email" name="email" required="true" placeholder="example@gmail.com">

		<br/>
		<br/>
		<label for="password">Password</label>
		<input type="password" name="password" required="true" placeholder="***********">
		<br/>
		<br/>
		<select name="role">
			<option id="0">Select Role</option>
			<?php 
				for($i=0;$i<count($roles);$i++){
					$rid = $roles[$i]['rid'];
					$name = $roles[$i]['role_name'];
					echo "<option id=\"$rid\">$name</option>";
				}
			?>
		</select>
		<input type="submit" name="submit_reg" value="Register">
		<input type="reset" value="Clear">

	</form>
</body>
</html>