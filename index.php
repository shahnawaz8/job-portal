<?php
session_start();
	require 'Libs/config.php';
	include 'Libs/header.php';
?>

<div class='container'><marquee><b><i>Purchase Membership before month end 45% OFF</i></b></marquee>
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
                $qur="SELECT count(*) as count FROM jobs";
                $totaljob=mysqli_query($dbCon ,$qur);
				$totalJobs = mysqli_fetch_array($totaljob);
				?>
                <td><?php echo $totalJobs['count'];?></td>
            </tr>
            
        </table>
    </div>
    
    </div>
    <div class='col-md-9 col-sm-9'>
    	<div class='well well-sm'>
    		<h4 class='text-center mt0'>Search Jobs</h4>
        	<form action='search.php' name='jobSearch' id='jobSearch' method='get' role='form'>
        		<div class='form-group'>
        			<div class="input-group">
					<input type="text" name='q' class="form-control" placeholder="eg. php, net, java" aria-label="...">
					<div class="input-group-btn">
						<input type='hidden' name='jobExp' value='noway'>
						<input type='hidden' name='jobCat' value='noway'>
						<input type='hidden' name='jobOrder' value='ASC'>
						<input type='submit' name='searchJob' value='Search' class='btn btn-primary'>
					</div>
				</div>
        		</div>
        	</form>
        </div>
    	<div class="well well-sm well-white">
        	<h1 class='text-center mt0 font24'>Jobs By Categories</h1>
            <hr class='mt0'>
        	<div class='row'>
        	<?php
        		$jobCategories = mysqli_query($dbCon ,"select * from jobCategories ORDER BY rand() LIMIT 28");
        	$i=0;
        	while($jobByCats=mysqli_fetch_array($jobCategories)): 
        	$i++;
        	?>
        	
        	<?php if($i==1||$i==8||$i==15||$i==22): ?>
        	<div class='col-md-3 col-sm-3'>
        		<ul class='list-unstyled fa-ul'>
        	<?php endif; ?>
        			<li><a href='search.php?q=&jobCat=<?php echo $jobByCats['id']; ?>&jobExp=noway&jobOrder=ASC&searchJob=Search'><i class='fa-li fa fa-caret-right'></i><?php echo $jobByCats['name']; ?></a></li>
        	<?php if($i==7||$i==14||$i==21||$i==28): ?>
        		</ul>
        	</div>
        	<?php endif; ?>
        	<?php endwhile;
        	?>
            </div>
        </div>
        
        <h1 class='headingStrip mb0'> Latest Jobs</h1>
        <table class='table table-bordered table-hover table-striped'>
		<?php
			$query="SELECT * FROM `jobs` ORDER BY id DESC LIMIT 7";
            $latestJobs=mysqli_query($dbCon,$query);
			while($latestJob=mysqli_fetch_array($latestJobs))
            {
				echo "<tr>";
					echo "<td>";
       					echo "<span class='jobTitle'>".$latestJob['jobTitle']."</span><br>";
       					echo "<span class='jobDisc'>";
       						$words = explode(" ",$latestJob['jobDisc']);
       						echo implode(" ",array_splice($words,0,20));
       					echo "<br>";
       					echo "<a href='jobView.php?i=".$latestJob['id']."' class='btn btn-xs btn-primary'>Read More..</a>";
       					echo "</span>";
       				echo "</td>";
					?>
					<td><?php echo date('d M,Y',$latestJob['postedOn']);?></td>
				</tr>
				<?php
			}
		?>
        </table>
        
    </div>
</div>


<?php 
	include 'Libs/footer.php';
?>