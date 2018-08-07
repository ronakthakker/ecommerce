<?php
	if(!session_id()){
		session_start();
	}
	if(!isset($_SESSION['skinbae_admin_id'])){
	?>
	<script type="text/javascript">
		window.location.href="logout.php";
	</script>
	<?php
		exit();
	}
?>