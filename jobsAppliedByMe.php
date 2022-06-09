<?php
	require 'Libs/config.php';
session_start();
if(!isset($_SESSION['islogin'])){
	header('Location: index.php');
exit;
}

	include 'Libs/header.php';

if($userDetails['accountType']=='employee'):?>

<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item ">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsAppliedByMe.php" class="list-group-item active">My Applied Jobs</a>
  				<a href="<?php echo $websiteBase;?>/myProfile.php" class="list-group-item">My Resume</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9 minSide'>
			<div class='row'>
			<div class='well well-sm'>
				<h4 class='m0'>Jobs Applied By Me</h4>
			</div>
			</div>
			<div class='row'>
				<table class='table table-bordered table-striped table-hover'>
				<thead>
					<tr>
						<th>#</th>
						<th>Job Title</th>
						<th>Posted On</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$userID = $_SESSION['islogin'];
					$sSQL = mysqli_query($dbCon ,"SELECT * FROM jobApplications WHERE userID='$userID'");
					$i =0;
				while($jobzzz=mysqli_fetch_array($sSQL)):
				$i++;
				$job = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT * FROM jobs WHERE id=".$jobzzz['jobID']));
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $job['jobTitle'];?></td>
						<td><?php echo date('d M,Y h:i',$jobzzz['applyOn']);?></td>
						<td class='btn-group'>
							<a class='btn btn-xs btn-primary' href='jobView.php?i=<?php echo $jobzzz['jobID']; ?>'><span class='glyphicon glyphicon-eye-open'></span></a>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php else: 
	header("Location: dashboard.php");
endif;
	include 'Libs/footer.php';
?>