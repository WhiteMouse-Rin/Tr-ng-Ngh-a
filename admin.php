
<?php
session_start();
include_once '../HK2/Connect.php';

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
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <body>
        <div class="container">
            <h2>Danh sách tài khoản khách hàng</h2>
           

            <hr>

            <table class="table tab-content ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Username</th>
                        
                        <th>Email</th>
                         <th>Fullname</th>
                          <th>Birthday</th>
                        <th>Sex</th>
                        
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
                        echo "<td> $item[1] </td>";
                        
                        echo "<td> $item[3] </td>";
                        echo "<td> $item[4] </td>";
                        echo "<td> $item[5] </td>";
                        echo "<td> $item[6] </td>";

                        echo "<td>";
                    
                            echo "<a href='edit_info.php?id=$item[0]'>Edit</a> | ";
                            echo "<a href='delete.php?id=$item[0]' onclick= 'return kt()'>Delete</a>";
                     
                        
                        echo "</td>";
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <script>
            function kt() {
                return confirm("Bạn có chắc chắn muốn xoá?");
            }
        </script>
    </body>
</html>