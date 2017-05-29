<?php
    $db = include("../config.inc.php");
    //收集表单信息页面
    //echo $db['DB_NAME'];
    //通过post方式来接收表单信息
    //$_POST['f_method']
    //$_POST['f_method_v']
    //$_POST['f_title']
    //$_POST['f_content']

    //post是一个数组，我们输出下
    //print_r($_POST);

    //把提交过来的信息处理下，使用简单变量重新接收下
	$id   = $_POST["id"];
    $title   = $_POST["title"];
    $date = $_POST["date"];
    $contents    = $_POST["contents"];
	$status = $_POST["status"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    
    $sql = "update news set title='$title',create_date='$date',contents='$contents',status='$status' where id='$id' ";

    $qry = mysql_query($sql);

    //快速定位错误信息
    echo mysql_error();

    if($qry){
        //我们通过js改善用户体检
        //通过定界符定义一段js代码
        $js = <<<eof
            <script type="text/javascript">
                alert("修改成功");
                location.href="../admin/news_list.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("修改失败");
                location.href="../admin/news_list.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
    }

?>