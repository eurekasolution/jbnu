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
        ['연령(이하)', '명'],
       
        <?php
            $ages = "0,10,20,30,40,50,60,70,80,90,100";
            $splitAge = explode(",", $ages); // splitAge[0] = 10, [1]=20, [2] = 30..
            $cnt = 1;
            while(isset($splitAge[$cnt]) and $splitAge[$cnt])
            {
                //echo "$splitAge[$cnt] <br>";
                $prev = $cnt -1;

                // 10
                $sql = "select count(*) as total from mytable where age>='$splitAge[$prev]' and  age<'$splitAge[$cnt]' ";
                //echo "$sql <br>";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);

                $total = $data["total"];
                $age = $splitAge[$cnt];

               //echo "인원".$data["total"]." <br>";
                echo "['$age 세 미만', $total ],";

                $cnt ++;
            }
        ?>


        ]);

        var options = {
        title: '연령별 회원 분포'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
    </script>

    <div class="row rowLine">
        <div class="col">
            <div id="piechart" style="width: 900px; height: 500px;"></div>            
        </div>
    </div>



    </div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>