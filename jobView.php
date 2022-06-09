<?php
session_start();
	require 'Libs/config.php';
	include 'Libs/header.php';

$jobID = $_GET['i'];
?>

<div class='container'>
	<div class='col-md-3 col-sm-3'>
    
    <div class="list-group">
  		<a href="search.php?q=php&jobExp=noway&jobCat=noway&jobOrder=ASC&searchJob=Search" class="list-group-item active">Php Jobs</a>
  		<a href="search.php?q=HTML&jobExp=noway&jobCat=noway&jobOrder=ASC&searchJob=Search" class="list-group-item">HTML Jobs</a>
  		<a href="search.php?q=jquery&jobExp=noway&jobCat=noway&jobOrder=ASC&searchJob=Search" class="list-group-item">jQuery Jobs</a>
  		<a href="search.php?q=css&jobExp=noway&jobCat=noway&jobOrder=ASC&searchJob=Search" class="list-group-item">CSS Jobs</a>
  		<a href="search.php?q=.net&jobExp=noway&jobCat=noway&jobOrder=ASC&searchJob=Search" class="list-group-item">.Net Jobs</a>
  		<a href="search.php?q=asp&jobExp=noway&jobCat=noway&jobOrder=ASC&searchJob=Search" class="list-group-item">ASP Jobs</a>
	</div>
    
    <div class='well well-sm well-statics'>
    	<h1>Our Statics</h1>
        <table class='table table-bordered table-hover table-striped'>
        	<tr>
            	<th>Total User</th>
				<?php
					$totalUsers = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM accounts"));
				?>
                <td><?php echo $totalUsers['count'];?></td>
            </tr>
            <tr>
            	<th>Total Employer</th>
				<?php
					$totalEyr = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM accounts WHERE accountType='employer'"));
				?>
                <td><?php echo $totalEyr['count'];?></td>
            </tr>
            <tr>
            	<th>Total Employee</th>
                <?php
					$totalEyee = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM accounts WHERE accountType='employee'"));
				?>
                <td><?php echo $totalEyee['count'];?></td>
            </tr>
            <tr>
            	<th>Jobs</th>
                <?php
					$totalJobs = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM jobs"));
				?>
                <td><?php echo $totalJobs['count'];?></td>
            </tr>
			
            
        </table>
    </div>
    
    </div>
    <div class='col-md-9 col-sm-9 minSide'>
		
	<?php
		$jobDetails = mysqli_fetch_array(mysqli_query($dbCon,"SELECT * FROM jobs WHERE id=$jobID"));
		if(empty($jobID)||empty($jobDetails)):
			echo "<div class='alert alert-danger'>";
				echo "Ooops.... Sorry, Job Not Found";
			echo "</div>";
		else:
		
		if(isset($_SESSION['islogin'])):
			$isLogin = $_SESSION['islogin'];
			
			$alreadyApplied = mysqli_fetch_array(mysqli_query($dbCon,"SELECT count(*) as count FROM jobApplications WHERE jobID=$jobID and userID=$isLogin"));
		endif;
			if(isset($_POST['act'])):
				if($_POST['act']=='Apply Now'):
					if($alreadyApplied['count']==0):
						//print_r($_FILES);
						if($_FILES['pic']['type']=="video/mp4" || $_FILES['pic']['type']=="application/pdf"){
							if(move_uploaded_file($_FILES['pic']['tmp_name'],'assets/Talent/'.$_FILES['pic']['name'])){
								$image=$_FILES['pic']['name'];
								$tim=time();
								$neID=$_POST['newID'];
								$theApplySQL = "INSERT INTO jobApplications values('','$neID','$isLogin','$tim','$image')";
								mysqli_query($dbCon,$theApplySQL);
								echo "<div class='alert alert-success'>";
									echo "<p>Successfully Applied ! Thanks</p>";
								echo "</div>";
							}
							else{
								echo "<div class='alert alert-warning'>";
								echo "<p>Applying Error ! pls try again</p>";
								echo "</div>";
							}
						}else{
							echo "<div class='alert alert-success'>";
									echo "<p>Only MP4,Pdf Type allow</p>";
								echo "</div>";
						}
					else:
						echo "<div class='alert alert-info'>";
							echo "<p>Already Applied !!!</p>";
						echo "</div>";
					endif;
				endif;
			endif;
		
			echo "<table class='table table-striped table-bordered'>";
				echo "<tr>";
					echo "<th colspan='4'><h4>".$jobDetails['jobTitle']."</h4></th>";
				echo "</tr>";
				echo "<tr>";
					echo "<th>Date</th>";
					echo "<th>Experience</th>";
					echo "<th>Category</th>";
					
					if(isset($isLogin)):
						$accountType = mysqli_fetch_array(mysqli_query($dbCon,"SELECT * FROM accounts WHERE id=$isLogin"));
						//echo "<td rowspan='2' class='text-center'><a href='jobView.php?i=".$jobDetails['id']."&act=apply' class='btn btn-sm btn-success'>Apply Now</a></td>";
						if($alreadyApplied['count']==0&&$accountType['accountType']=='employee'):
							echo "<td rowspan='2' class='text-center'>
								<form method='post' enctype='multipart/form-data'>
								<input type='hidden' name='i' value='$jobDetails[id]'>
								<input type='hidden' name='newID' value='$jobDetails[id]'>
								<input type='file' name='pic' class='btn btn-info' required><br>
								<input type='submit' name='act' class='btn btn-success' value='Apply Now'>
								</form>
							</td>";
						elseif($accountType['accountType']!='employee'):
							echo "<td rowspan='2' class='text-center'><a href='#' class='btn btn-sm btn-danger'>Job Seaker Only</a></td>";
						else:
							echo "<td rowspan='2' class='text-center'><a href='#' class='btn btn-sm btn-warning'>Already Applied</a></td>";
						endif;
					else:
						echo "<td rowspan='2' class='text-center'><a href='login.php' class='btn btn-sm btn-primary'>Login To Apply</a></td>";
					endif;
				echo "</tr>";
				echo "<tr>";
					echo "<td>".date('d M,Y',$jobDetails['postedOn'])."</td>";
						$jobExpr = mysqli_fetch_array(mysqli_query($dbCon,"SELECT * FROM  jobexperience WHERE id=".$jobDetails['jobExp']));
					echo "<td>".$jobExpr['title']."</td>";
						$jobCatr = mysqli_fetch_array(mysqli_query($dbCon,"SELECT * FROM  jobcategories WHERE id=".$jobDetails['jobCat']));
					echo "<td>".$jobCatr['name']."</td>";
					
				echo "</tr>";
			echo "</table>";
			
			echo "<div class='well well-sm'>";
				echo $jobDetails['jobDisc'];
				
				echo "<div class='mrb40'></div>";
				
				echo "<h4>Contact Info:</h4>";
				$contactCompany = mysqli_fetch_array(mysqli_query($dbCon,"SELECT * FROM companies WHERE userID=".$jobDetails['userID']));
				echo $contactCompany['name']."<br>";
				echo $contactCompany['address']."<br>";
				echo $contactCompany['contactNo']."<br>";
				echo $contactCompany['email']."<br>";
			echo "</div>";
			
		endif;
	?>
		
		
    </div>
</div>


<?php 
	include 'Libs/footer.php';
?>