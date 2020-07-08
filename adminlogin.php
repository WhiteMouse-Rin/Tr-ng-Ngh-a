
<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
    //Kết nối tới database
    include('./Connect.php');
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($link,"SELECT username, password FROM member WHERE username='$username'");
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";  
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
   
   
    if(role == 2){
         echo "Xin chào " .$_SESSION['$username'] . "";
        echo "Bạn đăng nhập bằng admin <a href='admin.php'>Trang admin</a>";
        die();
    }
 else {
       echo "Xin chào " . $username . "";
    echo ". Bạn đã đăng nhập thành công. <a href='homepage.html'>Về trang chủ</a>";
    die(); 
    }
}
$id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    </head>
    <style>
            * {
                margin: 0;
                padding: 0;
            }

            body {
                background: #1FCE6D;
                color: black;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url(../Project/img/banner1.jpg);
            }
            .form-box{
                width: 420px;
                height: 300px;
                position: relative;
                margin: 6% auto;
                background :#fff;
                padding: 5px;
            }

            h2 {
                color: #1FCE6D;
                text-align: center;
                font-size: 3.6em;
                margin-bottom: 30px;
                font-family: Arial, Helvetica, sans-serif;
            }

            .register {
                width: 350px;
                position: absolute;
                top: 10px;
                left: 50px;
                margin-left: 550px;
            }

            input[type="text"],
            input[type="password"] {
                width: 350px;
                padding: 20px 0px;
                background: transparent;
                border: 0;
                border-bottom: 1px solid;
                outline: none;
                color: rgb(133, 161, 161);
                font-size: 14px;
                margin-top: 10px;
            }

            input[type="checkbox"] {
                display: none;
            }

            label {
                display: block;
                position: absolute;
                margin-right: 10px;
                width: 8px;
                height: 8px;
                border-radius: 60px;
                background: transparent;
                transition: all;
                cursor: pointer;
                border: 3px solid rgb(114, 114, 114);
            }

            #agree:checked~label[for="agree"] {
                background: #435160;
            }

            input[type="submit"],
            [type="reset"] {
                background: green;
                border: 0;
                width: 350px;
                height: 40px;
                border-radius: 3px;
                color: white;
                font-size: 12px;
                cursor: pointer;
                transition: background 0.3 ease-in-out;
                margin-bottom: 15px;
            }

            input[type="submit"],
            [type="reset"]:hover {
                background: green;
                animation-name: shake;
            }

            .forgot {
                margin-top: 20px;
                display: block;
                font-size: 11px;
                text-align: center;
                font-weight: bold;
            }

            .agree {
                padding: 30px 0px;
                font-size: 12px;
                text-indent: 25px;
                line-height: 15px;
            }

            .animated {
                animation-fill-mode: both;
                animation-duration: 1s;
                margin-top: 500px;
                margin-left: 500px;
            }

            @keyframes shake {
                0%,
                100% {
                    transform: translateX(0);
                }
                10%,
                30%,
                50%,
                70%,
                90% {
                    transform: translateX(-10px);
                }
                20%,
                40%,
                60%,
                80% {
                    transform: translateX(10px);
                }
            }

            input[type="radio"] {
                margin-right: 10px;
                width: 15px;
                height: 25px;
                border-radius: 60px;
                background: transparent;
                transition: all;
                cursor: pointer;
                border: 3px solid;
                margin-top: 10px;
                margin-right: 9px;
            }

            input[type="date"] {
                background: white;
                color: rgb(146, 144, 144);
                padding: 1px;
                margin-top: 15px;
                text-align: center;
                margin-left: 90px;
            }

            .gen {
                padding: 20px 0px;
                font-size: 13px;
                text-indent: 2px;
                line-height: 10px;
                margin-right: 40px;
            }
        </style>
    <body>
       
        <form action='' method='POST'>
            <div class="form-box">
            <h2>Login</h2>
            
            <table cellpadding='0' cellspacing='0' border='1'>
                <tr>
                    <td>
                        Tên đăng nhập :
                    </td>
                    <td>
                        <input type='text' name='txtUsername' />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu :
                    </td>
                    <td>
                        <input type='password' name='txtPassword' />
                    </td>
                </tr>
            </table>
            <div>
            <input type='submit' name="dangnhap" href="homepage.html" value='Đăng nhập' />
            <a href='register.php' title='Đăng ký'>Đăng ký</a>
        </form>
    
        
    </body>
</html>