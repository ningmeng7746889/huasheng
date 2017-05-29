<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);

    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
		
    $sql1 = "select * from solution where status='发布' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry1 = mysql_query($sql1);
    
	$sql0 = "select * from solution where status='发布' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry0 = mysql_query($sql0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include "title.php";
?>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
<script type="text/javascript" src="js/jquery.tools.min.js"></script> 
<script type="text/javascript" src="js/main.js"></script> 
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
          <div class="bt2">解决方案<span>CASE</span></div>
          <div class="TabTitle2">
          <ul class="expmenu">
          <li>
            <div class="header"><span class="arrow down"></span><a href="" title="">现有方案</a></div>
            <ul class="menu" style="display:'';" >
							<?php
                        while($rzt0 = mysql_fetch_assoc($qry0)){
                        ?>
						<li><a href="prjinfo_view.php?id=<?php echo $rzt0['id']; ?>" target="_self" title=""><?php echo $rzt0['name']; ?></a></li>
						<?php } ?>
              <!--<li><a href="prj/prj0.html" target="_self" title="">视频卡采集</a></li>-->
            </ul>
          </li>
        </ul>
          </div>
        </div>
		
        <?php 
include "so.php";
?>

      </div>
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="prjinfo.php" title="">解决方案</a></div>
        <div class="case">
		 <?php
                        while($rzt1= mysql_fetch_assoc($qry1)){
                        ?>
						<div class="pro_list">
                            <a title="<?php echo $rzt1['name']; ?>" target="_self" href="prjinfo_view.php?id=<?php echo $rzt1['id']; ?>">
                            <img alt="<?php echo $rzt1['name']; ?>" title="<?php echo $rzt1['name']; ?>"  width="200" height="150" src="<?php echo $rzt1['picture_url']; ?>" />
                            </a>
                            <p class="f01 p1">
                                <a title="<?php echo $rzt1['name']; ?>" target="_self" href="prjinfo_view.php?id=<?php echo $rzt1['id']; ?>"><?php echo $rzt1['name']; ?></a></p>
                            <p class="p2">方案可定制，有需要请与公司联系。</p>
                            <br />
                            <br />
                            <a title="<?php echo $rzt1['name']; ?>" target="_self" href="prjinfo_view.php?id=<?php echo $rzt1['id']; ?>">
                                <img src="images/more.gif" /></a>
                            </div>
						<?php } ?>
			<!--<div class="pro_list">
                            <a title="多功能地检仪表HSDP1" target="_self" href="">
                            <img alt="多功能地检仪表HSDP1" title="多功能地检仪表HSDP1"  width="200" height="150" src="images/19.jpg" />
                            </a>
                            <p class="f01 p1">
                                <a title="多功能地检仪表HSDP1" target="_self" href="">多功能地检仪表</a></p>
                            <p class="p2">
                              HSDP1 支持各种接口的数字IO接口通信、协议模拟与测试</p>
                            <br />
                            <br />
                            <a title="多功能地检仪表HSDP1" target="_self" href="">
                                <img src="images/more.gif" /></a>
                            </div>
           <div class="pro_list">
                            <a title="CameraLink高清高帧速相机" target="_self" href="">
                            <img alt="CameraLink高清高帧速相机" title="CameraLink高清高帧速相机"  width="200" height="150" src="images/15.jpg" />
                            </a>
                            <p class="f01 p1">
                                <a title="CameraLink高清高帧速相机" target="_self" href="">CameraLink高清高帧速相机</a></p>
                            
                            <br />
<br />
                            <br />
                            <a title="CameraLink高清高帧速相机" target="_self" href="">
                                <img src="images/more.gif" /></a>
                            </div>
            <div class="pro_list">
                            <a title="数字IO采集处理系统" target="_self" href="">
                            <img alt="数字IO采集处理系统" title="数字IO采集/输出处理系统"  width="200" height="150" src="images/16.jpg" />
                            </a>
                            <p class="f01 p1">
                                <a title="数字IO采集/输出处理系统" target="_self" href="">数字IO采集/输出处理系统（可定制）</a></p>
				<p class="p2">
                                高性能、小型化嵌入式计算机系统，支持Linux/VxWorks/Windows系统）</p>
                            <br />
                            

                            <br />
                            <a title="数字IO采集处理系统" target="_self" href="">
                                <img src="images/more.gif" /></a>
                            </div>
            <div class="pro_list">
                            <a title="机器视觉识别跟踪系统" target="_self" href="">
                            <img alt="机器视觉识别跟踪系统" title="机器视觉识别跟踪系统"  width="200" height="150" src="images/27.jpg" />
                            </a>
                            <p class="f01 p1">
                                <a title="机器视觉识别跟踪系统" target="_self" href="">机器视觉识别跟踪系统</a></p>
                            <p class="p2">
                                目标的模式识别与跟踪</p>
                            <br />
                            <br />
                            <a title="机器视觉识别跟踪系统" target="_self" href="">
                                <img src="images/more.gif" /></a>
                            </div>
                            <div class="pro_list">
                            <a title="RapidIO" target="_self" href="prj/prj0.html">
                            <img alt="RapidIO" title="RapidIO"  width="200" height="150" src="images/18.jpg" />
                            </a>
                            <p class="f01 p1">
                                <a title="RapidIO" target="_self" href="prj/prj0.html">高可靠FlexIO接口板</a></p>
                            <p class="p2">
                                FlexIO接口技术实现接口快速扩展（CameraLink、LVDS、标准视频；RapidIO；1553；FC等接口）</p>
                            <br />
<br />
                            <br />
                            <a title="RapidIO" target="_self" href="prj/prj0.html">
                                <img src="images/more.gif" /></a>
                            </div>
                           <div class="pro_list">
                            <a title="路由交换系统" target="_self" href="">
                            <img alt="路由交换系统" title="路由交换系统"  width="200" height="150" src="images/26.jpg" />
                            </a>
                            <p class="f01 p1">
                                <a title="路由交换系统" target="_self" href="">高速交换系统(支持以太网交换、sRio交换、PXIe/VPX/PCIe交换，背板可定制)</a></p>
<br/>

                            <br />
                            <a title="路由交换系统" target="_self" href="">
                                <img src="images/more.gif" /></a>
                            </div>-->
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
