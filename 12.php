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




<?php

	$OPENURL = "https://db.itkc.or.kr/people/view?gubun=person&cate1=Z&cate2=&dataId=";
	$current = 100;
	$dataId = sprintf("P%06d", $current);
	$OPENURL = $OPENURL."$dataId";


	$ch = curl_init();								// curl 초기화
	curl_setopt($ch, CURLOPT_URL, $OPENURL);			// URL 지정
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// 요청 결과를 문자열로 반환
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);	// set timeout
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// 원격 서버의 인증서 유효성 검사 안함
	$response = curl_exec($ch);
	$response = str_replace("textarea", "text_area", $response);

	
?>
<textarea cols="100" rows="20">
	<?php echo $response ?>
</textarea>


</div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>