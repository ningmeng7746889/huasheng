<?php
    $db = include("../config.inc.php");
	header('Content-Type: text/html; charset=UTF-8');
    //�ռ�����Ϣҳ��
	session_start();
	$id=uniqid();
    //���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
    $name = $_POST["name"];
    $date = $_POST["date"];

	$status = $_POST["status"];
	$user=$_SESSION['username'];

	//�ļ��ϴ�
	if ($_FILES["file"]["error"] > 0) 
	{ 
		echo "Error: " . $_FILES["file"]["error"] . "<br />"; 
	} else
	{

		$filename = $_FILES["file"]["name"];
		echo $filename."<br />";

		
		//$file = $_FILES['file'];//�õ����������
		//�õ��ļ�����
		$filetype = strtolower(substr($filename,strrpos($filename,'.')+1)); //�õ��ļ����ͣ����Ҷ�ת����Сд
		echo $filetype."<br />";
		$filename=$id.".".$filetype;    //���ϴ���ͼƬ���������Է�ֹ��������ɵĸ���
		echo $filename."<br />";

		//�ж��Ƿ���ͨ��HTTP POST�ϴ���
		// if(!is_uploaded_file($_FILES["file"]["tmp_name"])){
		  // return ;
		// }
		$upload_path = "doc/"; //�ϴ��ļ��Ĵ��·��
		//��ʼ�ƶ��ļ�����Ӧ���ļ���
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

    //���ٶ�λ������Ϣ
    echo mysql_error();

    if($qry){
        //����ͨ��js�����û����
        //ͨ�����������һ��js����
        $js = <<<eof
            <script type="text/javascript">
                alert("Successfully");
                location.href="../admin/file_list.php"; //ҳ���ض���

            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("Failed");
                location.href="../admin/file_create.php"; //ҳ���ض���
            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    }

?>