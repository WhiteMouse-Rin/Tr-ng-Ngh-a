<?php
include_once '../HK2/Connect.php';
    if(isset($_GET['id']) and $_GET['id'] != ''){
        $sql = "select * from member where id = ".$_GET['id']."";
        $query = $link->query($sql);
    
        $res = $query->fetch_assoc();
        if(mysqli_num_rows($query) == 0){
            echo" Id tai khoan khong hop le!";
            exit;
        }else{
            if (!empty($_POST) and isset($_POST['password']) and $_POST['password'] != ''){
                $pass = md5($_POST['password']);
                $sql = "UPDATE member set Username='".$_POST['username']."', Password ='".$pass."', Fullname='".$_POST['fullname']."', Email='".$_POST['email']."', Birthday='".$_POST['dob']."', Sex='".$_POST['sex']."' WHERE Id =".$_GET['id'];
                $res = $link->query($sql);
//                var_dump($sql);                    die();
                if($res){
                    header('Location:admin.php');
                }else{
                    echo"Cap nhap that bai";
                    sleep(5);
                    header('Location:admin.php');
                }
            }
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
<title>Chinh sua</title>
</head>
<body>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="Username">Tên tài khoản</label></td>
                <td><input name="username" type="text" value="<?=(isset($res['Username'])) ? $res['Username'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label for="Password">Mật khẩu</label></td>
                <td><input name="password" type="password" required></td>
            </tr>
            <tr>
                <td><label for="Fullname">Họ và tên</label></td>
                <td><input name="fullname" type="text" value="<?=(isset($res['Fullname'])) ? $res['Fullname'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label for="Email">Email</label></td>
                <td><input name="email" type="email" value="<?=(isset($res['Email'])) ? $res['Email'] : '' ?>"></td>
            </tr>
            
                <td><label for="Birthday">dob</label></td>
                <td><input name="dob" type="date" value="<?=(isset($res['Birthday'])) ? $res['Birthday'] : '' ?>"></td>
            
            <tr>
                <td><label for="Sex">Giới tính</label></td>
                <td><input name="sex" type="text" value="<?=(isset($res['Sex'])) ? $res['Sex'] : '' ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input name="submit" type="submit" value="Cap nhap"></td>
            </tr>
        </table>
    </form>

</body>
</html>