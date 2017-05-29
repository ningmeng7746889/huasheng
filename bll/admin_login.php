<?php 
$db = include("../config.inc.php");

//把提交过来的信息处理下，使用简单变量重新接收下
$username   = $_POST["username"];
$password = $_POST["password"];

$link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
mysql_select_db($db["DB_NAME"], $link);
mysql_query('set names utf8');

$sql = "select * from think_user where username='".$username."' and password='".$password."'";

$qry = mysql_query($sql);
$user=mysql_fetch_assoc($qry);
mysql_free_result($qry);//释放内存

//快速定位错误信息
echo mysql_error();

if(($user['username']==$username) && ($user['password']==$password)){
    session_start();                            //标志Session的开始
    //判断用户的权限信息是否有效，如果为1或0则说明有效

    $_SESSION['username'] = $user['username'];
    //我们通过js改善用户体检
    //通过定界符定义一段js代码
    $js = <<<eof
            <script type="text/javascript">
                location.href="../admin/admin.php"; //页面重定向
            </script>
eof;
    echo $js; //输出变量就会执行js代码
} else {
    $js = <<<eof
            <script type="text/javascript">
                alert("账号或密码错误！请重新输入！");
                location.href="../admin/login.html"; //页面重定向
            </script>
eof;
    echo $js; //输出变量就会执行js代码
}
mysql_close();
?>