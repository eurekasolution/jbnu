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

    DB Query 연습 <br>

    <form>
    <div class="row rowLine">
        <div class="col">아이디</div>
        <div class="col"><input type="text" name="id" class="form-control" placeholder="아이디"></div>
        <div class="col">이름</div>
        <div class="col"><input type="text" name="name" class="form-control" placeholder="실명입력"></div>
    </div>

    <div class="row rowLine">
        <div class="col">나이</div>
        <div class="col"><input type="text" name="age" class="form-control" placeholder="나이"></div>
        <div class="col">
            <button type="submit" class="btn btn-primary">등록</button>
        </div>
    </div>

    </form>


    <?php

        //$sql = "select * from first_table ";
        $sql = "select * from mytable order by idx asc";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);

        // 순서, 타겟, 원인, 나이.....
    ?>
    
        <div class="row rowLine">
            <div class="col">순서</div>
            <div class="col">아이디</div>
            <div class="col">이름</div>
            <div class="col">나이</div>
            <div class="col">비고</div>
        </div>

    <?php

        while($data)
        {
            //http://localhost/03.php
           ?>
            <div class="row rowLine">
                <div class="col"><?php echo $data["idx"]?></div>
                <div class="col"><?php echo $data["id"]?></div>
                <div class="col"><?php echo $data["name"]?></div>
                <div class="col"><?php echo $data["age"]?></div>
                <div class="col">비고</div>
            </div>
           <?php
            $data = mysqli_fetch_array($result);
        }


    ?>

    </div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>