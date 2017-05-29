<?php  
    error_reporting(E_ALL & ~E_DEPRECATED);
    
    $db = include("../config.inc.php");
    $id   = $_GET["id"];

    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);
    mysql_query('set names utf8');

    $sql = "select * from message where id='$id' ";

    $qry = mysql_query($sql);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <table style="margin:5px;width:700px;" cellpadding="0" cellspacing="0" border="1">
        <tr><th style="width:15%;"></th>
        <th style="width:80%"></th></tr>
               <?php
                        while($rzt = mysql_fetch_assoc($qry)){
                            ?>
        <tr><td>留言人</td><td><?php echo $rzt['name']; ?></td></tr>
        <tr><td>联系方式</td><td><?php echo $rzt['email']; ?></td></tr>
         <tr><td>留言内容</td><td><?php echo $rzt['message']; ?></td></tr>
          <tr><td>留言时间</td><td><?php echo $rzt['create_date']; ?></td></tr>
           <tr><td>是否删除</td><td><a href="../bll/message_delete.php?id=<?php echo $rzt['id']; ?>" title="删除"><img src="../public/Images/admin/icons/cross.png" alt="删除" /></a></td></tr>
 
                        <?php
                        }
                        mysql_close();
                        ?>
          </table>
</body>
</html>