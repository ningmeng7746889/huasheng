<?php 
//�ռ�����Ϣҳ��
    $db = include("../config.inc.php");
    //���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
    $id   = $_GET["id"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');

    $sql = "delete from message where id='$id' ";

    $qry = mysql_query($sql);

    //���ٶ�λ������Ϣ
    echo mysql_error();

    if($qry){
    //����ͨ��js�����û����
    //ͨ�����������һ��js����
    $js = <<<eof
            <script type="text/javascript">
                alert("ɾ���ɹ�");
                location.href="../admin/admin.php"; //ҳ���ض���

            </script>
eof;
    echo $js; //��������ͻ�ִ��js����
    } else {
    $js = <<<eof
            <script type="text/javascript">
                alert("ɾ��ʧ��");
                location.href="../admin/admin.php"; //ҳ���ض���
            </script>
eof;
    echo $js; //��������ͻ�ִ��js����
    }

?>