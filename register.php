<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css" />
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js">
        </script>
        <title>Register</title>
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
                height: 662px;
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
    </head>

    <body>
        
            <div class="register">
                <div class="form-box">
                <form action="xuly.php" id="contactForm" method="post" class="form-horizontal">
                    <h2>Register</h2>
                    <input type="text" name="txtUsername" id="fullname" placeholder="Username" required>
                    <input type="password" name="txtPassword" id="Pass" placeholder="Password" required>
                    <input type="text" name="txtFullname" id="fullname" placeholder="Fullname" required>
                    <input type="text" name="txtEmail"  placeholder="Email" required>
                    <input type="date" name="txtBirthday" id="txtBirthday">
                    <div>
                        <select name="txtSex">

                            <option value=""></option>
                            <option value="Nam">Nam</option>
                            <option value="Nu">Nữ</option>
                        </select>
                    </div>

                    <div class="submit">
                        <input type="submit" value="Register">
                    </div>
                    <div class="reset">
                        <input type="reset" value="Reset">
                    </div>
                    <div>
                        <a class="forgot" href="login.php">Already have an account ?</a>
                </form>
                       </div>
            </div>


     
    </div>
</body>


</html>
