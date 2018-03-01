<?php include_once("connect_db.php");
?>


<!DOCTYPE HTML>
<html>
<head>
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
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>




</body>
</html>