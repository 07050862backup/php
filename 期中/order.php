<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>order.php</title>
            <style type=text/css>
            h1 {
                color: red;
                }
            </style>
    </head>

    <body>

    <form name="form1" method="post" action="order.php">
        <h1>
            <label style="font-size:30px;">訂單管理系統</label><br />
        </h1>

        <input type="checkbox" name="Original" />原味披薩 價格
            <select name="Price1">
                <option value="100" selected="True">100元</option>
                <option value="200">200元</option>
                <option value="300">300元</option>
            </select>
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;數量:</label> <input type="text"
        name="num1" size="15" /><br /><br />

        <input type="checkbox" name="Beef" />牛肉披薩 價格
            <select name="Price2">
                <option value="100" selected="True">100元</option>
                <option value="200">200元</option>
                <option value="300">300元</option>
            </select>
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;數量:</label> <input type="text"
        name="num2" size="15" /><br /><br />

        <input type="checkbox" name="Seafood" />海鮮披薩 價格
            <select name="Price3">
                <option value="100" selected="True">100元</option>
                <option value="200">200元</option>
                <option value="300">300元</option>
            </select>
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;數量:</label> <input type="text"
        name="num3" size="15" /><br /><br />

    <input type="submit" value="計算總價" style="height:25px; width:200px" />

    </form><br />


    <?php


        if (isset($_POST['Original']))
        {
            //print "<h1>Original is checked!</h1><br/>";
            $Original_price = $_POST['Price1'];
            $Original_num = $_POST['num1'];
            $total1 = $Original_num*$Original_price;
            //print"原味".$Original_num."個，共".$total1."元";
        }
        if (isset($_POST['Beef'])) 
        {
            //print "<h1>Beef is checked!</h1><br/>";
            $Beef_price = $_POST['Price2'];
            $Beef_num = $_POST['num2'];
            $total2 = $Beef_num*$Beef_price;
            //print"牛肉".$Beef_num."個，共".$total2."元";
        }
        if (isset($_POST['Seafood'])) 
        {
            //print "<h1>Seafood is checked!</h1><br/>";
            $Seafood_price = $_POST['Price3'];
            $Seafood_num = $_POST['num3'];
            $total3 = $Seafood_num*$Seafood_price;
            //print"海鮮".$Seafood_num."個，共".$total3."元";
        }
        $total = $total1+$total2+$total3;
        $format_total2 = number_format($total, 2);//顯示小數點後兩位
        print"NT$".$format_total2;
    ?>

    </body>

</html>