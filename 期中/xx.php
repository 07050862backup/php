<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>xx.php</title>
</head>

<body>

   <form name="form6" method="get" action="xx.php">
      數目:<input type="text" name="grade" size="15" /><br />
      <input type="submit" value="相乘">
      <input type="reset" value="清空">
   </form>

   <?php
   $total = 1;   // 指定變數值
   $n = $_GET['grade'];

   echo "<table width=1 border=1>";
   echo "<tr>";
   for ($i = 1; $i <= $n; $i++) {
      print "<td>" . $i . "</td>";
      if ($i % 20 == 0)
         print "<tr>";
      $total = $i * $total;
   }
   echo "</tr>";
   echo "</table>";


   print "<br/>for遞增迴圈從1乘到" . $n . "=" . $total . "<br/>";

   ?>
</body>

</html>