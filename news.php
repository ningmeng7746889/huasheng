<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);

    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
		
    $sql = "select * from news where status='发布' and type='xw' order by create_date desc ";
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
          <div class="bt2">新闻资讯<span>NEWS</span></div>
          <div class="TabTitle2">
            <ul class="expmenu">
              <li>
                <div class="header"><a href="news.php" title="">新闻资讯</a></div>
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
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="news.php" title="">新闻资讯</a></div>
		
        <div class="news">
          <ul>
		  			    <?php
                        while($rzt = mysql_fetch_assoc($qry)){
                        ?>
            <li><span><?php echo $rzt['create_date']; ?></span><a href="news_view.php?id=<?php echo $rzt['id']; ?>" title=""><?php echo $rzt['title']; ?></a></li>
						<?php } ?>
            <li><span>2013-07-12</span><a href="" title="">从CVPR2013看计算机视觉研究的三个趋势</a></li>
            <li><span>2013-05-15</span><a href="" title="">中国程控交换机行业市场发展状况及投资趋势预测报告</a></li>
            <li><span>2013-03-16</span><a href="" title="">2013-2017年中国视频采集卡市场调查与投资分析报告</a></li>
            <li><span>2013-02-13</span><a href="" title="">2013年安防行业分析</a></li>
            <li><span>2013-01-15</span><a href="" title="">智能语音系统2013年发展分析</a></li>
          </ul>
        </div>
        <div class="ym"></div>
      </div>
    </div>
	
<?php
	include "foot.php";
 ?>
 
  </div>
</div>

</body>
</html>
