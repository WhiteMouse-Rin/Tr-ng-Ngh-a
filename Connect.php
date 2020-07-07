<?php

/* 
 *Ham` kết nối Database
 *      CSDL : tên 1907db. tài khoản đăng nhập : root, password 
 * 
 */
$severDB    = "localhost:3306";
$dbname = "projecthk2";
$username = "root";
$password ="";
$link = mysqli_connect($severDB,$username,$password, $dbname);
if($link == null){
    echo 'Lỗi kết nối';
}
?>