<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    session_start();
    if(isset($_SESSION['username']))
    {
        $db = include("../config.inc.php");
        $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
        mysql_select_db($db["DB_NAME"], $link);

        mysql_query('set names utf8');
        //写sql语句获得具体留言信息
        $time=date("Y-m-d",mktime(0,0,0,date("m"),date("d")-7,date("Y")));
        $sql = "select * from message where create_date>='".$time."' order by create_date desc ";
        //$qry = $mysqli->query($sql)
        $qry = mysql_query($sql);
    
    
        $sql2 = "select * from message where 1=1 order by create_date desc ";
        $qry2 = mysql_query($sql2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>华晟电子科技有限公司</title>


<?php 
	include "head.php";
?>
<!--<script type="text/javascript">
	function view(mid){
		alert(1);
        //显示div层
        //通过dom获得div层
        var mydiv = document.getElementById('ly'+mid);
        //通过dom设置css
        mydiv.style.display = "block";
	}
</script>-->
<style type="text/css">
td{
	text-align:center;
}
#title{
	vertical-align:middle; 
	display:block;
	float:left;
	font-weight:bold; 
	font-size:48px; 
	color:#666;
	margin-top:10px;
	margin-left:5px;
	font-family: "华文新魏", Arial, Helvetica, sans-serif;
}
#imgTitle{
	float:left;
}
p{
	font-size:24px;
}
a:hover{
	color:#red;
}
</style>
</head>

<body>
<div id="body-wrapper">

  <?php 
	include "left.php";
  ?>
  <!-- End #sidebar -->
  
  <div id="main-content">
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
	    <div class="notification error png_bg">
	      	<div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
	        Download From
	        </div>
	    </div>
    </noscript>
    
    
    <!-- Page Head -->
	<div id="Title"><img src="../images/childish_gears.png" style="float:left;" width="64px" height="64px">
    <span id="title">内容管理系统</span></div>
	<br></br>

    <div class="clear"></div>
    
    <div>
		<table width="960px" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		<th width="240px" style="text-align:center"></th>
		<th width="240px" style="text-align:center"></th>
		<th width="240px" style="text-align:center"></th>
		<th width="240px" style="text-align:center"></th>
		</tr>
		<tr>
		<td><a href="user_list.php"><img src="../images/add-card.png" width="128px" height="128px"><p>新增账户</p></a></td>
		<td><a href="pwd_update.php"><img src="../images/childish_key.png" width="128px" height="128px"><p>密码修改</p></a></td>
		<td><a href="message.php"><img src="../images/childish_clipboard.png" width="128px" height="128px"><p>当前留言</p></a></td>
		<td><a href="news_list.php"><img src="../images/childish_news.png" width="128px" height="128px"><p>公司新闻</p></a></td>
		</tr>
		<tr>
		<td><a href="trend_list.php"><img src="../images/childish_globe.png" width="128px" height="128px"><p>行业动态</p></a></td>
		<td><a href="product_list.php"><img src="../images/childish_medal.png" width="128px" height="128px"><p>产品发布</p></a></td>
		<td><a href="case_list.php"><img src="../images/table-1.png" width="128px" height="128px"><p>解决方案</p></a></td>
		<td><a href="file_list.php"><img src="../images/download.png" width="128px" height="128px"><p>资料下载</p></a></td>
		</tr>
		<tr>
		<td><a href="recruit_list.php"><img src="../images/list.png" width="128px" height="128px"><p>人才招聘</p></a></td>
		<td><a href="build.php"><img src="../images/childish_alert.png" width="128px" height="128px"><p>待开发</p></a></td>
		<td><a href="../index.php"><img src="../images/back-2.png" width="128px" height="128px"><p>门户首页</p></a></td>
		<td><a href="../bll/admin_exit.php"><img src="../images/childish_cross.png" width="128px" height="128px"><p>退出</p></a></td>
		</tr>
		</table>
	</div>
   
	  <?php 
	include "foot.php";
?>

  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
<?php 
}
else {
    header("location:login.html");
}
?>