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
    if(isset($encoding) and isset($url))
    {


        //$OPENURL = "http://corners.auction.co.kr/AllKill/AllDay.aspx";

        $OPENURL = $url;
        //$OPENURL = "https://search.naver.com/search.naver?where=news&sm=tab_pge&query=%EC%A0%84%EB%B6%81%EB%8C%80%ED%95%99%EA%B5%90&sort=0&photo=0&field=0&pd=0&ds=&de=&cluster_rank=55&mynews=0&office_type=0&office_section_code=0&news_office_checked=&nso=so:r,p:all,a:all&start=1";
        //$current = 100;
        //$dataId = sprintf("P%06d", $current);
        //$OPENURL = $OPENURL."$dataId";


        $ch = curl_init();								// curl 초기화
        curl_setopt($ch, CURLOPT_URL, $OPENURL);			// URL 지정
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// 요청 결과를 문자열로 반환
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);	// set timeout
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// 원격 서버의 인증서 유효성 검사 안함


        $response = curl_exec($ch);
        $response = str_replace("textarea", "text_area", $response);

        if($encoding == "euc-kr")
        {

            $response = mb_convert_encoding($response, "UTF-8", "EUC-KR");
        }
    }
	

    if(!isset($url))
        $url = "";
?>
    <form method="POST" action="<?php echo $PHP_SELF?>">
    <div class="row rowLine">
        <div class="col">
            <input type="text" name="url" class="form-control" value="<?php echo $url ?>">
        </div>
    <div>

    <div class="row rowLine">
        <div class="col">
            <select name="encoding" class="form-control">
                <option value="utf-8">UTF-8</option>
                <?php
                    if(isset($encoding) and $encoding == "euc-kr")
                        $mark = "selected";
                    else
                        $mark = "";
                ?>
                <option value="euc-kr" <?php echo $mark ?>>EUC-KR</option>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">크롤링 실행</button>
        </div>
    </div>

    </form>

    <div class="row rowLine">
        <div class="col">
            <textarea class="form-control" rows="20">
	            <?php echo $response ?>
            </textarea>
        </div>        
    </div>

    <?php

        // STEP 1 : 제품별로 구분해 제품번호만 우선 추출
        $splitModel = explode("<li class=\"\" id=\"click_", $response);
        $cntModel = 1;

        $MPL = 3;  // Model Per Line

        $counter = 0;

        ?>
            <script>
                function detailWindow(modelNo)
                {
                    window.open('http://itempage3.auction.co.kr/DetailView.aspx?itemno='+modelNo, 'AuctionWindow', 'resizable=yes scrollbars=yes width=1000 height=1000');
                }
            </script>
        <?
        while($splitModel[$cntModel])
        {
            $splitModelNo = explode("\">", $splitModel[$cntModel]);

            // STEP 2 : 이미지 추출 ($splitModelNo[1]에서도 추출가능)
            $splitImage = explode("data-original=\"", $splitModel[$cntModel]);
            $imageInfo = explode("\" alt", $splitImage[1]);

            // STEP 4 : 가격 추출
            $splitPrice = explode("<span class=\"price\">", $splitImage[1]);
            $splitStrong = explode("<strong>", $splitPrice[1]);
            $splitRealPrice = explode("<span>", $splitStrong[1]);

            // STEP 5 : 배송비
            $splitDeliverFee = explode("<span class=\"tag\"><span class=\"ico_bar\"></span>", $splitPrice[1]);
            $deliverFeeInfo = explode("</span>", $splitDeliverFee[1]);
            if($deliverFeeInfo[0] == "무료배송")
                $printDeliverFee = "<span class='text-primary'>$deliverFeeInfo[0]</span>";
            else
                $printDeliverFee = "";

            // STEP 6 : 데이터 저장 (필요시)

            // STEP 3 : 이미지 반응형으로 표현
            $counter ++;
            if($counter % $MPL == 1)
                echo "<div class='row rowLine'>";

            echo "
                <div class='col'>
                    <img src='$imageInfo[0]' class='img-fluid' onClick=\"detailWindow('$splitModelNo[0]')\" style='cursor:pointer'><br>
                    제품번호 : $splitModelNo[0]<br>
                    가격 : $splitRealPrice[0]<br>
                    $printDeliverFee
                </div>
            ";

            if($counter % $MPL == 0)
                echo "</div>";

            $cntModel ++;
        }


    ?>





</div>  <!-- container -->
</body>
</html>

<?php
    closeDB($conn);
?>