<?php
	require 'Libs/config.php';
session_start();
if(!isset($_SESSION['islogin'])){
	header('Location: index.php');
exit;
}

	include 'Libs/header.php';

if($userDetails['accountType']=='employer'):?>

<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item active">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsByMe.php" class="list-group-item ">My Jobs</a>
				<a href="<?php echo $websiteBase;?>/applicationEmployer.php" class="list-group-item">All Application</a>
  				<a href="<?php echo $websiteBase;?>/myCompanyProfile.php" class="list-group-item">My Companies</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9 minSide'>
			<div class='well well-sm'>
				<h4 class='m0'>Employer Job Posting Dashboard</h4>
			</div>
			<div class='row'>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Job Posted</h5>
						<hr class='mt0'>
						<?php
						$totalJobs = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobs"));
						?>
						<h1 class='text-center mb0'><?=$totalJobs['count'];?></h5>
					</div>
				</div>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Job By Me</h5>
						<hr class='mt0'>
						<?php
						$totalJobsByMe = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobs WHERE userID=".$_SESSION['islogin']));
						?>
						<h1 class='text-center mb0'><?=$totalJobsByMe['count'];?></h5>
					</div>
				</div>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Job Seakers</h5>
						<hr class='mt0'>
						<?php
						$totalJobsSeakrs = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM accounts WHERE accountType='employee'"));
						?>
						<h1 class='text-center mb0'><?=$totalJobsSeakrs['count'];?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php elseif($userDetails['accountType']=='employee'): ?>

<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item active">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsAppliedByMe.php" class="list-group-item">My Applied Jobs</a>
  				<a href="<?php echo $websiteBase;?>/myProfile.php" class="list-group-item">My Resume</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9 minSide'>
			<div class='well well-sm'>
				<h4 class='m0'>Job Seaker Dashboard</h4>
			</div>
			<div class='row'>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Job Posted</h5>
						<hr class='mt0'>
						<?php
						$totalJobs = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobs"));
						?>
						<h1 class='text-center mb0'><?=$totalJobs['count'];?></h5>
					</div>
				</div>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Application</h5>
						<hr class='mt0'>
						<?php
						$totalJobsApplication = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobApplications"));
						?>
						<h1 class='text-center mb0'><?=$totalJobsApplication['count'];?></h5>
					</div>
				</div>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Applied By Me</h5>
						<hr class='mt0'>
						<?php
						$totalJobsApplied = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobApplications WHERE userID=".$_SESSION['islogin']));
						?>
						<h1 class='text-center mb0'><?=$totalJobsApplied['count'];?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php elseif($userDetails['accountType']=='admin'): ?>
<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item active">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsAll.php" class="list-group-item">All Jobs</a>
  				<a href="<?php echo $websiteBase;?>/applicationsAll.php" class="list-group-item">All Application</a>
  				<a href="<?php echo $websiteBase;?>/users.php" class="list-group-item">All Users</a>
  				<a href="<?php echo $websiteBase;?>/users.php?filter=employer" class="list-group-item">Employer Users</a>
  				<a href="<?php echo $websiteBase;?>/users.php?filter=employee" class="list-group-item">Job Seekers Users</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9 minSide'>
			<div class='well well-sm'>
				<h4 class='m0'>Admin Dashboard</h4>
			</div>
			<div class='row'>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Job Posted</h5>
						<hr class='mt0'>
						<?php
						$totalJobs = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobs"));
						?>
						<h1 class='text-center mb0'><?=$totalJobs['count'];?></h5>
					</div>
				</div>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Application</h5>
						<hr class='mt0'>
						<?php
						$totalJobsApplication = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobApplications"));
						?>
						<h1 class='text-center mb0'><?=$totalJobsApplication['count'];?></h5>
					</div>
				</div>
				<div class='col-md-4 col-sm-4'>
					<div class='well well-sm well-white'>
						<h5 class='m0'>Total Applied By Me</h5>
						<hr class='mt0'>
						<?php
						$totalJobsApplied = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobApplications WHERE userID=".$_SESSION['islogin']));
						?>
						<h1 class='text-center mb0'><?=$totalJobsApplied['count'];?></h5>
					</div>
				</div>
			</div>
			
			<div class='row text-center'>
				<img src='assets/img/Admin-icon.png'>
			</div>
			
		</div>
	</div>
</div>
<?php else: ?>


<?php	
endif;
	include 'Libs/footer.php';
?>