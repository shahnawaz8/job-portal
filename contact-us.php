<?php
session_start();
	require 'Libs/config.php';
	include 'Libs/header.php';
?>

<div class='container'>
	<div class='col-md-8 col-sm-8'>
	<?php
	if(isset($contactSubmit)):
		$name = $_POST['name'];
		$mob = $_POST['mob'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		
		$errorMessage = "";
		$errorFlag = 1;
		
		if(empty($name)):
			$errorMessage = "Please Enter Your Name";
			$errorFlag = 1;
		elseif(empty($mob)||is_int($mob)||strlen($mob)!=10):
			$errorMessage = "Please Enter A Valid Mobile No";
			$errorFlag = 1;
		elseif(empty($email)||!filter_var($email,FILTER_VALIDATE_EMAIL)):
			$errorMessage = "Please Enter A Valid Email Address";
			$errorFlag = 1;
		elseif(empty($message)||strlen($message)<10):
			$errorMessage = "Please Enter Message and Should be of minimum 10 words";
			$errorFlag = 1;
		else:
			$errorMessage = "Mail Successfully Send";
			$errorFlag = 0;
		endif;
		
		if($errorFlag==1):
			echo "<div class='alert alert-danger'>";
				echo $errorMessage;
			echo "</div>";
		else:
			echo "<div class='alert alert-success'>";
				echo $errorMessage;
			echo "</div>";
		endif;
	endif;
	?>
	
		<form action='<?php echo $_SERVER['PHP_SELF'];?>' method='post' name='contactUs' id='contactUs' class='well well-sm'>
			<div class='row'>
				<div class='col-md-6 col-sm-6'>
					<div class='form-group'>
						<label for='name'>You Name:</label>
						<input type='text' name='name' id='name' class='form-control' placeholder='Please Enter Your Name' required>
					</div>
				</div>
				<div class='col-md-6 col-sm-6'>
					<div class='form-group'>
						<label for='mob'>Mobile No:</label>
						<input type='number' name='mob' id='mob' class='form-control' placeholder='Please Enter Your Mobile No'>
					</div>
				</div>
			</div>
			<div class='form-group'>
				<label for='email'>Email:</label>
				<input type='email' name='email' id='email' class='form-control' placeholder='Please Enter Your Email' required>
			</div>
			<div class='form-group'>
				<label for='message'>Message:</label>
				<textarea name='message' rows='7' id='message' class='form-control' placeholder='Please Enter Your Email' required></textarea>
			</div>
			<div class='form-group'>
				<input type='submit' name='contactSubmit' id='contactSubmit' value='Send Enquiry' class='btn btn-primary btn-sm'>
			</div>
		</form>
	</div>
	<div class='col-md-4 col-sm-4'>
	
	<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q
&amp;source=s_q
&amp;hl=en
&amp;geocode=
&amp;abauth=523c47c1mykXIlzZj8OqgayUcQI-a_Lnm6Y
&amp;authuser=0
&amp;q=Uttam nagar, delhi,+India
&amp;aq=
&amp;vps=3
&amp;jsv=465b
&amp;sll=28.879496,76.58711
&amp;sspn=0.010203,0.021136
&amp;vpsrc=0
&amp;t=h
&amp;num=10
&amp;abstate=A:actbar-saveto
&amp;output=embed">
</iframe>
	
	</div>
</div>

<?php 
	include 'Libs/footer.php';
?>