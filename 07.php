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
            <div class="col"> <span class="material-icons">settings</span> 사용자 입력 테스트</div>
        </div>

        <div class="row rowLine">
            <div class="col-2">text</div>
            <div class="col">
                <input type="text" name="id" class="form-control">
            </div>
        </div>

        <div class="row rowLine">
            <div class="col-2">password</div>
            <div class="col">
                <input type="password" name="pass" class="form-control">
            </div>
        </div>

        <div class="row rowLine">
            <div class="col-2">select</div>
            <div class="col">
                <select name="local" class="form-control">
                    <option value="">=== 선택 ===</option>
                    <option value="1" selected>서울</option>
                    <option value="2">경기</option>
                    <option value="3">충청</option>
                    <option value="4">기타</option>

                </select>
            </div>
        </div>

        <div class="row rowLine">
            <div class="col-2">textarea</div>
            <div class="col">
                <textarea name="memo" class="form-control" rows="10">1111</textarea>
            </div>
        </div>

        <div class="row rowLine">
            <div class="col-2">
                <button type="submit" class="btn btn-primary">실행</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-danger btn-sm">danger</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-success form-control"> <span class="material-icons">settings</span> success</button>
            </div>
        </div>



    </div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>