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
				<a href="<?php echo $websiteBase;?>/jobsByMe.php" class="list-group-item active">My Jobs</a>
  				<a href="<?php echo $websiteBase;?>/myCompanyProfile.php" class="list-group-item">My Companie</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9'>
			<div class='row'>
			<div class='well well-sm'>
				<h4 class='m0'>Post New Jobs
					<a href='<?php echo $websiteBase;?>/jobsByMe.php' class='btn btn-primary btn-xs pull-right'>Manage Jobs</a>
				</h4>
			</div>
			</div>
			<div class='row'>
				<form class='well well-sm' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
		<?php
		$userID = $_SESSION['islogin'];
			if(isset($_POST['jobPostSubmit'])){
				$jobTitle = $_POST['jobTitle'];
				$jobCat = $_POST['jobCat'];
				$jobExp = $_POST['jobExp'];
				$jobDisc = $_POST['jobDisc'];

				if(empty($jobTitle)){
					$er = "Please Enter <b>Job Title</b>";
					$e = 1;
				}else if($jobExp=='noway'){
					$er = "Please Select <b>Job Experience</b>";
					$e = 1;
				}else if($jobCat=='noway'){
					$er = "Please Select <b>Job Category</b>";
					$e = 1;
				}else if(empty($jobDisc)){
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
					$tym = time();
					mysqli_query($dbCon "INSERT INTO jobs SET userID='$userID', jobTitle='$jobTitle', jobExp='$jobExp', jobCat='$jobCat', jobDisc='$jobDisc', postedOn=$tym");
					echo "<div class='alert alert-success'>";
						echo "<p>$er</p>";
					echo "</div>";
					?>
					<script>
						window.location.assign('<?php echo $websiteBase;?>/jobsByMe.php');
					</script>
					<?php
				}
			}
		?>
					<div class='form-group'>
						<label for='jobTitle'>Title:</label>
						<input type='text' name='jobTitle' id='jobTitle' class='form-control' placeholder='Give a title to this job' required>
					</div>
					<div class='row'>
						<div class='col-md-6 col-sm-6'>
							<div class='form-group'>
								<label for='jobExp'>Experience:</label>
								<?php $jobExpSQL = "SELECT * FROM jobExperience";
								$jobExps = mysqli_query($dbCon ,$jobExpSQL); ?>
								
								<select name='jobExp' id='jobExp' class='form-control'>
									<option value='noway'>--SELECT--</option>
									<?php while($jobExp=mysqli_fetch_array($jobExps)): ?>
										<option value='<?php echo $jobExp['id'];?>'><?php echo $jobExp['title']; ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
						<div class='col-md-6 col-sm-6'>
							<div class='form-group'>
								<label for='jobCat'>Category:</label>
								<?php $jobCatSQL = "SELECT * FROM jobCategories";
								$jobCats = mysqli_query($dbCon ,$jobCatSQL); ?>
								
								<select name='jobCat' id='jobCat' class='form-control'>
									<option value='noway'>--SELECT--</option>
									<?php while($jobCat=mysqli_fetch_array($jobCats)): ?>
										<option value='<?php echo $jobCat['id'];?>'><?php echo $jobCat['name']; ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					
					<div class='form-group'>
						<label for='jobDisc'>Job Discription:</label>
						<textarea rows='7' name='jobDisc' id='jobDisc' class='form-control' placeholder='Give a title to this job' required></textarea>
					</div>
					
					<div class='form-group'>
						<input type='submit' value='Post Now!' name='jobPostSubmit' class='btn btn-primary btn-sm'>
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