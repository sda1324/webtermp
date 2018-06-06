<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../detailstyle.css"/>
    </head>

<?
    $check = $_GET['val'];
    $mysqli=mysqli_connect("localhost","root","wjddnwls","members");
    $sql = "select * from dessert where name='$check'";
    $result = $mysqli->query($sql);

    while($row = $result -> fetch_array()) {
        $name=  $row[name];
        $eng=   $row[eng];
        $info=  $row[info];
        $serve= $row[serve];
        $kcal=  $row[kcal];
        $sugar=   $row[sugar];
        $pro=   $row[pro];
        $fat=   $row[fat];
        $na=   $row[na];
        $img=   $row[img];
    }
?>

    <body>
        <div id="contents">
            <div id="name">
                <h2> <?=$name?> </h2>
                <span> <?=$eng?> </span>
            </div>

            
            <div id="detail">
                <div id="detailimg">
                    <img src="../../img/<?=$img?>" alt="">
                </div>
                <div id="detailsum">
                    <div id="suminner">
                        <h3> 제품설명 </h3>
                        <p> <?=$info?> </p>
                        <hr style="border: 0.5px solid rgb(143, 143, 143)">
                        <h3> 영양 정보 </h3>
                        <table>
                            <tr> <td style="background-color: #eeeded;">1회 제공량(g)</td> <td style="border: 1px solid #eeeded; text-align: right;"><?=$serve?> g</td></tr>
                            <tr> <td style="background-color: #eeeded;">열량(kcal)</td> <td style="border: 1px solid #eeeded; text-align: right;"><?=$kcal?> kcal</td> </tr>
                            <tr> <td style="background-color: #eeeded;">당류(g)</td> <td style="border: 1px solid #eeeded;text-align: right;"><?=$sugar?> g</td> </tr>
                            <tr> <td style="background-color: #eeeded;">단백질(g)</td> <td style="border: 1px solid #eeeded;text-align: right;"><?=$pro?> g</td> </tr>
                            <tr> <td style="background-color: #eeeded;">지방(g)</td> <td style="border: 1px solid #eeeded;text-align: right;"><?=$fat?> g</td> </tr>
                            <tr> <td style="background-color: #eeeded;">나트륨(g)</td> <td style="border: 1px solid #eeeded;text-align: right;"><?=$na?> g</td> </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div id="backbutton" style="margin: 10px 0 0 930px;">
                <input type="button" value="닫기" onclick="self.close()">
            </div>

        </div>
    </body>
</html>

