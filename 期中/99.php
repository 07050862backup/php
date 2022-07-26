<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>xx.php</title>
</head>

<body>

   <form name="form6" method="get" action="99.php">
      數目:<input type="text" name="grade" size="15" /><br />
      <input type="submit" value="相乘">
      <input type="reset" value="清空">
   </form>

   <?php
   $total = 1;   // 指定變數值
   $n = $_GET['grade'];
   /*  期中考第二題，帶表格的99乘法表 */ 
   echo "<table width=1 border=1>";
   echo "<tr>";
   print "<tr><td></td>";
  // print "<td>" . "&nbsp&nbsp" . "</td>";
   for ($i = 1; $i <= $n; $i++) {
      print "<td>" . $i . "</td>";
   }
   print "<tr>";
   for ($i = 1; $i <= $n; $i++) {
      print "<td>" . $i . "</td>";
      for ($j = 1; $j <= $n; $j++) {
         print "<td>" . $i*$j . "</td>";
         if ($j % $n == 0)
         print "<tr>";
      $total = $i * $total;
      }
   }   
   echo "</tr>";
   echo "</table>";

   ?>
</body>

</html>