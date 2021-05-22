<?php 
	include_once 'header.php';
?>

		<div class="content">
			<div class="textBox">
				<?php 
			      	if (isset($_SESSION['userid'])) {
			      		include_once 'user.php';      		
			      	}
			      	else{
			      		include_once 'guest.php';
			      	}
			    ?>				
			</div>
		</div>

		<ul class="sci">
			<li><a href="#" style="--i:11;"><img src="img/facebook.png"></a></li>
			<li><a href="#" style="--i:12;"><img src="img/twitter.png"></a></li>
			<li><a href="#" style="--i:13;"><img src="img/instagram.png"></a></li>
		</ul>

<?php 
	include_once 'footer.php';
?>