<?php
	date_default_timezone_set("Asia/Seoul");

	include "db.inc.php";
    include "register_globals.php";

	$conn = connectDB();
	register_globals();

    // http://localhost/01.php


?>

<!doctype html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>전북대 데이터 시각화</title>
		<meta name="viewport"
			content="width=device-width, maximum-scale=3.0, user-scalable=yes">
		<link href="style.css" rel="stylesheet" type="text/css"> 
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	</head>
<body>
    <div class="container">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', '온도', '습도'],

            <?php
                // 전체 데이터 갯수 파악
                $sql = "select count(*) as total from sensor_table";
                $result = mysqli_query($conn, $sql);
                $totalData = mysqli_fetch_array($result);

                $total = $totalData["total"];
                $showCount = 30;
                $start = $total - $showCount;

                // 0, 1, 2, 3....99


                $sql = "SELECT * FROM sensor_table order by idx asc limit $start, $showCount";
                $result = mysqli_query($conn, $sql);
                $sensor = mysqli_fetch_array($result);

                while($sensor)
                {
                    $temp = $sensor["temp"];
                    $hum = $sensor["hum"];
                    $time = $sensor["time"];

                    echo "[ '$time', $temp, $hum],";

                    $sensor = mysqli_fetch_array($result);
                }
            ?>
        ]);

        var options = {
          title: 'JBNU IoT Visualization',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>

    <?php

      if(isset($counter))
        $counter = $counter + 1;  
      else
        $counter = 1;
    ?>


    <script>
            setTimeout(function() {
                location.href='<?php echo $PHP_SELF?>?counter=<?php echo $counter?>';
            }, 3000 );
    </script>

    </div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>