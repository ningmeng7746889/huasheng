<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);

    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
		
    $sql = "select * from file where status='发布' order by create_date desc ";
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
          <div class="bt2">资料下载<span>INFORMATION</span></div>
          <div class="TabTitle2">
            <ul class="expmenu">
              <li>
                <div class="header"><a href="info.php" title="">资料下载</a></div>
              </li>
            </ul>
          </div>
        </div>
        
				<?php 
include "so.php";
?>

      </div>
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="info.php" title="">资料下载</a></div>
        <div class="news">
		
          <ul>
		  
		  	<?php
                while($rzt = mysql_fetch_assoc($qry)){
            ?>
			
            <li><span><?php echo $rzt['create_date']; ?></span><a href="<?php echo $rzt['file_url']; ?>" title=""><?php echo $rzt['name']; ?></a></li>
			
			<?php } ?>
            <li><span>2014-02-16</span><a href="doc/document2.pdf" title="">安装说明</a></li>
            <li><span>2014-02-15</span><a href="doc/information.txt" title="">二次开发套件</a></li>
			<li><span>2014-02-15</span><a href="doc/information.txt" title="">产品资料</a></li>
          </ul>
        </div>
        <!--<div class="ym">123</div>-->
      </div>
    </div>
    
	<?php
	include "foot.php";
 ?>
 
  </div>
</div>

</body>
</html>
