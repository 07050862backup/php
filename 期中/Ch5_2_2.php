<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Ch5_2_2.php</title>
</head>
<body>
<?php 
$name = "江小魚";  // 指定變數值
$grade = 85;

print $name. "成績: "."<h1>".$grade."</h1>"."<br>";

// if/else條件敘述
if ( $grade >= 60 ) {
   print $name. "成績及格!<br/>";
} else {
   print $name. "成績不及格!<br/>";
} 
?>
</body>
</html>