<?php
    $db = include("../config.inc.php");
    //�ռ�����Ϣҳ��
    //echo $db['DB_NAME'];
    //ͨ��post��ʽ�����ձ���Ϣ
    //$_POST['f_method']
    //$_POST['f_method_v']
    //$_POST['f_title']
    //$_POST['f_content']

    //post��һ�����飬���������
    //print_r($_POST);

    //���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
    $name   = $_POST["name"];
    $email = $_POST["email"];
    $message    = $_POST["message"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');
    
    $id=uniqid();
    
    $sql = "insert into message values ('$id','$name','$email','$message',now())";

    $qry = mysql_query($sql);

    //���ٶ�λ������Ϣ
    echo mysql_error();

    if($qry){
        //����ͨ��js�����û����
        //ͨ�����������һ��js����
        $js = <<<eof
            <script type="text/javascript">
                alert("���Գɹ�");
                location.href="../contact.php"; //ҳ���ض���

            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    } else {
        $js = <<<eof
            <script type="text/javascript">
                alert("����ʧ��");
                location.href="../contact.php"; //ҳ���ض���
            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
    }

?>