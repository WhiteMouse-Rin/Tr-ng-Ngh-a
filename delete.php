<?php
include_once '../HK2/Connect.php';
    if(isset($_GET['id']) and $_GET['id'] != ''){
        $sql = "DELETE from member where id = ".$_GET['id']."";
        $query = mysqli_query($link, $sql);
        if($query){
            header('Location:admin.php');
        }else{
            echo 'Xoa that bai';
        }
    }
    