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
    $name   = $_POST["name"];
    $email = $_POST["email"];
    $message    = $_POST["message"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    
    $id=uniqid();
    
    $sql = "insert into message values ('$id','$name','$email','$message',now())";

    $qry = mysql_query($sql);

    //快速定位错误信息
    echo mysql_error();

    if($qry){
        //我们通过js改善用户体检
        //通过定界符定义一段js代码
        $js = <<<eof
            <script type="text/javascript">
                alert("留言成功");
                location.href="../contact.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("留言失败");
                location.href="../contact.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
    }

?>