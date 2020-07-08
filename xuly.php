<?php
  
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['txtUsername'])){
        die('');
    }
     
    //Nhúng file kết nối với database
    include('../Project/Connect.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    $fullname   = addslashes($_POST['txtFullname']);
    $birthday   = addslashes($_POST['txtBirthday']);
    $sex        = addslashes($_POST['txtSex']);
    
   
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
        // Mã khóa mật khẩu
        $password = md5($password);
          
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
        
     if (mysqli_num_rows(mysqli_query($link,"SELECT username FROM member WHERE username='$username'")) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email có đúng định dạng hay không
    if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^", $email))
    {
        echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($link,"SELECT email FROM member WHERE email='$email'")) > 0)
    {
//        var_dump($email);die();   
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Kiểm tra dạng nhập vào của ngày sinh
    if (!preg_match("^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))^", $birthday))
    {
//        var_dump($birthday);die();
            echo "Ngày tháng năm sinh không hợp lệ. Vui long nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
    $data = array($username,$password,$email,$fullname,$sex,$birthday);
    
   
    $query =  "INSERT INTO member(username,password,email,fullname,sex,birthday) VALUES ('".implode("','", $data)."')";
    //Lưu thông tin thành viên vào bảng
    
    
    
    $addmember = mysqli_query($link,$query);
                          
    //Thông báo quá trình lưu
    if ($addmember)
        echo "Quá trình đăng ký thành công. <a href='homepage.html'>Về trang chủ</a>"
        . "<pre>Username: ".$_POST['txtUsername']." <pre>"
            . "<pre>Email: ".$_POST['txtEmail']." <pre>"
            . "<pre>Full name: ".$_POST['txtFullname']." <pre>"
            . "<pre>Birthday: ".$_POST['txtBirthday']." <pre>"
            . "<pre>Sex: ".$_POST['txtSex']." <pre>";
    else{
        var_dump($query);die();
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='register.php'>Thử lại</a>";
    
    }
?>