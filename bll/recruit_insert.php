<?php
    $db = include("../config.inc.php");
    //�ռ�����Ϣҳ��
	session_start();

    //���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
    $name   = $_POST["name"];
    $date = $_POST["date"];
    $duty    = $_POST["duty"];
	$requirement    = $_POST["requirement"];
	$status = $_POST["status"];
	$user = $_SESSION["username"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    
    $id=uniqid();
    
    $sql = "insert into recruit (id,name,status,duty,requirement,create_date,create_user) values ('$id','$name','$status','$duty','$requirement','$date','$user')";

    $qry = mysql_query($sql);

    //���ٶ�λ������Ϣ
    echo mysql_error();

    if($qry){
        //����ͨ��js�����û����
        //ͨ�����������һ��js����
        $js = <<<eof
            <script type="text/javascript">
                alert("�����ɹ�");
                location.href="../admin/recruit_list.php"; //ҳ���ض���

            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("����ʧ��");
                location.href="../admin/recruit_create.php"; //ҳ���ض���
            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    }

?>