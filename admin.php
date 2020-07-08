
<?php
session_start();
include_once '../ThuVien/connectDB_phpDB.php';
if (isset($_SESSION["txtUsername"]) == FALSE) {
    header("location:login.php");
    exit();
}
if ($_SESSION["role"] == 2) {
    header("location:login.php");
    exit();
}
$name = $_SESSION["txtUsername"];
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách tài khoản</title>
        <!--        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Font Google -->
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link href="Ass02_Table.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <h2>Danh sách tài khoản khách hàng</h2>
           

            <hr>

            <table class="table tab-content ">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                         <th>Fullname</th>
                          <th>Birthday</th>
                        <th>Sex</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from member";
                    $r = mysqli_query($link, $sql);

                    $a_emp = mysqli_fetch_all($r);
                    foreach ($a_emp as $item) {
                        echo '<tr>';
                        echo "<td> $item[0] </td>";
                        echo "<td> $item[2] </td>";
                        echo "<td> $item[3] </td>";
                        echo "<td> $item[4] </td>";
                        echo "<td> $item[5] </td>";
                        echo "<td> $item[6] </td>";

                        echo "<td>";
                        if ($name != $item[0]) {
                            echo "<a href='Ass02_EditEmp.php?id=$item[0]'>Edit</a> | ";
                            echo "<a href='Ass02_DeleteEmp.php?id=$item[0]' onclick= 'return kt()'>Delete</a>";
                        } else {
                            echo "&nbsp; ";
                        }
                        echo "</td>";
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <script>
            function kt() {
                return confirm("Are you sure ?");
            }
        </script>
    </body>
</html>