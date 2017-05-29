<?php
    $db = include("../config.inc.php");
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

    //post是一个数组，我们输出下
    //print_r($_POST);
	$id   = $_POST["id"];
    $name   = $_POST["name"];
    $date = $_POST["date"];

	$status = $_POST["status"];
	$user=$_SESSION['username'];
	
	$link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');

	if (!is_uploaded_file($_FILES['file']['tmp_name'])) 
	{ 
		$sql = "update file set name='$name',create_date='$date',status='$status',create_user='$user' where id='$id' ";

		$qry = mysql_query($sql);
	} else
	{
		$sql_select = "select file_url from file where id='$id' ";
		$qry_select = mysql_query($sql_select);
		$rzt_select = mysql_fetch_assoc($qry_select);
		$fileurl_ys=$rzt_select['file_url'];
		
		
		$filename = $_FILES["file"]["name"];
		echo $filename."<br />";

		//$file = $_FILES['file'];//得到传输的数据
		//得到文件名称
		$filetype = strtolower(substr($filename,strrpos($filename,'.')+1)); //得到文件类型，并且都转化成小写
		echo $filetype."<br />";
		$filename=$id.".".$filetype;    //将上传的图片重命名，以防止重命名造成的覆盖
		echo $filename."<br />";


		$upload_path = "doc/"; //上传文件的存放路径
		//开始移动文件到相应的文件夹
		if(move_uploaded_file($_FILES["file"]["tmp_name"],"../".$upload_path.$filename)){
		  echo "Successfully!";
		}else{
		  echo "Failed!";
		}
		$url=$upload_path.$filename;

		$sql = "update file set name='$name',create_date='$date',status='$status',create_user='$user',file_url='$url' where id='$id' ";

		$qry = mysql_query($sql);
	}
	
    //把提交过来的信息处理下，使用简单变量重新接收下
    


    //快速定位错误信息
    echo mysql_error();

    if($qry){
		
		unlink("../".$fileurl_ys);
		
        //我们通过js改善用户体检
        //通过定界符定义一段js代码
        $js = <<<eof
            <script type="text/javascript">
                alert("修改成功");
                location.href="../admin/file_list.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("修改失败");
                location.href="../admin/file_list.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
    }

?>