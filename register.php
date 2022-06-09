<?php
	require 'Libs/config.php';
	include 'Libs/header.php';
?>

<div class='container'>
	<div class='col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3'>
		<form name='registerForm' id='registerForm' action='<?php echo $_SERVER['PHP_SELF'];?>' class='well well-sm' method='post'>
		
		<?php
			if(isset($_POST['registerSubmit'])){
				$fName = $_POST['fName'];
				$lName = $_POST['lName'];
				$email = $_POST['email'];
				$mob = $_POST['mob'];
				$accountType = $_POST['accountType'];
				
				if(empty($fName)){
					$er = "Please Enter Your <b>First Name</b>";
					$e = 1;
				}else if(empty($lName)){
					$er = "Please Enter Your <b>Last Name</b>";
					$e = 1;
				}else if(empty($email)){
					$er = "Please Enter Your <b>Email Address</b>";
					$e = 1;
				}else if(!empty($mob)&&strlen($mob)!=10){
					$er = "Please Enter Valid <b>Moile No</b>";
					$e = 1;
				}else{
					$er = "Registration <b>Successful,</b> Please Login Now";
					$e = 0;
				}
				
				if($e==1){
					echo "<div class='alert alert-danger'>";
						echo "<p>$er</p>";
					echo "</div>";
				}else{
					$username = $fName.rand(222,39999);
					$pass = rand(3333,9999);
					$sql = "INSERT INTO accounts SET username='$username', password='$pass', fName='$fName', lName='$lName', email='$email', phoneNo='$mob', accountType='$accountType'";
					if(mysqli_query($dbCon ,$sql)){
						echo "<div class='alert alert-success'>";
							echo "<p>$er</p>";
							echo "<p>Username: <b>$username</b><br>Password: <b>$pass</b></p>";
						echo "</div>";
					}else{
						echo "<div class='alert alert-danger'>";
							echo "<p>Something Is Wrong Here, Notable to Create Record In Database</p>";
						echo "</div>";
					}
				}
			}
		?>
		
		
			<div class='row'>
				<div class='col-md-6 col-sm-6'>
					<div class='form-group'>
						<label for='fName'>First Name:</label>
						<input type='text' name='fName' id='fName' class='form-control' placeholder='Please Enter Your First Name' required>
					</div>
				</div>
				<div class='col-md-6 col-sm-6'>
					<div class='form-group'>
						<label for='lName'>Last Name:</label>
						<input type='text' name='lName' id='lName' class='form-control' placeholder='Please Enter Your Last Name' required>
					</div>
				</div>
			</div>
			<div class='form-group'>
				<label for='email'>Email:</label>
				<input type='email' name='email' id='email' class='form-control' placeholder='Please Enter Your Email' required>
			</div>
			<div class='form-group'>
				<label for='mob'>Moile No:</label>
				<input type='number' name='mob' id='mob' class='form-control' placeholder='Please Enter Your Email'>
			</div>
			<div class='row'>
				<div class='col-md-6 col-sm-6'>
					<div class='form-group'>
						<label>
							<input type='radio' value='employee' name='accountType' id='accountType' required> Job Seaker
						</label>
					</div>
				</div>
				<div class='col-md-6 col-sm-6'>
					<div class='form-group'>
						<label>
							<input type='radio' value='employer' name='accountType' id='accountType'> Job Poster
						</label>
					</div>
				</div>
			</div>
			<div class='form-group'>
				<input type='submit' name='registerSubmit' id='registerSubmit' class='btn btn-primary btn-sm' value='Register Now!'>
			</div>
		</form>
	</div>
</div>

<?php 
	include 'Libs/footer.php';
?>