<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $websiteName; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo $websiteBase;?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $websiteBase;?>/assets/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $websiteBase;?>/assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <header>
  	<div class='container'>
    		<a class='logo' href='<?php echo $websiteBase;?>/index.php'><?php echo $websiteName; ?></a>
    		
        	<?php
        	if(isset($_SESSION['islogin'])){
        		$theSQL = "SELECT * FROM accounts WHERE id=".$_SESSION['islogin']; 
        		$userDetails = mysqli_fetch_array(mysqli_query($dbCon,$theSQL));
        		?>
        		
        		<div class="dropdown pull-right">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					<?php echo $userDetails['fName']." ".$userDetails['lName'];?>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $websiteBase;?>/dashboard.php">Dashboard</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $websiteBase;?>/changePass.php">Change Password</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $websiteBase;?>/logout.php">Logout !!</a></li>
				</ul>
			</div>
        		
        		<?php
        	}else{
        	?>
        	<div class="btn-group pull-right btn-group-sm">
  			<a class='btn btn-info' href="<?php echo $websiteBase;?>/login.php">Login</a>
  			<a class='btn btn-primary' href="<?php echo $websiteBase;?>/register.php">Sign Up</a>
		</div>
		<?php
		}
		?>
    </div>
  </header>
  <nav class="navbar navbar-inverse sandeepdil">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand visible-xs" href="#">Job Portal</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo $websiteBase;?>/index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo $websiteBase;?>/search.php">Search Jobs</a></li>
        <li><a href="<?php echo $websiteBase;?>/contact-us.php">Contact Us</a></li>
        <li><a href="<?php echo $websiteBase;?>/about-us.php">About Us</a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>