<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);

    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
		
    $sql1 = "select * from product where status='发布' and type='计算机视觉产品' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry1 = mysql_query($sql1);
    
	$sql2 = "select * from product where status='发布' and type='信号采集产品' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry2 = mysql_query($sql2);
	
	$sql3 = "select * from product where status='发布' and type='信号处理产品' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry3 = mysql_query($sql3);
	
	$sql4 = "select * from product where status='发布' and type='高速交换系统' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry4 = mysql_query($sql4);
	
	$sql5 = "select * from product where status='发布' and type='其他' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry5 = mysql_query($sql5);
	
	$sql6 = "select * from product where status='发布' and type='计算机视觉产品' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry6 = mysql_query($sql6);
	
	$sql7 = "select * from product where status='发布' and type='信号采集产品' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry7 = mysql_query($sql7);
	
	$sql8 = "select * from product where status='发布' and type='信号处理产品' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry8 = mysql_query($sql8);
	
	$sql9 = "select * from product where status='发布' and type='高速交换系统' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry9 = mysql_query($sql9);
	
	$sql0 = "select * from product where status='发布' and type='其他' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry0 = mysql_query($sql0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include "title.php";
?>
<style>
	h2{
		margin:5px;
		color:#0466AC;
	}
</style>
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
      <div class="bt2">产品展示<span>PRODUCTS</span></div>
      <div class="TabTitle2">
        <ul class="expmenu">
          <li>
            <div class="header"><span class="arrow down"></span><a href="" title="">计算机视觉产品</a></div>
            <ul class="menu" style="display:'';" >
				<?php
                        while($rzt1 = mysql_fetch_assoc($qry1)){
                        ?>
						<li><a href="product_view.php?id=<?php echo $rzt1['id']; ?>" title=""><?php echo $rzt1['name']; ?></a></li>
						<?php } ?>
            </ul>
          </li>
          <li>
            <div class="header"><span class="arrow up"></span><a href="" title="">信号采集产品</a></div>
            <ul class="menu" style="display:none;" >
			<?php
                        while($rzt1 = mysql_fetch_assoc($qry2)){
                        ?>
						<li><a href="product_view.php?id=<?php echo $rzt1['id']; ?>" title=""><?php echo $rzt1['name']; ?></a></li>
						<?php } ?>
            </ul>
          </li>
          <li>
            <div class="header"><span class="arrow up"></span><a href="" title="">信号处理产品</a></div>
            <ul class="menu" style="display:none;" >
			<?php
                        while($rzt1 = mysql_fetch_assoc($qry3)){
                        ?>
						<li><a href="product_view.php?id=<?php echo $rzt1['id']; ?>" title=""><?php echo $rzt1['name']; ?></a></li>
						<?php } ?>
            </ul>
          </li>
          <li>
            <div class="header"><span class="arrow up"></span><a href="" title="">高速交换系统</a></div>
            <ul class="menu" style="display:none;" >
			<?php
                        while($rzt1 = mysql_fetch_assoc($qry4)){
                        ?>
						<li><a href="product_view.php?id=<?php echo $rzt1['id']; ?>" title=""><?php echo $rzt1['name']; ?></a></li>
						<?php } ?>
            </ul>
          </li>
		            <li>
            <div class="header"><span class="arrow up"></span><a href="" title="">其他</a></div>
            <ul class="menu" style="display:none;" >
			<?php
                        while($rzt1 = mysql_fetch_assoc($qry5)){
                        ?>
						<li><a href="product_view.php?id=<?php echo $rzt1['id']; ?>" title=""><?php echo $rzt1['name']; ?></a></li>
						<?php } ?>
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
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="show.php" title="">产品展示</a></div>
        <div class="show">
		<h2>计算机视觉产品</h2>
          <ul>
		  		  			    <?php
                        while($rzt6= mysql_fetch_assoc($qry6)){
                        ?>
						<li><a title="" href="product_view.php?id=<?php echo $rzt6['id']; ?>"><img src="<?php echo $rzt6['picture_url']; ?>" width="150" height="96" border=0><span><?php echo $rzt6['name']; ?></span></a></li>
						<?php } ?>
           
          </ul>
		<h2>信号采集产品</h2>
          <ul>
		  		  			    <?php
                        while($rzt7 = mysql_fetch_assoc($qry7)){
                        ?>
						<li><a title="" href="product_view.php?id=<?php echo $rzt7['id']; ?>"><img src="<?php echo $rzt7['picture_url']; ?>" width="150" height="96" border=0><span><?php echo $rzt7['name']; ?></span></a></li>
						<?php } ?>
            
          </ul>
		<h2>信号处理产品</h2>
          <ul>
		  		  			    <?php
                        while($rzt8 = mysql_fetch_assoc($qry8)){
                        ?>
						<li><a title="" href="product_view.php?id=<?php echo $rzt8['id']; ?>"><img src="<?php echo $rzt8['picture_url']; ?>" width="150" height="96" border=0><span><?php echo $rzt8['name']; ?></span></a></li>
						<?php } ?>
            
            
          </ul>	
		<h2>高速交换产品</h2>
          <ul>
		  		  			    <?php
                        while($rzt9 = mysql_fetch_assoc($qry9)){
                        ?>
						<li><a title="" href="product_view.php?id=<?php echo $rzt9['id']; ?>"><img src="<?php echo $rzt9['picture_url']; ?>" width="150" height="96" border=0><span><?php echo $rzt9['name']; ?></span></a></li>
						<?php } ?>
            
            
          </ul>
		<h2>其他</h2>
          <ul>
		  		  			    <?php
                        while($rzt0 = mysql_fetch_assoc($qry0)){
                        ?>
						<li><a title="" href="product_view.php?id=<?php echo $rzt0['id']; ?>"><img src="<?php echo $rzt0['picture_url']; ?>" width="150" height="96" border=0><span><?php echo $rzt0['name']; ?></span></a></li>
						<?php } ?>
          
            
            
          </ul>		  
        </div>
        <div class="ym">123</div>
      </div>
    </div>

	<?php
	include "foot.php";
 ?>
 
  </div>
</div>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
<script type="text/javascript" src="js/jquery.tools.min.js"></script> 
<script type="text/javascript" src="js/main.js"></script> 

</body>
</html>
