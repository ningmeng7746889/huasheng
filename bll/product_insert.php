<?php
    $db = include("../config.inc.php");
	header('Content-Type: text/html; charset=UTF-8');
    //�ռ�����Ϣҳ��
    //echo $db['DB_NAME'];
    //ͨ��post��ʽ�����ձ���Ϣ
    //$_POST['f_method']
    //$_POST['f_method_v']
    //$_POST['f_title']
    //$_POST['f_content']

    //post��һ�����飬���������
    //print_r($_POST);
	$id=uniqid();
    //���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
    $name = $_POST["name"];
    $date = $_POST["date"];
    $contents = $_POST["contents"];
	$status = $_POST["status"];
	$type = $_POST["type"];
	
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

		$allow_type = array('jpg','jpeg','gif','png'); //���������ϴ�������
		//�ж��ļ������Ƿ������ϴ�
		if(!in_array($filetype, $allow_type)){
		  //�������������ֱ��ֹͣ��������
		  echo "�벻Ҫ�ϴ���'jpg','jpeg','gif','png'��ͼƬ��";
		  return ;
		}
		//�ж��Ƿ���ͨ��HTTP POST�ϴ���
		// if(!is_uploaded_file($_FILES["file"]["tmp_name"])){
		  // return ;
		// }
		$upload_path = "upload/"; //�ϴ��ļ��Ĵ��·��
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
    

    
    $sql = "insert into product (id,name,status,type,contents,create_date,picture_url) values ('$id','$name','$status','$type','$contents','$date','$url')";

    $qry = mysql_query($sql);

    //���ٶ�λ������Ϣ
    echo mysql_error();

    if($qry){
        //����ͨ��js�����û����
        //ͨ�����������һ��js����
        $js = <<<eof
            <script type="text/javascript">
                alert("Successfully");
                location.href="../admin/product_list.php"; //ҳ���ض���

            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("Failed");
                location.href="../admin/product_list.php"; //ҳ���ض���
            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    }

?>