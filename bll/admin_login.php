<?php 
$db = include("../config.inc.php");

//���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
$username   = $_POST["username"];
$password = $_POST["password"];

$link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
mysql_select_db($db["DB_NAME"], $link);
mysql_query('set names utf8');

$sql = "select * from think_user where username='".$username."' and password='".$password."'";

$qry = mysql_query($sql);
$user=mysql_fetch_assoc($qry);
mysql_free_result($qry);//�ͷ��ڴ�

//���ٶ�λ������Ϣ
echo mysql_error();

if(($user['username']==$username) && ($user['password']==$password)){
    session_start();                            //��־Session�Ŀ�ʼ
    //�ж��û���Ȩ����Ϣ�Ƿ���Ч�����Ϊ1��0��˵����Ч

    $_SESSION['username'] = $user['username'];
    //����ͨ��js�����û����
    //ͨ�����������һ��js����
    $js = <<<eof
            <script type="text/javascript">
                location.href="../admin/admin.php"; //ҳ���ض���
            </script>
eof;
    echo $js; //��������ͻ�ִ��js����
} else {
    $js = <<<eof
            <script type="text/javascript">
                alert("�˺Ż�����������������룡");
                location.href="../admin/login.html"; //ҳ���ض���
            </script>
eof;
    echo $js; //��������ͻ�ִ��js����
}
mysql_close();
?>