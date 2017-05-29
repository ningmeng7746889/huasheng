<?php
    session_start();
    unset($_SESSION['username']);
    //我们通过js改善用户体检
    //通过定界符定义一段js代码
    $js = <<<eof
            <script type="text/javascript">
                location.href="../admin/admin.php"; //页面重定向
            </script>
eof;
    echo $js; //输出变量就会执行js代码
?>