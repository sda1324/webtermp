<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../detailstyle.css"/>
    </head>

<?
    $check = $_GET['val'];
    $mysqli=mysqli_connect("1.214.233.123","root","wjddnwls","members");
    $sql = "select * from goods where name='$check'";
    $result = $mysqli->query($sql);

    while($row = $result -> fetch_array()) {
        $name=  $row[name];
        $eng=   $row[eng];
        $info=  $row[info];
        $price= $row[price];
        $made= $row[made];
        $img= $row[img];
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
                        <h3> 가격정보 </h3>
                        <table>
                            <tr> <td style="background-color: #eeeded;">가격</td> <td style="border: 1px solid #eeeded; text-align: right;">\ <?=$price?></td></tr>
                            <tr> <td style="background-color: #eeeded;">제조</td> <td style="border: 1px solid #eeeded; text-align: right;"><?=$made?></td></tr>
                        </table>
                    </div>
                </div>
            </div>

            <div id="backbutton" style="margin: 10px 0 0 930px;">
                <input type="button" value="닫기" onclick="self.close()">
            </div>

            <!-- <div id="backbutton" style="margin-left:800px">
                <ul>
                    <li style="float: left; padding: 0 20px;"><button type="button" onclick="location.href='../../payment/pay.html'"> 주문하기 </button></li>
                    <li><input type="button" value="닫기" onclick="self.close()"></li>
                </ul>
            </div> -->
        </div>
    </body>
</html>

