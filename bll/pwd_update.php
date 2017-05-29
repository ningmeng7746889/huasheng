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
	
	$username=$_POST["username"];
	
	$link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
	mysql_select_db($db["DB_NAME"], $link);	
	mysql_query('set names utf8');
	
	$sql_select = "select * from think_user where username='$username' ";

    $qry_select = mysql_query($sql_select);
    //把提交过来的信息处理下，使用简单变量重新接收下
	$rzt_select = mysql_fetch_assoc($qry_select);
	$pwd_select = $rzt_select['password'];
	$pwd_ys = $_POST["pwd_ys"];
	$pwd1   = $_POST["pwd1"];
	$pwd2   = $_POST["pwd2"];
	
	
	if($pwd_ys != $pwd_select){//原密码不正确
		        $js = <<<eof
            <script type="text/javascript">
                alert("原密码不正确");
                location.href="../admin/pwd_update.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
	}else if($pwd1 != $pwd2){//两次输入的密码不一致
				        $js = <<<eof
            <script type="text/javascript">
                alert("两次输入的密码不一致");
                location.href="../admin/pwd_update.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
	}else{


    
		$sql = "update think_user set password='$pwd1' where username='$username' ";

		$qry = mysql_query($sql);

		//快速定位错误信息
		echo mysql_error();

		if($qry){
			//我们通过js改善用户体检
			//通过定界符定义一段js代码
			$js = <<<eof
            <script type="text/javascript">
                alert("修改成功");
                location.href="../admin/pwd_update.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
		} else {
			$js = <<<eof
            <script type="text/javascript">
                alert("修改失败");
                location.href="../admin/pwd_update.php"; //页面重定向
            </script>
eof;
			echo $js; //输出变量就会执行js代码
		}
	
	}//else

?>