<?php
    $db = include("../config.inc.php");
	header('Content-Type: text/html; charset=UTF-8');
    //收集表单信息页面
	session_start();
	$id=uniqid();
    //把提交过来的信息处理下，使用简单变量重新接收下
    $name = $_POST["name"];
    $date = $_POST["date"];

	$status = $_POST["status"];
	$user=$_SESSION['username'];

	//文件上传
	if ($_FILES["file"]["error"] > 0) 
	{ 
		echo "Error: " . $_FILES["file"]["error"] . "<br />"; 
	} else
	{

		$filename = $_FILES["file"]["name"];
		echo $filename."<br />";

		
		//$file = $_FILES['file'];//得到传输的数据
		//得到文件名称
		$filetype = strtolower(substr($filename,strrpos($filename,'.')+1)); //得到文件类型，并且都转化成小写
		echo $filetype."<br />";
		$filename=$id.".".$filetype;    //将上传的图片重命名，以防止重命名造成的覆盖
		echo $filename."<br />";

		//判断是否是通过HTTP POST上传的
		// if(!is_uploaded_file($_FILES["file"]["tmp_name"])){
		  // return ;
		// }
		$upload_path = "doc/"; //上传文件的存放路径
		//开始移动文件到相应的文件夹
		if(move_uploaded_file($_FILES["file"]["tmp_name"],"../".$upload_path.$filename)){
		  echo "Successfully!";
		}else{
		  echo "Failed!";
		}
	}
	$url=$upload_path.$filename;
	echo $url;
	
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    

    
    $sql = "insert into file (id,name,status,file_url,create_date,create_user) values ('$id','$name','$status','$url','$date','$user')";

    $qry = mysql_query($sql);

    //快速定位错误信息
    echo mysql_error();

    if($qry){
        //我们通过js改善用户体检
        //通过定界符定义一段js代码
        $js = <<<eof
            <script type="text/javascript">
                alert("Successfully");
                location.href="../admin/file_list.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("Failed");
                location.href="../admin/file_create.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
    }

?>