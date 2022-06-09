<?php
session_start();
if(!isset($_SESSION['islogin'])){
	header('Location: index.php');
exit;
}
	require 'Libs/config.php';
	include 'Libs/header.php';

?>
<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item ">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsByMe.php" class="list-group-item active">My Jobs</a>
				<a href="<?php echo $websiteBase;?>/applicationEmployer.php" class="list-group-item">All Application</a>
  				<a href="<?php echo $websiteBase;?>/myCompanyProfile.php" class="list-group-item">My Companies</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9 minSide'>
			<div class='row'>
			<div class='well well-sm'>
				<h4 class='m0'>Change Password</h4>
			</div>
			</div>
			<div class='row'>
				<form class='well well-sm' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
		<?php
		$userID = $_SESSION['islogin'];
		$userDetails = mysqli_fetch_array(mysqli_query($dbCon,"SELECT * FROM accounts WHERE id=$userID"));
		
			if(isset($_POST['changePassSubmit'])):
				$currentPassword = $_POST['currentPassword'];
				$newPassword = $_POST['newPassword'];
				$newPasswordAgain = $_POST['newPasswordAgain'];

				if(empty($currentPassword)):
					$er = "Please Enter <b>Current Password</b>";
					$e = 1;
				elseif(empty($newPassword)):
					$er = "Please Select <b>Job Experience</b>";
					$e = 1;
				elseif(empty($newPasswordAgain)):
					$er = "Please Select <b>Job Category</b>";
					$e = 1;
				elseif($userDetails['password']!=$currentPassword):
					$er = "Current Password <b> Doesn't Match</b>";
					$e = 1;
				elseif($newPassword!=$newPasswordAgain):
					$er = "New Password <b> Doesn't Match</b>";
					$e = 1;
				else:
					$er = "Record Updated <b>Successfully</b>";
					$e = 0;
				endif;
				
				if($e==1):
					echo "<div class='alert alert-danger'>";
						echo "<p>$er</p>";
					echo "</div>";
				else:
					$tym = time();
					mysqli_query($dbCon ,"UPDATE accounts SET password='$newPassword' WHERE id=$userID");
					echo "<div class='alert alert-success'>";
						echo "<p>$er</p>";
					echo "</div>";
				endif;
			endif;
		?>
					<div class='form-group'>
						<label for='currentPassword'>Current Password:</label>
						<input type='text' name='currentPassword' id='currentPassword' class='form-control' placeholder='Enter Current Password' required>
					</div>
					<div class='row'>
						<div class='col-md-6 col-sm-6'>
							<div class='form-group'>
								<label for='newPassword'>New Password:</label>
								<input type='text' name='newPassword' id='newPassword' class='form-control' placeholder='Enter New Password' required>
							</div>
						</div>
						<div class='col-md-6 col-sm-6'>
							<div class='form-group'>
								<label for='newPasswordAgain'>New Password:</label>
								<input type='text' name='newPasswordAgain' id='newPasswordAgain' class='form-control' placeholder='Enter Again New Password' required>
							</div>
						</div>
					</div>
										
					<div class='form-group'>
						<input type='submit' value='Change Now!' name='changePassSubmit' class='btn btn-primary btn-sm'>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
	include 'Libs/footer.php';
?>