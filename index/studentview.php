<?php 
include_once('connect_db.php');



?>

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
	<div class="container-login100">
		<div class="w3-container w3-content w3-padding-64 wrap-login100" style="max-width:1000px">
			<!--ส่วนเพิ่มข้อมูล-->
			<form metod="GET" action="studentview.php" class="w3-container">
				<h2 class="w3-wide w3-center ">Student View</h2>
				<br>
				<br>

				<div class="w3-row w3-padding-30 w3-center" style="width:600px">


					<div class="w3-row-padding">
						<div class="w3-half">

							<input class="w3-input w3-border" type="text" placeholder="ID Student"style="width:350px"name="IDStudent">
						</div>
						<div class="w3-half">

							<input type="submit" value="Enter" class=" w3-button w3-black  " style="width:150px">
						</div>
					</div>


                </div>
                <br>
                <br>
                <?php 
                if(!empty($_GET['IDStudent']))
                {
                    $idstu = $_GET['IDStudent'];
                    $sql = "SELECT * FROM subjects su,student st ,student_has_subjects ss WHERE( ss.student_idstudent= st.idstudent AND ss.subjects_idsubjects = su.idsubjects)AND
                    st.code = '$idstu'";
                    $stmt =$conn->prepare($sql);
                    $stmt->execute();
                    
                foreach($stmt->fetchall() as $key => $value){
                    $name = $value['name'];
                    $location = $value['location'];
                    echo $key," ",$name," ",$location,"<hr>";
                }
                    
                }
                ?>

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