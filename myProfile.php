<?php
session_start();
if(!isset($_SESSION['islogin'])){
	header('Location: index.php');
exit;
}
	require 'Libs/config.php';
	include 'Libs/header.php';

if($userDetails['accountType']=='employee'):?>

<div class='container'>
	<div class='row'>
		<div class='col-md-2 col-sm-3'>
			<div class="list-group">
				<a href="<?php echo $websiteBase;?>/dashboard.php" class="list-group-item ">Dashboard</a>
				<a href="<?php echo $websiteBase;?>/jobsAppliedByMe.php" class="list-group-item">My Applied Jobs</a>
  				<a href="<?php echo $websiteBase;?>/myProfile.php" class="list-group-item active">My Resume</a>
  				<a href="<?php echo $websiteBase;?>/changePass.php" class="list-group-item">Change Password</a>
			</div>
		</div>
		<div class='col-md-10 col-sm-9'>
			<div class='row'>
			<div class='well well-sm'>
				<h4 class='m0'>My Resume Info</h4>
			</div>
			</div>
			<div class='row'>
				<div class='well well-sm'>
					<div class='row'>
				<?php
					$userID = $_SESSION['islogin'];
					$userDetails = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT * FROM accounts WHERE id='$userID'"));
					
					if(isset($_GET['act'])):
						$act = $_GET['act'];
						$idx = $_GET['i'];
						if($act=='skilldelete'):
							mysqli_query($dbCon ,"DELETE FROM skills WHERE id='".$idx."'");
							?>
								<script>
									window.location.assign('myProfile.php');
								</script>
							<?php
						elseif($act=='qdelete'):
							mysqli_query($dbCon ,"DELETE FROM qualifications WHERE id='".$idx."'");
							?>
								<script>
									window.location.assign('myProfile.php');
								</script>
							<?php
						else:
						
						endif;
					endif;
					
					
					echo "<div class='col-md-6 col-sm-6'>";
						echo "<dl class='dl-horizontal'>";
							echo "<dt>User name:</dt>";
							echo "<dd>".$userDetails['username']."</dd>";
							echo "<dt>First Name:</dt>";
							echo "<dd>".$userDetails['fName']."</dd>";
							echo "<dt>Last Name:</dt>";
							echo "<dd>".$userDetails['lName']."</dd>";
							
						echo "</dl>";
					echo "</div>";
					echo "<div class='col-md-6 col-sm-6'>";
						echo "<dl class='dl-horizontal'>";
							echo "<dt>Account Type:</dt>";
							echo "<dd>".$userDetails['accountType']."</dd>";
							echo "<dt>Email:</dt>";
							echo "<dd>".$userDetails['email']."</dd>";
							echo "<dt>Phone:</dt>";
							echo "<dd>".$userDetails['phoneNo']."</dd>";
							 
						echo "</dl>";
					echo "</div>";
				?>
					</div>
					<hr>
					<div class='row'>
					<div class='col-md-12'>
					
					<?php
						if(isset($_POST['addSkillForm'])):
							$skillSQL = "INSERT INTO skills SET skillName='".$_POST['skillName']."', userID=".$userID;
							mysqli_query($dbCon ,$skillSQL);
							echo "<div class='alert alert-success'>";
								echo "<p>Skill Successfully Added !!!!</p>";
							echo "</div>";
						endif;
					?>
					
						<h4>My Skills
							<form action='' method='post' class='pull-right form-inline'>
								<input type='text' name='skillName' id='skillName' class='form-control input-sm' placeholder='Enter Skill Name' required>
								<input type='submit' name='addSkillForm' value='Add Skill' class='btn btn-sm btn-primary'>
							</form>
						</h4>
						<table class='table'>
							<tr>
								<th>#</th>
								<th>Skill Name</th>
								<th>Action</th>
							</tr>
							<?php
								$mySkills = mysqli_query($dbCon ,"SELECT * FROM skills WHERE userID=".$userID);
								$i = 0;
							while($mySkill=mysqli_fetch_array($mySkills)):
							$i++;
							?>
							<tr>
								<td><?=$i;?></td>
								<td><?=$mySkill['skillName'];?></td>
								<td><a href='myProfile.php?i=<?=$mySkill['id'];?>&act=skilldelete' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a></td>
							</tr>
							<?php
							endwhile;
							?>
						</table>
					</div>
				</div>
				
					<hr>
					<div class='row'>
					<div class='col-md-12'>
					
					<?php
						if(isset($_POST['addQualifForm'])):
							$skillSQL = "INSERT INTO qualifications SET courseName='".$_POST['courseName']."', univName='".$_POST['univName']."', qYear='".$_POST['qYear']."', userID=".$userID;
							mysqli_query($dbCon ,$skillSQL);
							echo "<div class='alert alert-success'>";
								echo "<p>Qualification Successfully Added !!!!</p>";
							echo "</div>";
						endif;
					?>
					
						<h4>My Qualification
							<form action='' method='post' class='pull-right form-inline'>
								<input type='text' name='courseName' id='courseName' class='form-control input-sm' placeholder='Enter Course' required>
								<input type='text' name='univName' id='univName' class='form-control input-sm' placeholder='Enter Univ' required>
								<input type='text' name='qYear' id='qYear' class='form-control input-sm' placeholder='Enter Year' required>
								<input type='submit' name='addQualifForm' value='Add Qualification' class='btn btn-sm btn-primary'>
							</form>
						</h4>
						<table class='table'>
							<tr>
								<th>#</th>
								<th>Course</th>
								<th>Year</th>
								<th>Univ.</th>
								<th>Action</th>
							</tr>
							<?php
								$qualifications = mysqli_query($dbCon ,"SELECT * FROM qualifications WHERE userID=".$userID);
								$i = 0;
							while($qualification=mysqli_fetch_array($qualifications)):
							$i++;
							?>
							<tr>
								<td><?=$i;?></td>
								<td><?=$qualification['courseName'];?></td>
								<td><?=$qualification['qYear'];?></td>
								<td><?=$qualification['univName'];?></td>
								<td><a href='myProfile.php?i=<?=$qualification['id'];?>&act=qdelete' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a></td>
							</tr>
							<?php
							endwhile;
							?>
						</table>
						
						<div class='text-center'>
							<button class='btn btn-sm btn-primary'>Upload Resume</a>
						</div>
					</div>
				</div>
				</div>
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