                                                                                                                                                                                                                                                        <?php
include_once '../Project/Connect.php';
?>
<!DOCTYPE html>
<!--
In ra danh sách khách hàng
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>Tài Khoản</title>
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
            <table class="tab-content">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Paassword
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Fullname
                        </th>
                        <th>
                            Birthday
                        </th>
                        <th>
                            Sex
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "select * from member";
                    $r = mysqli_query($link, $sql);
                    $a_lophoc = mysqli_fetch_all($r);

                    foreach ($a_lophoc as $item) {
                        echo '<tr>';
                        echo "<td> $item[0] </td>";
                        echo "<td> $item[1] </td>";
                        echo "<td> $item[2] </td>";
                        echo "<td> $item[3] </td>";
                        echo "<td> $item[4] </td>";
                        echo "<td> $item[5] </td>";
                          echo "<td>";
                          echo "<a href='detail.php?txtUsername=$item[0]'>Display</a> | ";
                          echo "<a href='Lab07_SuaLop.php?id=$item[0]'>Edit</a> | ";
                          echo "<a href='Lab07_XoaLop.php?id=$item[0]'>Remove</a>";
                          echo "</td>";
                          echo '</tr>';
                        
                    }
                    ?>
                </tbody>
            </table>
    </body>
</html>
