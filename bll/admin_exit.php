<?php
    session_start();
    unset($_SESSION['username']);
    //����ͨ��js�����û����
    //ͨ�����������һ��js����
    $js = <<<eof
            <script type="text/javascript">
                location.href="../admin/admin.php"; //ҳ���ض���
            </script>
eof;
    echo $js; //��������ͻ�ִ��js����
?>