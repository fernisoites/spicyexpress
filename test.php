<?php
require_once 'dbConfig.php';
session_start();

$error_msg = "";


        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_email = 'irisfeng625@gmail.com';

            $query = "SELECT tracknum FROM users WHERE email = '$user_email'";
            //用用户名和密码进行查询
            $data = mysqli_query($dbc,$query);
            //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
        echo $data



    </body>
</html>
</html>