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
    $sql = "select books.書籍編號,books.書籍名稱,books.價格, employee.姓名 from books INNER JOIN employee ON books.負責員工編號 = employee.員工編號";
	if( $result = mysqli_query($link, $sql))
	{
		echo "<table border=2>";
		
		echo "<tr><td>書籍編號</td><td>書籍名稱</td><td>書籍價格</td><td>負責員工</td></tr>";
		
		while($row = mysqli_fetch_assoc($result))
		{
			print "<tr>";
			print "<td>".$row["書籍編號"]."</td>";
			print "<td>".$row["書籍名稱"]."</td>";
			print "<td>".$row["價格"]."</td>";
			print "<td>".$row["姓名"]."</td>";
            print "</tr>";
		}
		echo "</table>";
	}
?>  
%%%%%%%%%%%%%%%查詢所有員工資料%%%%%%%%%%%%%%%
<?php
    echo "<br>";
    echo "<br>";	
    $sql = "select * from employee";
	if( $result = mysqli_query($link, $sql))
	{
		echo "<table border=2>";
		
		echo "<tr><td>員工編號</td><td>性別</td><td>姓名</td><td>電話</td><td>主管編號</td></tr>";
		
		while($row = mysqli_fetch_assoc($result))
		{
			print "<tr>";
			print "<td>".$row["員工編號"]."</td>";
			print "<td>".$row["性別"]."</td>";
			print "<td>".$row["姓名"]."</td>";
			print "<td>".$row["電話"]."</td>";
			print "<td>".$row["主管編號"]."</td>";
            print "</tr>";
		}
		echo "</table>";
	}
?> 

%%%%%%%%%%%%%%%針對員工編號查詢員工資料%%%%%%%%%%%%%%%

<form name="form1" method="get" action="互動員工編號下拉式選單.php">
    輸入查詢員工編號:
    <input type='text' name = "emp_no" maxlength = "6" size="8"> <br>
	
	<input type="submit" value='查詢'>
	<input type="reset"  value='重設'>
</form>
<?php

    if($_GET['emp_no'])
	{
		$emp_no=$_GET['emp_no'];
		$sql = "select * from employee where 員工編號= $emp_no";
		$result = mysqli_query($link, $sql);
	}
    
	
    echo "<br>";
    echo "<br>";	
   
	if( $result )
	{
		echo "<table border=2>";
		
		echo "<tr><td>員工編號</td><td>性別</td><td>姓名</td><td>電話</td><td>主管編號</td></tr>";
		
		while($row = mysqli_fetch_assoc($result))
		{
			print "<tr>";
			print "<td>".$row["員工編號"]."</td>";
			print "<td>".$row["性別"]."</td>";
			print "<td>".$row["姓名"]."</td>";
			print "<td>".$row["電話"]."</td>";
			print "<td>".$row["主管編號"]."</td>";
            print "</tr>";
		}
		echo "</table>";
	}
?> 


%%%%%%%%%%%%%%%針對員工編號查詢員工資料  <下拉式選單>%%%%%%%%%%%%%%%

<form name="form2" method="get" action="互動員工編號下拉式選單.php">
    輸入查詢員工編號:
    <select name="emp_no2">
	<?php
	    echo "br";
		$sql = "select * from employee ";
		if($result = mysqli_query($link,$sql))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<option value=".$row["員工編號"].">".$row["員工編號"]."</option>";
			}
		}
	$sql="";
	?>
	</select><br/>
	<input type="submit" value='查詢'>
	<input type="reset"  value='重設'>
