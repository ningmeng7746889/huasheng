<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]) or die("error connecting");
    mysql_select_db($db["DB_NAME"], $link);
	
    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
		
    $sql = "select * from news where status='发布' and type='xw' order by create_date desc limit 6 ";
    //$qry = $mysqli->query($sql)
    $qry = mysql_query($sql);
    $sql1 = "select * from news where status='发布' and type='dt' order by create_date desc limit 6 ";
    //$qry = $mysqli->query($sql)
    $qry1 = mysql_query($sql1);
	$sql2 = "select * from product where status='发布' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry2 = mysql_query($sql2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<title>计算机视觉,人工智能,识别跟踪,高可靠嵌入式系统,军用计算设备,PXIe,PCIe,VPX,1553,RapidIO总线交换产品,图像、视频接口采集处理输出技术</title>
<meta name="keywords" content="计算机视觉,人工智能,识别跟踪,高可靠嵌入式系统,军用计算设备,PXIe,PCIe,VPX,1553,RapidIO总线交换产品,图像、视频接口采集处理输出技术" />
<meta name="description" content="计算机视觉,人工智能,识别跟踪,高可靠嵌入式系统,军用计算设备,PXIe,PCIe,VPX,1553,RapidIO总线交换产品,图像、视频接口采集处理输出技术" />
<link href="css/index.css" rel="stylesheet" type="text/css" /> -->
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
    <div class="main">
      <div class="left">
        <div class="bt1"><span>PROFILE</span>公司简介<a href="about.php" title=""><img alt="" src="images/more.gif" width="41" height="11" /></a></div>
        <div class="gsjs">
          <div class="bk2"></div>
          <div class="about">
            <div class="gs"><img alt="" src="images/gs.gif" width="104" height="199" /></div>
            西安华晟电子技术有限公司，创立于2013年，位于西安高新技术开发区，是一家快速发展中的高科技企业。公司致力于嵌入平台产品、固态存储产品、先进航电网络产品和云平台支撑软件产品的研发、生产和销售以及智能嵌入系统、高性能海量存储系统、综合航电仿真系统、高性能网络计算系统的集成和开发服务。<br />自成立以来，公司始终坚持“科学发展、自主创新”的发展理念，不断增强核心技术及产品的自主研发能力，已先后向市场投放一系列技术领先、性能卓越的软硬件产品，其中部分科研项目获得政府专项基金发展支持，部分产品荣获多项。截至目前，公司拥有商标1项，实用新型专利1项，软件著作权2项，以及正在受理中的发明专利2项。
        </div>
          <div class="bk2-1"></div>
        </div>
      </div>
      <div class="right">
        <div class="block">
          <div class="newl">
            <div class="bt1"><a href="news.php" title=""><img alt="" src="images/more.gif" width="41" height="11" /></a><span>NEWS</span>公司新闻</div>
            <div class="xwlb">
              <ul>
			  		  			    <?php
                        while($rzt = mysql_fetch_assoc($qry)){
                        ?>
            <li><span><?php echo $rzt['create_date']; ?></span><a href="news_view.php?id=<?php echo $rzt['id']; ?>" title=""><?php echo $rzt['title']; ?></a></li>
						<?php } ?>
              </ul>
            </div>
          </div>
          <div class="newr">
            <div class="bt1"><a href="news.php" title=""><img alt="" src="images/more.gif" width="41" height="11" /></a><span>NEWS</span>行业动态</div>
            <div class="xwlb">
              <ul>
			  <?php
                        while($rzt1 = mysql_fetch_assoc($qry1)){
                        ?>
            <li><span><?php echo $rzt1['create_date']; ?></span><a href="news_view.php?id=<?php echo $rzt1['id']; ?>" title=""><?php echo $rzt1['title']; ?></a></li>
						<?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="block1">
          <div class="bt1"><a href="show.php" title=""><img alt="" src="images/more.gif" width="41" height="11" /></a><span>PRODUCTS</span>产品展示</div>
          <div id=demo>
            <table border=0 align=center cellpadding=1 cellspacing=1 cellspace=0>
              <tr>
                <td valign=top id=marquePic1><table width='100%' border='0' cellspacing='0'>
                    <tr>
					<?php
                        while($rzt2 = mysql_fetch_assoc($qry2)){
                        ?>
                      <td align=center><a title="" href="product_view.php?id=<?php echo $rzt2['id']; ?>"><img src="<?php echo $rzt2['picture_url']; ?>" width="140" height="90" border=0></a><span><a title="" href="product_view?id=<?php echo $rzt2['id']; ?>"><?php echo $rzt2['name']; ?></a></span></td>
					  <?php } ?>
                     
                    </tr>
                  </table></td>
                <td id=marquePic2 valign=top></td>
              </tr>
            </table>
          </div>
          <script type="text/javascript">
	var speed=25 
	marquePic2.innerHTML=marquePic1.innerHTML 
	function Marquee(){ 
	  if(demo.scrollLeft>=marquePic1.scrollWidth){ 
	    demo.scrollLeft=0 
	  }else{ 
	    demo.scrollLeft++ 
	  } 
	} 
	var MyMar=setInterval(Marquee,speed) 
	demo.onmouseover=function() {clearInterval(MyMar)} 
	demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)} 
</script> 
        </div>
      </div>
    </div>
    <div class="link">
      <div class="bt1"><span>LINKS</span>友情链接</div>
      <div class="lj">
      <a href="http://www.baidu.com/" target="_blank">百度</a>
      <a href="http://www.taobao.com/" target="_blank">淘宝</a>
      <a href="http://www.qq.com/" target="_blank">腾讯</a>
      <a href="http://www.sina.com.cn/" target="_blank">新浪</a>
      <a href="http://www.sohu.com/" target="_blank">搜狐</a>
      <a href="http://www.163.com/" target="_blank">网易</a>
      </div>
    </div>
	
<?php
	include "foot.php";
 ?>
  
  
  </div>
</div>

</body>
</html>
