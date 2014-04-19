<html xml:lang="en">
	<head>
		<title>the BIG films</title>
	    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="assets/js/jquery-1.5.2.min.js"></script>
	</head>
	<body>
		<div id="outer">
		<div id="container">
		<div id="inner">
			<?php
				if($_GET['page'] == 'contact'){
					include_once('contact.php');
				}
				else{
					include_once('content.php');
				}
			?>
		</div>
		</div>
		</div>
	</body>
</html>