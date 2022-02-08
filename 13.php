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
<?php
    $areaList = "지역선택,서울,경기,충청,전라,강원,경상,제주,기타";
    $splitArea = explode(",", $areaList);

    // $splitArea[0] = "서울";
    //           [1] = "경기";
    //           [2] = "충청";

    $tag = "<li class='' id='click_A123456' ";
    $splitTag = explode("click_", $tag);
    // $splitTag[0] = "<li class='' id='";
    // $splitTag[1] = "A123456' "
    $splitModel = explode("'", $splitTag[1] );
    $model = $splitModel[0]; // A123456
                   
?>

    <div class="container">
        <div class="row rowLine">
            <div class="col">모델</div>
            <div class="col"><?php echo $model ?></div>
        </div>

        <div class="row rowLine">
            <div class="col-3">반응형</div>
            <div class="col"><img src="a.jpg" class="img-fluid rounded"> </div>
        </div>

        <div class="row rowLine">
            <div class="col">기존방식</div>
            <div class="col"><img src="a.jpg" width="300" height="200"> </div>
        </div>

        <div class="row rowLine">
            <div class="col">원본사진</div>
            <div class="col"><img src="a.jpg"> </div>
        </div>



        <div class="row rowLine">
            <div class="col">지역선택</div>
            <div class="col">
                <select name="area" class="form-control">
                    <option value="">== 선택 ==</option>
                    <?php
                        $cnt = 1;
                        while($splitArea[$cnt])
                        {
                            echo "<option value='$cnt'>$splitArea[$cnt]</option>";
                            $cnt++;

                        }
                    ?>
                </select>
            </div>
        </div>

    </div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>