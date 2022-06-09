<?php
	require 'Libs/config.php';
session_start();
if(!isset($_SESSION['islogin'])){
	header('Location: index.php');
exit;
}

	include 'Libs/header.php';

if($userDetails['accountType']=='admin'):?>

<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
			<?php
				$activ = "active";
				$activ1 = "";
				$activ2 = "";
				if(isset($_GET['filter'])):
					$filter = $_GET['filter'];
					if($filter=='employee'):
						$activ2 = "active";
						$activ = "";
					elseif($filter=='employer'):
						$activ1 = "active";
						$activ = "";
					else:
						$activ = "active";
					endif;
				endif;
				
				
				if(isset($_GET['act'])):
					$act = $_GET['act'];
					$useri = $_GET['i'];
					
					if($act=='delete'):
						mysqli_query($dbCon ,"DELETE FROM accounts WHERE id=".$useri);
					endif;
					
				endif;
			?>
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item ">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsAll.php" class="list-group-item">All Jobs</a>
  				<a href="<?php echo $websiteBase;?>/applicationsAll.php" class="list-group-item">All Application</a>
  				<a href="<?php echo $websiteBase;?>/users.php" class="list-group-item <?=$activ;?>">All Users</a>
  				<a href="<?php echo $websiteBase;?>/users.php?filter=employer" class="list-group-item <?=$activ1;?>">Employer Users</a>
  				<a href="<?php echo $websiteBase;?>/users.php?filter=employee" class="list-group-item <?=$activ2;?>">Job Seekers Users</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9 minSide'>
			<div class='row'>
			<div class='well well-sm'>
				<h4 class='m0'>All Users
					
				</h4>
			</div>
			</div>
			<div class='row'>
				<table class='table table-bordered table-striped table-hover'>
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$userID = $_SESSION['islogin'];
				if(isset($_GET['filter'])):
					$filter = $_GET['filter'];
					$sSQL = mysqli_query($dbCon ,"SELECT * FROM accounts WHERE accountType='".$filter."'");
				else:
					$sSQL = mysqli_query($dbCon ,"SELECT * FROM accounts");
				endif;
					$i =0;
				while($job=mysqli_fetch_array($sSQL)):
				$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $job['fName'];?> <?php echo $job['lName'];?></td>
						<td><?php echo $job['email'];?></td>
						<td><?php echo $job['accountType'];?></td>
						<td class='btn-group'>
							<a class='btn btn-xs btn-danger' href='users.php?i=<?php echo $job['id']; ?>&act=delete'><span class='glyphicon glyphicon-trash'></span></a>
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