</form>
<?php

    if($_GET['emp_no2'])
	{
		$emp_no=$_GET['emp_no2'];
		$sql = "select * from employee where 員工編號= $emp_no";
		$result = mysqli_query($link, $sql);
		echo $sql;
	}
    
	
    echo "<br>";
    echo "<br>";	
   
	if( $result )
	{
		echo "<table border=2>";
		
		echo "<tr><td>員工編號</td><td>性別</td><td>姓名</td><td>電話</td><td>主管編號</td></tr>";
		
		while($row = mysqli_fetch_assoc($result))
		{
			print "<tr>";
			print "<td>".$row["員工編號"]."</td>";
			print "<td>".$row["性別"]."</td>";
			print "<td>".$row["姓名"]."</td>";
			print "<td>".$row["電話"]."</td>";
			print "<td>".$row["主管編號"]."</td>";
            print "</tr>";
		}
		echo "</table>";
	}
?> 


%%%%%%%%%%%%%%%%%%%  書籍價格查詢  %%%%%%%%%%%%%%%%%%%

<form name="form3" method="get" action="互動員工編號下拉式選單.php">
    書籍價格(小):
    <select name="book_price_small">
	<?php
	    echo "br";
		$sql = "select * from books ";
		
		if($result = mysqli_query($link,$sql))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<option value=".$row["價格"].">".$row["價格"]."</option>";
			}
		}
	$sql="";
	?>
	</select><br/>
	書籍價格(大):
	<select name="book_price_big">
	<?php
	    echo "br";
		$sql = "select * from books ";
		
		if($result = mysqli_query($link,$sql))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<option value=".$row["價格"].">".$row["價格"]."</option>";
			}
		}
	$sql="";
	?>
	</select><br/>
	<input type="submit" value='查詢'>
	<input type="reset"  value='重設'>
</form>
<?php
    
    if($_GET['book_price_small'])
	{
		$price_small=$_GET['book_price_small'];
		echo $sql;
	}
	if($_GET['book_price_big'])
	{
		$price_big=$_GET['book_price_big'];
		echo $sql;
	}
    print "價格介於".$price_small." 和 ".$price_big;
	

	$sql = "select books.書籍編號,books.書籍名稱,books.價格,employee.姓名 from books,employee where books.負責員工編號=employee.員工編號 and($price_small <=價格 and 價格<=$price_big)order by 價格;";
	$result = mysqli_query($link, $sql);
    echo "<br>";
    echo "<br>";	
   
	if( $result )
	{
		echo "<table border=2>";
		
		echo "<tr><td>書籍編號</td><td>書籍名稱</td><td>書籍價格</td><td>負責員工編號</td></tr>";
		
		while($row = mysqli_fetch_assoc($result))
		{
			print "<tr>";
			print "<td>".$row["書籍編號"]."</td>";
			print "<td>".$row["書籍名稱"]."</td>";
			print "<td>".$row["價格"]."</td>";
			print "<td>".$row["姓名"]."</td>";
            print "</tr>";
		}
		echo "</table>";

		echo "<br>";
        echo "<br>";
	}
?> 


%%%%%%%%%%%%%%%針對員工名字查詢書籍資料  <下拉式選單>%%%%%%%%%%%%%%%

<form name="form4" method="get" action="互動員工編號下拉式選單.php">
    輸入員工名字:
    <select name="emp_name">
	<?php
	    echo "br";
		$sql = "select * from employee ";
		if($result = mysqli_query($link,$sql))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<option value=".$row["姓名"].">".$row["姓名"]."</option>";
			}
		}
	$sql="";
	?>
	</select><br/>
	<input type="submit" value='查詢'>
	<input type="reset"  value='重設'>
</form>
<?php

    if($_GET['emp_name'])
	{
		$emp_name=$_GET['emp_name'];
		$sql = "select * from books where 負責員工編號 = (select 員工編號 from employee where 姓名 = '$emp_name')";
		$result = mysqli_query($link, $sql);
		echo $sql;
	}
    
	
    echo "<br>";
    echo "<br>";	
   
	if( $result )
	{
		echo "<table border=2>";
		
		echo "<tr><td>書籍編號</td><td>書籍名稱</td><td>價格</td><td>負責員工編號</td></tr>";
		
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