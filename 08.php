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

    할 일.. 3초마다 랜덤값을 생성... 디비에 저장..


    <?php
        // php.net 
        // 12.3

        $temp = rand(600, 620) / 10;
        $hum =  rand(200, 207)/ 10;

        echo "temp = $temp , hum = $hum<br>";

        $sql = "INSERT INTO sensor_table (temp, hum, time) VALUES ('$temp', '$hum', now())";
        $result = mysqli_query($conn, $sql);


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