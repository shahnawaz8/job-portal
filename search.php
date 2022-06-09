<?php
session_start();
	require 'Libs/config.php';
	include 'Libs/header.php';
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
					$totalUsers = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM `accounts`"));
				?>
                <td><?php echo $totalUsers['count'];?></td>
            </tr>
            <tr>
            	<th>Total Employer</th>
				<?php
					$totalEyr = mysqli_fetch_array(mysqli_query($dbCon ,"SELECT count(*) as count FROM `accounts` WHERE accountType='employer'"));
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
    <div class='col-md-9 col-sm-9'>
    	<div class='well well-sm'>
    		<h4 class='text-center mt0'>Search Jobs</h4>
        	<form action='search.php' name='jobSearch' id='jobSearch' method='get' role='form'>
        		<div class='form-group'>
        			<input type="text" name='q' value='<?php echo empty($_GET['q']) ? '' : $_GET['q']; ?>' class="form-control" placeholder="eg. php, net, java">
        		</div>
        		<div class='row'>
        			<div class='col-md-4 col-sm-4'>
        				<div class='form-group'>
						<label for='jobExp'>Experience:</label>
						<?php $jobExpSQL = "SELECT * FROM jobExperience";
						$jobExps = mysqli_query($dbCon ,$jobExpSQL); ?>
						<select name='jobExp' id='jobExp' class='form-control'>
							<option value='noway'>Any</option>
							<?php while($jobExp=mysqli_fetch_array($jobExps)): ?>
								<?php $jobExpSlct = ($_GET['jobExp']==$jobExp['id']) ? 'selected' : ''; ?>
								<option value='<?php echo $jobExp['id'];?>' $jobExpSlct><?php echo $jobExp['title']; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
        			</div>
        			<div class='col-md-4 col-sm-4'>
        				<div class='form-group'>
						<label for='jobCat'>Category:</label>
						<?php $jobCatSQL = "SELECT * FROM jobCategories";
						$jobCats = mysqli_query($dbCon ,$jobCatSQL); ?>
						
						<select name='jobCat' id='jobCat' class='form-control'>
							<option value='noway'>Any</option>
							<?php while($jobCat=mysqli_fetch_array($jobCats)): ?>
								<option value='<?php echo $jobCat['id'];?>'><?php echo $jobCat['name']; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
        			</div>
        			<div class='col-md-4 col-sm-4'>
        				<div class='form-group'>
						<label for='jobOrder'>Order:</label>
						<select name='jobOrder' id='jobOrder' class='form-control'>
							<option value='ASC'>NEW - OLD</option>
							<option value='DESC'>OLD - NEW</option>
						</select>
					</div>
        			</div>
        		</div>
        		<div class='form-group'>
				<input type='submit' name='searchJob' value='Search' class='btn btn-primary'>
        		</div>
        	</form>
        </div>
        
        <?php
       	if(isset($_GET['searchJob'])):
       		$q = $_GET['q'];
       		$jobExp = $_GET['jobExp'];
       		$jobCat = $_GET['jobCat'];
       		$jobOrder = $_GET['jobOrder'];
if(empty($q)):
	$theSeacrhSQL = "SELECT * FROM jobs";
	if($jobCat!='noway'):
       		$theSeacrhSQL .= " WHERE jobCat =".$jobCat;
       		$xxx = "AND";
       	else:
       		$xxx = "WHERE";
       	endif;
       	if($jobExp!='noway'):
       		$theSeacrhSQL .= " ".$xxx." jobExp =".$jobExp;
       	endif;
       	if($jobOrder=='ASC'||$jobOrder=='DESC'):
       		$theSeacrhSQL .= " ORDER BY id ".$jobOrder;
       	endif;
else:	
       	$theSeacrhSQL = "SELECT * FROM jobs WHERE jobDisc LIKE '%$q%'";
       		if($jobExp!='noway'):
       			$theSeacrhSQL .= " AND jobExp =".$jobExp;
       		endif;
       		if($jobCat!='noway'):
       			$theSeacrhSQL .= " AND jobCat =".$jobCat;
       		endif;
       		if($jobOrder=='ASC'||$jobOrder=='DESC'):
       			$theSeacrhSQL .= " ORDER BY id ".$jobOrder;
       		endif;
endif;
       	$searchResult = mysqli_query($dbCon ,$theSeacrhSQL);
       	
       	if($searchResult):
       		echo "<table class='table table-striped table-border table-hover'>";
       		$i=1;
       		while($theSeacrh=mysqli_fetch_array($searchResult)):
       			echo "<tr>";
       				echo "<td>$i</td>";
       				echo "<td>";
       					echo "<span class='jobTitle'>".$theSeacrh['jobTitle']."</span><br>";
       					echo "<span class='jobDisc'>";
       						$words = explode(" ",$theSeacrh['jobDisc']);
       						echo implode(" ",array_splice($words,0,20));
       					echo "<br>";
       					echo "<a href='jobView.php?i=".$theSeacrh['id']."' class='btn btn-xs btn-primary'>Read More..</a>";
       					echo "</span>";
       				echo "</td>";
       				echo "<td>".date('d M,Y h:i',$theSeacrh['postedOn'])."</td>";
       			echo "</tr>";
       			$i++;
       		endwhile;
       		echo "</table>";
       	else:
       		echo "<div class='well well-sm'>";
       			echo "<h1>Sorry, No Result Found</h1>";
       		echo "</div>";
       	endif;
       	
       	endif;
        ?>
        
    </div>
</div>


<?php 
	include 'Libs/footer.php';
?>