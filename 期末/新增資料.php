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
%%%%%%%%%%%%%%%新增書籍資料%%%%%%%%%%%%%%%
<form name="form1" method="get" action="新增資料.php">
    輸入書本名稱:
    <input type='text' name = "name" maxlength = "20" size="20"> <br>
	輸入書本價格:
    <input type='text' name = "price" maxlength = "6" size="20"> <br>
	負責員工編號:
    <input type='text' name = "emp" maxlength = "6" size="20"> <br>

	<input type="submit" value='新增'>
	<input type="reset"  value='重設'>
</form>
<?php
    echo "<br>";
	if($_GET['name'])
	{
		$n1 = $_GET['name'];
		$n2 = $_GET['price'];
		$n3 = $_GET['emp'];
	
    $sql = "insert into books(書籍名稱,價格,負責員工編號)    values('$n1',$n2,$n3)";
	//echo $sql;
	$result = mysqli_query($link,$sql);
	echo "你已新增書籍 $n1";
	echo "<br>";
	$sql="";

    }
?> 
%%%%%%%%%%%%%%%刪除書籍資料%%%%%%%%%%%%%%%
<form name="form1" method="post" action="新增資料.php">
    書籍編號:

	<select name="name">

	<?php
    echo "<br>";
	$sql = "SELECT * FROM books";
	if($result = mysqli_query($link,$sql))
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<option value=".$row["書籍編號"].">".$row["書籍編號"]."</option>";
		}
	}
    ?>
	</select><br/> 
	<input type="submit" value="刪  除">
	<input type="reset"></form> 
    <?php
	$sql = "delete from books where 書籍編號= '{$_POST['name']}'";
	echo $sql;
	$result = mysqli_query($link,$sql);
	?>
	<br> 
</form>
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%修改資料書籍資料%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
<br>
<body>
<form name="form1" method="get" action="新增資料.php">
輸入修改書本編號：
<select name="bookno2">
<?php
    echo "<br>";
    $sql = "SELECT * FROM books";
    if ( $result = mysqli_query($link, $sql) )
    {
        while( $row = mysqli_fetch_assoc($result) )
        {
            echo "<option value=".$row["書籍編號"].">".$row["書籍編號"]."</option>";
        }
    }
    $sql="";
?>
</select><br/>
<input type="submit" value="查 詢">
<input type="reset"></form>
</form>
</body>
</html>
<br>
<?php
    if ($_GET['bookno2'])
    {
        $bookno2=$_GET['bookno2'];
        $sql="select * from books where books.書籍編號 = $bookno2";
        $result=mysqli_query($link, $sql) ;
        $row=mysqli_fetch_assoc($result);
    }
    $sql="";
?>
<body>
<form name="form6" method="get" action="新增資料.php">
修改書本名稱：
<input type="text" name="name3" value= "<?php echo $row["書籍名稱"]; ?>" maxlength="20" size="20"><br>
修改書本價格：
<input type="text" name="cost3" value= "<?php echo $row["價格"]; ?>" maxlength="6" size="20"><br>
修改員工編號：
<input type="text" name="emp3" value= "<?php echo $row["負責員工編號"]; ?>" maxlength="6" size="20"><br>

<input type="hidden" name="no3" value="<?php echo $row["書籍編號"]; ?>" maxlength="6" size="20"><br>



<input type="submit" value='修改'>
<input type="reset" value='重設'>
</form>
</body>
</html>




<?php
if ($_GET['name3'])
{
    $bookno3=$_GET['no3'];
    $bookname3=$_GET['name3'];
    $bookcost3=$_GET['cost3'];
    $bookemp3=$_GET['emp3'];
    $sql="update books set 書籍名稱='$bookname3', 價格=$bookcost3, 負責員工編號= $bookemp3 where 書籍編號= $bookno3 ";
    $result=mysqli_query($link, $sql) ; ;


    echo "<br>";
    echo "你已經修改書本編號: ".$bookno3;
    echo "<br>";
    echo "書籍名稱: ".$bookname3;
    echo "<br>";
    echo "書籍價格: ".$bookcost3;
    echo "<br>";
    echo "負責員工編號: ".$bookemp3;
    echo "<br>";
    $sql="";
    echo "<br>";
  }
