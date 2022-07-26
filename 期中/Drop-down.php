<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>drop-down.php</title>
</head>

<body>
   <form name="form1" method="get" action="drop-down.php">
      輸入GPA: <br />
      <select name="grade" size="1">
         <option value="A">A</option>
         <option value="B">B</option>
         <option value="C">C</option>
         <option value="D">D</option>
      </select><br />

      <input type="submit" value="查詢"><input type="reset" value="清空">
   </form><br />

   <?php
   $GPA = $_GET['grade'];
   echo "學生成績: $GPA<br/>";
   switch ($GPA) {
      case 'A':
         print "學生成績超過80<br/>";
         break;
      case 'B':
         print "學生成績超過70,低於80<br/>";
         break;
      case 'C':
         print "學生成績超過60,低於70<br/>";
         break;
      default:
         print "學生成績不及格<br/>";
   }
   ?>
</body>

</html>