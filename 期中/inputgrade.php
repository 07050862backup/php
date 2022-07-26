<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>inputgrade.php</title>
</head>

<body>

    <form name="form1" method="get" action="inputgrade.php">
        成績: <input type="text" name="grade" size="15" /><br />
        <input type="submit" value="查詢">
        <input type="reset" value="清空">
    </form><br />
    <?php
    $grade = $_GET['grade'];
    echo "學生成績: $grade 分<br/>";
    if ($grade >= 80) {
        print "<h1>甲等!</h1><br/>";
    } elseif ($grade >= 70) {
        print "<h1>乙等!</h1><br/>";
    } elseif ($grade >= 60) {
        print "<h1>丙等!</h1><br/>";
    } else {
        print "<h1><font color = #FF000>丁等!</h1><br/>";
    }
    ?>
</body>
</html>