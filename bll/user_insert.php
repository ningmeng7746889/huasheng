<?php
    $db = include("../config.inc.php");
    //�ռ�����Ϣҳ��
    //echo $db['DB_NAME'];


    //���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
    $username   = $_POST["username"];
    $password = $_POST["password"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    
    $id= time();
    
    $sql = "insert into think_user (id,username,password,createtime,ip) values ('$id','$username','$password','$id','127.0.0.1')";

    $qry = mysql_query($sql);

    //���ٶ�λ������Ϣ
    echo mysql_error();

    if($qry){
        //����ͨ��js�����û����
        //ͨ�����������һ��js����
        $js = <<<eof
            <script type="text/javascript">
                alert("�����ɹ�");
                location.href="../admin/user_list.php"; //ҳ���ض���

            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("����ʧ��");
                location.href="../admin/user_list.php"; //ҳ���ض���
            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    }

?>