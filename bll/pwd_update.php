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
	
	$username=$_POST["username"];
	
	$link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
	mysql_select_db($db["DB_NAME"], $link);	
	mysql_query('set names utf8');
	
	$sql_select = "select * from think_user where username='$username' ";

    $qry_select = mysql_query($sql_select);
    //���ύ��������Ϣ�����£�ʹ�ü򵥱������½�����
	$rzt_select = mysql_fetch_assoc($qry_select);
	$pwd_select = $rzt_select['password'];
	$pwd_ys = $_POST["pwd_ys"];
	$pwd1   = $_POST["pwd1"];
	$pwd2   = $_POST["pwd2"];
	
	
	if($pwd_ys != $pwd_select){//ԭ���벻��ȷ
		        $js = <<<eof
            <script type="text/javascript">
                alert("ԭ���벻��ȷ");
                location.href="../admin/pwd_update.php"; //ҳ���ض���
            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
	}else if($pwd1 != $pwd2){//������������벻һ��
				        $js = <<<eof
            <script type="text/javascript">
                alert("������������벻һ��");
                location.href="../admin/pwd_update.php"; //ҳ���ض���
            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
	}else{


    
		$sql = "update think_user set password='$pwd1' where username='$username' ";

		$qry = mysql_query($sql);

		//���ٶ�λ������Ϣ
		echo mysql_error();

		if($qry){
			//����ͨ��js�����û����
			//ͨ�����������һ��js����
			$js = <<<eof
            <script type="text/javascript">
                alert("�޸ĳɹ�");
                location.href="../admin/pwd_update.php"; //ҳ���ض���

            </script>
eof;
        echo $js; //��������ͻ�ִ��js����
		} else {
			$js = <<<eof
            <script type="text/javascript">
                alert("�޸�ʧ��");
                location.href="../admin/pwd_update.php"; //ҳ���ض���
            </script>
eof;
			echo $js; //��������ͻ�ִ��js����
		}
	
	}//else

?>