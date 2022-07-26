<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>book.php</title>
</head>
<body>
<?php
    // 建立MySQL的資料庫連接 
    $link = mysqli_connect("localhost","root", "12345678","mydb") or die("無法開啟MySQL資料庫連接!<br/>");
    echo "資料庫myschool開啟成功!<br/>";
?> 
%%%%%%%%%%%%%%%查詢所有書籍資料%%%%%%%%%%%%%%%
<?php
    echo "<br>";
    echo "<br>";	
    $sql = "select * from books";
	if( $result = mysqli_query($link, $sql))
	{
		echo "<table border=2>";
		
		echo "<tr><td>書籍編號</td><td>書籍名稱</td><td>書籍價格</td><td>負責員工編號</td></tr>";
		
		while($row = mysqli_fetch_assoc($result))
		{
			print "<tr>";
			print "<td>".$row["書籍編號"]."</td>";
			print "<td>".$row["書籍名稱"]."</td>";
			print "<td>".$row["價格"]."</td>";
			print "<td>".$row["負責員工編號"]."</td>";
            print "</tr>";
		}
		echo "</table>";
	}
?> 
</body>
</html>