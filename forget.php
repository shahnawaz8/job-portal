<?php
session_start();
	require 'Libs/config.php';
	include 'Libs/header.php';
?>

<div class='container'>
	<div class='col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3'>
		<form name='loginForm' id='loginForm' action='<?php echo $_SERVER['PHP_SELF'];?>' class='well well-sm' method='post'>
		<?php
			if(isset($_POST['loginSubmit'])){
				$loginName = $_POST['loginName'];
				$loginPass = $_POST['loginPass'];
				
				$sql = "SELECT * FROM accounts WHERE username='$loginName' and password='$loginPass'";
				$result = mysqli_fetch_array(mysqli_query($dbCon ,$sql));

				if(empty($loginName)){
					$er = "Please Enter Your <b>Username</b>";
					$e = 1;
				}else if(empty($loginPass)){
					$er = "Please Enter Your <b>Password</b>";
					$e = 1;
				}else if(empty($result)){
					$er = "Incorrect <b>Username/Password</b>";
					$e = 1;
				}else{
					$er = "Login <b>Success</b>, Please wait....";
					$e = 0;
				}
				
				if($e==1){
					echo "<div class='alert alert-danger'>";
						echo "<p>$er</p>";
					echo "</div>";
				}else{
					$_SESSION['islogin'] = $result[0];
					if(isset($_SESSION['islogin'])){
						?>
							<script>
								window.location.assign('<?php echo $websiteBase;?>/dashboard.php');
							</script>
						<?php
					}
					echo "<div class='alert alert-success'>";
						echo "<p>$er</p>";
					echo "</div>";
				}
			}
		?>
			<div class='text-center'><img src='<?php echo $websiteBase; ?>/assets/img/lock-icon.png' alt='lock icon'></div>
			<div class='form-group'>
				<label for='loginName'>Username:</label>
				<input type='text' name='loginName' id='loginName' class='form-control' placeholder='Please Enter Your Username'>
			</div>
			<div class='form-group'>
				<label for='loginPass'>Password:</label>
				<input type='password' name='loginPass' id='loginPass' class='form-control' placeholder='Please Enter Your Password'>
			</div>
			<div class='form-group'>
				<input type='submit' name='loginSubmit' id='loginSubmit' class='btn btn-primary btn-sm' value='Login Now!'>  <input type='submit' name='forget' id='loginSubmit' class='btn btn-primary btn-sm' value='Forget Password!'>
			</div>
		</form>
	</div>
</div>

<?php 
	include 'Libs/footer.php';
?>