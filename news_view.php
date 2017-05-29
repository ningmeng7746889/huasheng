<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);

    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
	$id   = $_GET["id"];
		
    $sql = "select * from news where id='".$id."'";
    //$qry = $mysqli->query($sql)
    $qry = mysql_query($sql);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include "title.php";
?>
</head>
<body>
<?php
	include "head.php";
?>
<div class="all">
  <div class="content">
    <div class="main1">
      <div class="left1">
        <div class="fl">
          <div class="bt2">公司新闻<span>NEWS</span></div>
          <div class="TabTitle2">
            <ul class="expmenu">
              <li>
                <div class="header"><a href="news.php" title="">公司新闻</a></div>
              </li>
			  <li>
                <div class="header"><a href="trend.php" title="">行业动态</a></div>
              </li>
            </ul>
          </div>
        </div>
		
        <?php 
include "so.php";
?>

      </div>
	  
	                 <?php
                        while($rzt = mysql_fetch_assoc($qry)){
                            ?>
	  
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> >  <?php echo $rzt['title']; ?></div>
        <div class="news">
          <div class="wzbt"><?php echo $rzt['title']; ?></div>
      <div class="zz">发布于：<?php echo $rzt['create_date']; ?></div>
      <div class="wz"> 
	  <?php echo $rzt['contents']; ?>
      </div>
    </div>
                        <?php
                        }
                        ?>
      </div>
    </div>
	
<?php
	include "foot.php";
 ?>
  </div>
</div>

</body>
</html>
