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

        <div class="row rowLine">
            <div class="col"></div>
        </div>

        <div class="row rowLine">
            <div class="col-6">6</div>
            <div class="col-4">4</div>
            <div class="col-2">2</div>
        </div>

        <div class="row rowLine">
            <div class="col-6 bg-primary">6</div>
            <div class="col-4 bg-danger text-white">4</div>
            <div class="col-2 bg-success">2</div>
        </div>

        <div class="row rowLine">
            <div class="col bg-primary">x</div>
            <div class="col bg-danger text-white">x</div>
            <div class="col bg-success">x</div>
        </div>

        <div class="row rowLine">
            <div class="col-6 bg-primary">6</div>
            <div class="col bg-danger text-white">x</div>
            <div class="col bg-success">x</div>
        </div>

        xs - sm - md - lg - xlg - xxlg
        <div class="row rowLine">
            <div class="col-6 col-md-3 bg-primary">6</div>
            <div class="col-4 col-lg-5 bg-danger text-white">4</div>
            <div class="col bg-success">2</div>
        </div>

        <div class="row rowLine">
            <div class="col">사용자 입력 테스트</div>
        </div>

        <div class="row rowLine">
            <div class="col-2">text</div>
            <div class="col">
                <input type="text" name="id">
            </div>
        </div>



    </div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>