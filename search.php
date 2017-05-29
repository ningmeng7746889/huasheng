<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);

    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
	$type=$_GET['type'];
	if($_GET['value']){
		$value=$_GET['value'];
	}else{
		$value="";
	}
	$url="";
	$select="";
	if($type=='news'){
		$sql = "select * from news where status='发布' and type='xw' and title like '%$value%' order by create_date desc ";
		//$qry = $mysqli->query($sql)
		$qry = mysql_query($sql);
		$url="news_view.php";
		$select="<option value='product' >产品</option><option value='news' selected='selected'>新闻</option>";
	}else if($type=='product'){
		$sql = "select id,name as title,contents,status,type,picture_url,create_date from product where status='发布' and name like '%$value%' order by create_date desc ";
		//$qry = $mysqli->query($sql)
		$qry = mysql_query($sql);
		$url="product_view.php";
		$select="<option value='product' selected='selected'>产品</option><option value='news'>新闻</option>";
	}else if($type=='job'){
		header("location:recruit.php"); 
	}else{
		header("location:index.php");
	}
    
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
          <div class="bt2">快速查询<span>Search</span></div>
          <div class="TabTitle2">
            <ul class="expmenu">
              <li>
                <div class="header"><a href="" title="">快速查询</a></div>
              </li>
            </ul>
          </div>
        </div>
		
		<div class="so">
          <div class="bt2">快速搜索<span>SEARCH</span></div>
          <div class="soso">
            <!--<form method="post" action="">-->
              <select class="wbyselect" id="selectType" name="soutype">
			  <?php
				echo $select;
			  ?>
              </select>
              <input type="text" id="search" value="<?php echo $value; ?>" onfocus="javascript:if(this.value == '-请输入关键字-') this.value = '';" onblur="javascript:if(this.value == '') this.value = '-请输入关键字-'; " onkeypress="go();" class="wbyinput" name="search"/>
			  <input class="wbybut" type="button" name="wbysearch" onclick="go();" value="搜索" />
			  <script type="text/javascript">
			  function go(){
				var txt=document.getElementById("selectType").value;
				var txt1=document.getElementById("search").value;
				var url="search.php?type="+txt;
				if(txt1=="-请输入关键字-"){
				}else{
					url=url+"&value="+txt1;
				}
				window.location.href=url;
			  }
			  </script>
            <!--</form>-->
          </div>
        </div>
        <div class="so">
          <div class="bt2">联系我们<span>CONTACT</span></div>
          <div class="contact"> 地址：西安电子科技大学产业园<br />
            手机：18092197203<br />
            电话：029-88607265<br />
            传真：029-88607265<br />
            邮箱：xa_huasheng@sina.com <br />
            邮编：710068 </div>
        </div>
		
		
      </div>
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="" title="">快速查询</a></div>
		
        <div class="news">
          <ul>
		  			    <?php
                        while($rzt = mysql_fetch_assoc($qry)){
                        ?>
            <li><span><?php echo $rzt['create_date']; ?></span><a href="<?php echo $url;?>?id=<?php echo $rzt['id']; ?>" title=""><?php echo $rzt['title']; ?></a></li>
						<?php } ?>
            <li><span></span><a href="" title="">欢迎访问华晟电子科技有限公司</a></li>
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
