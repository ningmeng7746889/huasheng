<?php
    $db = include("../config.inc.php");
    //收集表单信息页面
    //echo $db['DB_NAME'];


    //把提交过来的信息处理下，使用简单变量重新接收下
    $username   = $_POST["username"];
    $password = $_POST["password"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    
    $id= time();
    
    $sql = "insert into think_user (id,username,password,createtime,ip) values ('$id','$username','$password','$id','127.0.0.1')";

    $qry = mysql_query($sql);

    //快速定位错误信息
    echo mysql_error();

    if($qry){
        //我们通过js改善用户体检
        //通过定界符定义一段js代码
        $js = <<<eof
            <script type="text/javascript">
                alert("新增成功");
                location.href="../admin/user_list.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("新增失败");
                location.href="../admin/user_list.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
    }

?>