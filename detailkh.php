<?php
    
if(isset($_POST["txtUsername"])==FALSE){
    header("location:detail.php");
    exit();
}
include_once '../ProjectHK2/Connect.php';
$name = $_POST["txtUsername"];
// viết câu lệnh sql để trích ra mẫu tin có lớp học trùng vs biến id
$sql = "select * from member where Username like '$username'";
// thi hành biến connetion
$r = mysqli_query($link, $sql);

if($r == FALSE || mysqli_num_rows($r)==0    ){
    echo "<h3>Erorr [$username]</h3>";
    exit();
}
// lấy thông tin lớp học ra
$ten = mysqli_fetch_row($r);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Details</title>
    </head>
    <body>
        <h2>Product</h2>
        <?php
        echo "<p> <b> ProductID : </b>$ten[0]</p>";
         echo "<p> <b>ProductName : </b>$ten[1]</p>";
          echo "<p> <b>UnitPrice: </b>$ten[2]</p>";
           echo "<p> <b>Quantity : </b>$ten[3]</p>";
        ?>
        <hr>
        <a href="index.php">Back To List</a>
    </body>
</html>
