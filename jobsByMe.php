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
				<h4 class='m0'>Jobs Posted By Me
					<a href='<?php echo $websiteBase;?>/postJob.php' class='btn btn-primary btn-xs pull-right'>Post New Job</a>
				</h4>
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
					$sSQL = mysqli_query($dbCon ,"SELECT * FROM jobs WHERE userID='$userID'");
					$i =0;
				while($job=mysqli_fetch_array($sSQL)):
				$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $job['jobTitle'];?></td>
						<td><?php echo date('d M,Y h:i',$job['postedOn']);?></td>
						<td class='btn-group'>
							<a class='btn btn-xs btn-primary' href='jobView.php?i=<?php echo $job['id']; ?>'><span class='glyphicon glyphicon-eye-open'></span></a>
							<a class='btn btn-xs btn-danger' href='jobDelete.php?i=<?php echo $job['id']; ?>&back=jobsByMe'><span class='glyphicon glyphicon-trash'></span></a>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
				</table>
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