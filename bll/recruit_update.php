<?php
    $db = include("../config.inc.php");
    //收集表单信息页面
	session_start();

    //把提交过来的信息处理下，使用简单变量重新接收下
	$id   = $_POST["id"];
    $name   = $_POST["name"];
    $date = $_POST["date"];
    $duty    = $_POST["duty"];
	$requirement    = $_POST["requirement"];
	$status = $_POST["status"];
	$user = $_SESSION["username"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    
    $sql = "update recruit set name='$name',create_date='$date',duty='$duty',status='$status',requirement='$requirement',create_user='$user' where id='$id' ";

    $qry = mysql_query($sql);

    //快速定位错误信息
    echo mysql_error();

    if($qry){
        //我们通过js改善用户体检
        //通过定界符定义一段js代码
        $js = <<<eof
            <script type="text/javascript">
                alert("修改成功");
                location.href="../admin/recruit_list.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("修改失败");
                location.href="../admin/recruit_list.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
    }

?>