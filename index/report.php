<?php include_once("connect_db.php");
?>


<!DOCTYPE HTML>
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
<script>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	title: {
		text: "Check data"
	},
	animationEnabled: true,
	exportEnabled: true,
	data: [
	{
		type: "spline", //change it to line, area, column, pie, etc
		dataPoints: [
			<?php 
			$id = $_GET['idclass'];
			$sql = "SELECT COUNT(attendance.time), substr(attendance.time,12,4) as gp, substr(class.date,12,4) as st FROM attendance,class  WHERE (attendance.class_idclass=class.idclass) and attendance.class_idclass=$id GROUP by gp" ;
			$stmt = $conn->prepare( $sql ); 
			$stmt->execute();
			while($data=$stmt->fetch() )
			{
			$y = $data['COUNT(attendance.time)'];
			$timecheck = $data['gp'];
			$timestart = $data['st'];
			
			$dotch = str_replace(':','.',$timecheck);
			$dotst = str_replace(':','.',$timestart);
			$x = $dotch - $dotst;
			echo "// ".$dotch."-".$dotst ."
			";
			if($x < 0){
				$x = $x + 0.4;
			}
			echo "{x: $x, y: $y},";
			}
			echo "// ".$dotch."-".$dotst ."
			";
	?>

		]
	}
	]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
</head>
<body>
	
<div class="container-login100">
		<div class="w3-container w3-content w3-padding-64 wrap-login100" style="max-width:1000px">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
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
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>