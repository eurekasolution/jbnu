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
    if(isset($mode) and $mode == "make")
    {
        echo "do make json";
/*
        // "id" : "1234", "ages":30, "day":"2021-12-31"

{
  "nodes": [
    {"id": "홍길동", "group": 1}
    ,{"id": "이순신", "group": 1},
    {"id": "정약용", "group": 3},
    {"id": "송시열", "group": 3},
    {"id": "곽영태", "group": 2},
    {"id": "강감찬", "group": 2}

  ],
  "links": [
    {"source": "홍길동", "target": "이순신", "value": 1},
    {"source": "정약용", "target": "송시열", "value": 8},
    {"source": "정약용", "target": "곽영태", "value": 8},
    {"source": "정약용", "target": "강감찬", "value": 8},
    {"source": "홍길동", "target": "강감찬", "value": 8}
  ]
}
*/

        $sql = "select * from covid ";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);

        $nodesData = "";
        $linksData = "";

        while($data)
        {
            //{"id": "홍길동", "group": 1},
            $id = $data["target"];
            $ages = $data["ages"];
            $day = $data["day"];
            
            if($nodesData == "")
                $nodeMark = "";
            else
                $nodeMark = ",";

            $nodesData = " $nodesData $nodeMark {\"id\" : \"$id\" , \"ages\":\"$ages\", \"day\":\"$day\"}  ";
            $data = mysqli_fetch_array($result);

        }

        echo "$nodesData";

    }
?>


<script>
    function makeJson()
    {
        location.href="<?php echo $PHP_SELF?>?mode=make";
    }
</script>

<div class="container">
    <div class="row rowLine">
        <div class="col">
            <button type="button" class="btn btn-primary btn-sm form-control" onClick=makeJson()>Make COVID JSON</button> 
        </div>
    </div>
</div>
  

</body>
</html>

<?php
    closeDB($conn);
?>