<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Ch5_2_3.php</title>
</head>
<body>
<?php 
$grade = 50;  // 指定變數值
echo "學生成績: $grade 分<br/>";
// if/elseif條件敘述
if ( $grade >= 80 ) {
    print "<h1>甲等!</h1><br/>";

}
elseif ( $grade >= 70 ) {
       print "<h1>乙等!</h1><br/>";
    }
elseif ( $grade >= 60 ) {
            print "<h1>丙等!</h1><br/>";
        }
        else {
            print "<h1><font color = #FF000>丁等!</h1><br/>";
        }
?>
</body>
</html>