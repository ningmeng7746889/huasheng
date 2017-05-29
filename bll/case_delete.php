<?php 
//收集表单信息页面
    $db = include("../config.inc.php");
	header('Content-Type: text/html; charset=UTF-8');
    //把提交过来的信息处理下，使用简单变量重新接收下
    $id   = $_GET["id"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
	
	$sql_select = "select picture_url from solution where id='$id' ";
	$qry_select = mysql_query($sql_select);
	$rzt_select = mysql_fetch_assoc($qry_select);
	$fileurl=$rzt_select['picture_url'];
	
	
    $sql = "delete from solution where id='$id' ";

    $qry = mysql_query($sql);
	if($qry)
	{
		unlink("../".$fileurl);
		echo "删除成功！";
	}
	else{
		echo "删除失败！";
		return ;
	}

    //快速定位错误信息
    echo mysql_error();

    if($qry){
    //我们通过js改善用户体检
    //通过定界符定义一段js代码
    $js = <<<eof
            <script type="text/javascript">
                alert("删除成功");
                location.href="../admin/case_list.php"; //页面重定向

            </script>
eof;
    echo $js; //输出变量就会执行js代码
    } else {
    $js = <<<eof
            <script type="text/javascript">
                alert("删除失败");
                location.href="../admin/case_list.php"; //页面重定向
            </script>
eof;
    echo $js; //输出变量就会执行js代码
    }

?>