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


        <script>
                var ta = Math.random() * 20 + 10;
                var tb = 15;
                var tc = 20;
                var td = 30;

                var xa = 0;
                var ya = 0;
                var xb = 400;
                var yb = 0;
                var xc = 0;
                var yc = 400;
                var xd = 400;
                var yd = 400;

                var lena = 0;
                var lenb = 0;
                var lenc = 0;
                var lend = 0;

                var lenTotal = 0;




        </script>

	</head>
<body>
    <div class="container">
        <canvas id="canvas" width="400" height="400" style="border:solid 1px #000000"></canvas>

    </div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>