?>
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%修改員工資料%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
<br>
<body>
<form name="form1" method="get" action="新增資料.php">
輸入員工編號：
<select name="employee2">
<?php
    echo "<br>";
    $sql = "SELECT * FROM employee";
    if ( $result = mysqli_query($link, $sql) )
    {
        while( $row = mysqli_fetch_assoc($result) )
        {
            echo "<option value=".$row["員工編號"].">".$row["員工編號"]."</option>";
        }
    }
    $sql="";
?>
</select><br/>
<input type="submit" value="查 詢">
<input type="reset"></form>
</form>
</body>
</html>
<br>
<?php
    if ($_GET['employee2'])
    {
        $employeeno2=$_GET['employee2'];
        $sql="select * from employee where employee.員工編號 = $employeeno2";
        $result=mysqli_query($link, $sql) ;
        $row=mysqli_fetch_assoc($result);
    }
    $sql="";
?>
<body>
<form name="form6" method="get" action="新增資料.php">
修改性別：
<input type="text" name="gender1" value= "<?php echo $row["性別"]; ?>" maxlength="20" size="20"><br>
修改姓名：
<input type="text" name="name1" value= "<?php echo $row["姓名"]; ?>" maxlength="6" size="20"><br>
修改電話：
<input type="text" name="tel1" value= "<?php echo $row["電話"]; ?>" maxlength="6" size="20"><br>
修改主管編號：
<input type="text" name="boss1" value= "<?php echo $row["主管編號"]; ?>" maxlength="6" size="20"><br>

<input type="hidden" name="no3" value="<?php echo $row["員工編號"]; ?>" maxlength="6" size="20"><br>



<input type="submit" value='修改'>
<input type="reset" value='重設'>
</form>
</body>
</html>




<?php
if ($_GET['gender1'])
{
	$employeeno3=$_GET['no3'];
    $gender1=$_GET['gender1'];
    $name1=$_GET['name1'];
    $tel1=$_GET['tel1'];
    $boss1=$_GET['boss1'];
    $sql="update employee set 性別='$gender1', 姓名='$name1', 電話= '$tel1', 主管編號= $boss1 where 員工編號= $employeeno3 ";
    $result=mysqli_query($link, $sql) ; ;
    print($sql);

    echo "<br>";
    echo "你已經修改員工編號: ".$employeeno3;
    echo "<br>";
    echo "性別: ".$gender1;
    echo "<br>";
    echo "姓名: ".$name1;
    echo "<br>";
	echo "電話: ".$tel1;
    echo "<br>";
    echo "主管編號: ".$boss1;
    echo "<br>";
    $sql="";
    echo "<br>";
  }
?>
%%%%%%%%%%%%%%%%%%%%%%%%使用超連結來刪除書籍 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
<?php

echo "<br>";

echo "<br>";
if ($_GET['del'])
{
$bookno1=$_GET['del'];



$sql="delete from books where 書籍編號= $bookno1";



$result=mysqli_query($link, $sql);



echo "你已經刪除書本編號 $bookno1";
}

$sql = "select books.書籍編號, books.書籍名稱, books.價格, employee.姓名
from books, employee where books.負責員工編號=employee.員工編號";
if ( $result = mysqli_query($link, $sql) )
{

echo "<table border=2>";
echo "<tr><td>書籍編號</td><td>書籍名稱</td><td>書籍價格</td><td>負責員工姓名</td><td>選擇刪除資料</td></tr>";



while( $row = mysqli_fetch_assoc($result) )
{
$n1 = $row["書籍編號"];
echo "<tr><td>".$row["書籍編號"]."</td><td>".$row["書籍名稱"]."</td><td>".$row["價格"]."</td><td>".$row["姓名"]."<td><a href=新增資料.php?del=$n1> 刪除</a></td></td></tr>";
}



echo "</table>";

}

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

<form name="form1" method="get" action="新增資料.php">
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

<form name="form2" method="get" action="新增資料.php">
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

<form name="form3" method="get" action="新增資料.php">
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

<form name="form4" method="get" action="新增資料.php">
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