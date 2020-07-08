  
<?php
    
    //Kiểm tra xem form điều chỉnh trang [Ass02_Admin.php]
    if (isset($_GET["btnOK"]) == FALSE) {
        header("location:admin.php");
        exit();
    }
    
    //Lấy connection
    include_once '../ThuVien/connectDB_phpDB.php';
    
    //Lấy hết dữ liệu của form điều chỉnh để lưu lên databse
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    $fullname   = addslashes($_POST['txtFullname']);
    $birthday   = addslashes($_POST['txtBirthday']);
    $sex        = addslashes($_POST['txtSex']);
        
    
    //Viết lệnh update
    $sql ="UPDATE member SET fullname='$fullname',email='$email',password='$password',birthday='$birthday',sex='$sex' WHERE username='$username' ;";
    
    //Thi hành lệnh truy vấn từ biến connection
    $r= mysqli_query($link, $sql);
    
    if($r==FALSE){
        echo "<h3 style='color:blue'>Lỗi sai Điều Chỉnh thông tin Employee</h3>";
        exit();
    }
    else{
    //quay ve lai trang danh sach lop
    header("location:admin.php");
    }
    
    
?>
