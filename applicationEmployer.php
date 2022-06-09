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
				<a href="<?php echo $websiteBase;?>/jobsByMe.php" class="list-group-item ">My Jobs</a>
				<a href="<?php echo $websiteBase;?>/applicationEmployer.php" class="list-group-item active">All Application</a>
  				<a href="<?php echo $websiteBase;?>/myCompanyProfile.php" class="list-group-item">My Companies</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9 minSide'>
			<div class='row'>
			<div class='well well-sm'>
				<h4 class='m0'>All Applications 
					
				</h4>
			</div>
			</div>
			<div class='row'>
				<table class='table table-bordered table-striped table-hover'>
				<thead>
					<tr>
						<th>#</th>
						<th>Job Title</th>
						<th>Apply On</th>
						<th>Trailer/Resume</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$userID = $_SESSION['islogin'];
					$i=0;
					$sSQL = mysqli_query($dbCon ,"SELECT * FROM jobs where userID='$userDetails[id]'");
					while($jobID=mysqli_fetch_array($sSQL)){
					 	
						$sec=mysqli_query($dbCon ,"SELECT * FROM jobapplications where jobID='$jobID[0]'");
						while($newVal=mysqli_fetch_array($sec)){
							
							$pop=mysqli_query($dbCon ,"SELECT * FROM jobs where id='$newVal[1]'");
							while($newData=mysqli_fetch_array($pop)){
								$i++;
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $newData[1];?></td>
						<td><?php echo  date('d M,Y h:i',$newData[2]);?></td>
						<th>
							<?php
								$p=explode('.',$newVal[4]);
								if($p[1]=="pdf"){
								?>
									<a href='assets/Talent/<?php echo $newVal[4];?>' download><input type="button" value='Download Resume'></a>
								<?php
								}else{
							?>
							<video width="320" height="100" controls>
								  <source src="assets/Talent/<?php echo $newVal[4];?>" type="video/mp4">
							</video>

							<?php
								}
							?>
						</th>
					</tr>
					<?php	
							}
						}
					}
				 	?>
			
				 
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