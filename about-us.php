<?php
session_start();
	require 'Libs/config.php';
	include 'Libs/header.php';
?>

<div class='container'>
	<div class='col-md-9 col-sm-9'>
		<h3>About Us</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique convallis nulla, at egestas arcu malesuada eget. Donec laoreet mauris lorem, nec placerat felis viverra ac. Quisque venenatis nulla dolor, sed lobortis ante ultricies sit amet. Nunc aliquam luctus turpis non lacinia. Vestibulum sed tempus felis. Vestibulum fermentum viverra neque, quis scelerisque est porttitor in. Mauris eu justo vitae velit finibus malesuada eget consequat tellus. Morbi facilisis, sem ut mattis ullamcorper, arcu nisi fringilla tortor, at ultricies dolor diam non libero. Curabitur euismod tortor in lectus imperdiet laoreet. Morbi quis nunc vitae tortor posuere vehicula in nec leo. </p>
		<p>Vivamus id est porttitor, hendrerit felis nec, facilisis mi. Proin fringilla augue ac mauris convallis, ut tempus ipsum maximus. Donec placerat velit et magna sagittis dictum ut et arcu. Maecenas sit amet nibh malesuada, consectetur massa at, tempor tortor. Curabitur pellentesque augue at dignissim faucibus. Nam nisl arcu, tincidunt eu odio lacinia, accumsan tristique metus. Vivamus semper nisl eget turpis euismod, vel dapibus odio consequat. Nulla ultricies placerat volutpat. Vivamus in malesuada turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
		<p>Maecenas pellentesque venenatis est ut sodales. Aenean nec nisi ac mi mollis laoreet. Donec eu neque turpis. Integer ac ornare odio. Donec varius augue et lacus gravida dictum. Etiam sit amet tincidunt sapien. Praesent varius diam et venenatis auctor. Suspendisse porttitor magna non massa vulputate eleifend. Maecenas pellentesque lacus nisi, sit amet interdum nulla eleifend eleifend. Cras ornare felis tellus, ut viverra leo posuere et. Curabitur ac efficitur nisl. Duis aliquet ligula vitae elit pulvinar convallis. Aliquam vel euismod tellus, nec bibendum nisl. Duis lacinia tellus eu orci bibendum accumsan. </p>
	</div>
	<div class='col-md-3 col-sm-3'>
		<h3>Our Team</h3>
		<div class='well well-sm text-center'>
			<img src='assets/img/no-profile-img.gif' alt='img' class='img-circle' width='100px'>
			<h4>Team Member</h4>
			<h5>Project Role: Designer</h5>
		</div>
		<div class='well well-sm text-center'>
			<img src='assets/img/no-profile-img.gif' alt='img' class='img-circle' width='100px'>
			<h4>Team Member</h4>
			<h5>Project Role: Designer & Developer</h5>
		</div>
		<div class='well well-sm text-center'>
			<img src='assets/img/no-profile-img.gif' alt='img' class='img-circle' width='100px'>
			<h4>Team Member</h4>
			<h5>Project Role: Developer</h5>
		</div>
	</div>
</div>

<?php 
	include 'Libs/footer.php';
?>