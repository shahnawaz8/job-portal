<?php
session_start();
if(!isset($_SESSION['islogin'])){
	header('Location: index.php');
exit;
}
	require 'Libs/config.php';
	include 'Libs/header.php';

if($userDetails['accountType']=='employer'):?>

<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
				
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item ">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsByMe.php" class="list-group-item ">My Jobs</a>
				<a href="<?php echo $websiteBase;?>/applicationEmployer.php" class="list-group-item ">All Application</a>
  				<a href="<?php echo $websiteBase;?>/myCompanyProfile.php" class="list-group-item active">My Companies</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9'>
			<div class='row'>
			<div class='well well-sm'>
				<h4 class='m0'>Update Company Info</h4>
			</div>
			</div>
			<div class='row'>
				<form class='well well-sm' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
		<?php
		$userID = $_SESSION['islogin'];
			if(isset($_POST['companySubmit'])){
				$companyName = $_POST['companyName'];
				$companyEmail = $_POST['companyEmail'];
				$companyMob = $_POST['companyMob'];
				$companyAddress = $_POST['companyAddress'];
				$companyDisc = $_POST['companyDisc'];

				if(empty($companyName)){
					$er = "Please Enter Your <b>Company Name</b>";
					$e = 1;
				}else if(empty($companyEmail)){
					$er = "Please Enter Your <b>Email</b>";
					$e = 1;
				}else if(empty($companyMob)){
					$er = "Please Enter <b>Contact No</b>";
					$e = 1;
				}else if(empty($companyAddress)){
					$er = "Please Enter <b>Company Address</b>";
					$e = 1;
				}else if(empty($companyDisc)){
					$er = "Please Enter <b>Company Discription</b>";
					$e = 1;
				}else{
					$er = "Record Updated <b>Successfully</b>";
					$e = 0;
				}
				
				if($e==1){
					echo "<div class='alert alert-danger'>";
						echo "<p>$er</p>";
					echo "</div>";
				}else{
					$haveCompanyRecord = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) FROM companies WHERE userID='$userID'"));
					if($haveCompanyRecord[0]==0){
						mysqli_query("INSERT INTO companies SET userID='$userID', name='$companyName', email='$companyEmail', contactNo='$companyMob', address='$companyAddress', info='$companyDisc'");
					}else{
						mysqli_query("UPDATE `companies` SET name='$companyName', email='$companyEmail', contactNo='$companyMob', address='$companyAddress', info='$companyDisc' WHERE userID='$userID'");
					}
					echo "<div class='alert alert-success'>";
						echo "<p>$er</p>";
					echo "</div>";
				}
			}
			$companyDetails = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT * FROM companies WHERE userID='$userID'"));
		?>
					<div class='row'>
						<div class='col-md-4 col-sm-4'>
							<div class='form-group'>
								<label for='companyName'>Company Name:</label>
								<input type='text' value='<?php echo $companyDetails['name'];?>' name='companyName' id='companyName' placeholder='Enter Company Name' class='form-control' required>
							</div>
						</div>
						<div class='col-md-4 col-sm-4'>
							<div class='form-group'>
								<label for='companyEmail'>Email:</label>
								<input type='email' value='<?php echo $companyDetails['email'];?>' name='companyEmail' id='companyEmail' placeholder='Enter Company Contact Email' class='form-control' required>
							</div>
						</div>
						<div class='col-md-4 col-sm-4'>
							<div class='form-group'>
								<label for='companyMob'>Contact No:</label>
								<input type='number' value='<?php echo $companyDetails['contactNo'];?>' name='companyMob' id='companyMob' placeholder='Enter Company Contact No' class='form-control' required>
							</div>
						</div>
					</div>
					
					<div class='row'>
						<div class='col-md-6 col-sm-6'>
							<div class='form-group'>
								<label for='companyAddress'>Company Address:</label>
								<textarea rows='7' name='companyAddress' id='companyAddress' class='form-control' placeholder='Address your company' required><?php echo $companyDetails['address'];?></textarea>
							</div>
						</div>
						<div class='col-md-6 col-sm-6'>
							<div class='form-group'>
								<label for='companyDisc'>Company Discription:</label>
								<textarea rows='7' name='companyDisc' id='companyDisc' class='form-control' placeholder='Discribe your company' required><?php echo $companyDetails['info'];?></textarea>
							</div>
						</div>
					</div>
					
					
					<div class='form-group'>
						<input type='submit' value='Update Now!' name='companySubmit' class='btn btn-primary btn-sm'>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php else: ?>


<?php	
	header("Location: dashboard.php");
endif;
	include 'Libs/footer.php';
?>