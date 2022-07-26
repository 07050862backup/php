<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>forloop2.php</title>
</head>

<body>

   <form name="form6" method="get" action="forloop2.php">
      數目:<input type="text" name="grade" size="15" /><br />
      <input type="submit" value="相加">
      <input type="reset" value="清空">
   </form>

   <?php
   $total = 0;   // 指定變數值
   $n = $_GET['grade'];

   echo "<table width=1 border=1>";
   echo "<tr>";
   for ($i = 1; $i <= $n; $i++) {
      print "<td>" . $i . "</td>";
      if ($i % 10 == 0)
         print "<tr>";
      $total += $i;
   }
   echo "</tr>";
   echo "</table>";


   print "<br/>for遞增迴圈從1加到" . $n . "=" . $total . "<br/>";

   ?>
</body>

</html>