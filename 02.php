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

    bootstrap 용 기본 HTML 골격파일입니다. <br>

    <?php
        $i = 3;

        echo "$i <br>";

        $i = "홍길동";
        echo "$i <br>";

        for($i=1; $i<=10; $i++)
        {
            echo "$i<br>";
        }

        /*
            1   홍길동  10
            2   김개똥  20
            3   이순신  30

            $data["id"] = 1
            $data["name"] = "홍길동"
        */


        $sql = "select * from first_table ";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        while($data)
        {
            echo "yes data <br>";
            $data = mysqli_fetch_array($result);
        }


    ?>

</body>
</html>

<?php
    closeDB($conn);
?>