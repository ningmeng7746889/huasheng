<?php
    $db = include("../config.inc.php");
	header('Content-Type: text/html; charset=UTF-8');
    //收集表单信息页面
    //echo $db['DB_NAME'];
    //通过post方式来接收表单信息
    //$_POST['f_method']
    //$_POST['f_method_v']
    //$_POST['f_title']
    //$_POST['f_content']

    //post是一个数组，我们输出下
    //print_r($_POST);
	$id=uniqid();
    //把提交过来的信息处理下，使用简单变量重新接收下
    $name = $_POST["name"];
    $date = $_POST["date"];
    $contents = $_POST["contents"];
	$status = $_POST["status"];
	$type = $_POST["type"];
	
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

		$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
		//判断文件类型是否被允许上传
		if(!in_array($filetype, $allow_type)){
		  //如果不被允许，则直接停止程序运行
		  echo "请不要上传非'jpg','jpeg','gif','png'的图片！";
		  return ;
		}
		//判断是否是通过HTTP POST上传的
		// if(!is_uploaded_file($_FILES["file"]["tmp_name"])){
		  // return ;
		// }
		$upload_path = "upload/"; //上传文件的存放路径
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
    

    
    $sql = "insert into product (id,name,status,type,contents,create_date,picture_url) values ('$id','$name','$status','$type','$contents','$date','$url')";

    $qry = mysql_query($sql);

    //快速定位错误信息
    echo mysql_error();

    if($qry){
        //我们通过js改善用户体检
        //通过定界符定义一段js代码
        $js = <<<eof
            <script type="text/javascript">
                alert("Successfully");
                location.href="../admin/product_list.php"; //页面重定向

            </script>
eof;
        echo $js; //输出变量就会执行js代码
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("Failed");
                location.href="../admin/product_list.php"; //页面重定向
            </script>
eof;
        echo $js; //输出变量就会执行js代码
    }

?>