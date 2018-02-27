<html>

<head>
	<title>Insert Student</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	
<body>
		<div class="w3-top">
			<div class="w3-bar w3-white w3-card" id="myNavbar">
				<a href="main.php" class="w3-bar-item w3-button w3-wide ">ETAL</a>
				<!-- Right-sided navbar links -->
				<div class="w3-right w3-hide-small">
					<a href="#about" class="w3-bar-item w3-button">ABOUT</a>
					<!--ใส่ชื่ออาจารย์นะ-->
					<a href="createclass.php" class="w3-bar-item w3-button">
						<i class="fa fa-list-alt"></i> &nbsp;CREATE CLASS</a>
					<a href="#team" class="w3-bar-item w3-button">
						<i class="	fa fa-group"></i>
						<?php
						session_start();
						echo htmlspecialchars($_SESSION['name']); ?> </a>

					<a href="index.html" class="w3-bar-item w3-button">
						<i class="	fa fa-share-square-o"></i> LOG OUT</a>

				</div>

				<!-- Hide right-floated links on small screens and replace them with a menu icon -->

				<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
					<i class="fa fa-bars"></i>
				</a>
			</div>
		</div>

		<!-- Sidebar on small screens when clicking the menu icon -->

		<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
			<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
			<a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
			<a href="createclass.php" class="w3-bar-item w3-button">
				<i class="fa fa-list-alt"></i> &nbsp;CREATE CLASS</a>
			<a href="#team" class="w3-bar-item w3-button">
				<i class="	fa fa-group"></i>
				<?php echo htmlspecialchars($_SESSION['name']); ?> </a>
			<a href="index.html" class="w3-bar-item w3-button">
				<i class="	fa fa-share-square-o"></i> LOG OUT</a>

		</nav>

	<div class="container-login100">
		<div class="w3-container w3-content w3-padding-64 wrap-login100" style="max-width:1000px">
			<!--ส่วนเพิ่มข้อมูล-->
			<form method="POST" action="stuin.php" class="w3-container">
				<h2 class="w3-wide w3-center ">Insert Student</h2>
				<br>
				<br>

				<div class="w3-row w3-padding-30" style="width:600px">

					<div class="w3-row-padding">
						<div class="w3-third">
							<input class="w3-input w3-border" type="text" placeholder="ID Student" name="id">
						</div>
						<div class="w3-third">
							<input class="w3-input w3-border" type="text" placeholder="Full Name" name="name">
						</div>
						<div class="w3-third">
							<input type="submit" value="Enter" class=" w3-button w3-black  " style="width:150px">
						</div>

					</div>



				</div>
					<br><br>
				<center>
					<h2 class="w3-wide w3-center ">Data</h2>
					<table style="width:60%">
						<tr>
							<th>ID Student</th>
							<th>Full Name</th>
							
						</tr>
						
						<tr>
							<br>
							<td>
								<?php
									include('connect_db.php');

									$sql = "SELECT code FROM student";
    								$stmt = $conn->prepare( $sql ); 
    								$stmt->execute();
    								while($data=$stmt->fetch() ){
									echo "<br>".$data ['code']."<br>";
									}

								?>

							</td>

							<td>
								<?php

									$sql = "SELECT fullname FROM student";
									$stmt = $conn->prepare( $sql ); 
									$stmt->execute();
									while($data=$stmt->fetch() ){
									echo "<br>".$data ['fullname']."<br>";
								}

								?>
							</td>

						

						</tr>
					</table>
				</center>
			</form>
		</div>
	</div>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>