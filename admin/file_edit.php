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
		$id   = $_GET["id"];
        $time=date("Y-m-d",mktime(0,0,0,date("m"),date("d")-7,date("Y")));
		
        $sql = "select * from file where id='".$id."'";
        //$qry = $mysqli->query($sql)
        $qry = mysql_query($sql);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>华晟电子科技有限公司</title>


<?php 
	include "head.php";
?>
	<style>
		.title{
			width:600px;
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
    
     <form action="../bll/file_update.php" method="post" enctype='multipart/form-data' accept-charset="UTF-8">
    <!-- Page Head -->
    <h2>后台管理系统--文件下载管理</h2>
	<br></br>

    <div class="clear"></div>
    
    

    <div class="content-box">
    
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3></h3>
		<ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">文件维护</a></li>
        </ul>
        <div class="clear"></div>
		<div style="text-align:center;">
			<input type="submit" name="submit" value="保存" />
			<input type="button" value="取消" />
		</div>
      </div>
      
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
         
          <!-- 表头 -->
          <table style="border:5px;border-color:black;">
            <thead>
            </thead>
              
            <!-- 表内容部分 -->
            <tbody>
			<tr>
				<th width="100px"></th>
				<th></th>
			</tr>
			               <?php

                        //通过while循环获得具体留言信息
                        while($rzt = mysql_fetch_assoc($qry)){
                            ?>
			<tr>
				<td style="text-align:right;width:100px;">文件名称<input type="hidden" value="<?php echo $rzt['id']; ?>" name="id" /></td>
				<td colspan="3" style="text-align:left;width:500px;"><input type="text" name="name" class="title" value="<?php echo $rzt['name']; ?>" /></td>
			</tr>
			<tr>
				<td style="text-align:right;width:150px;">发布日期</td>
				<td colspan="3" style="text-align:left;width:500px;"><input type="date" name="date" value="<?php echo $rzt['create_date']; ?>" width="500px" /></td>
			</tr>
			<tr>
				<td style="text-align:right;width:150px;">发布状态</td>
				<td style="text-align:left;width:500px;">
					<select name="status" width="500px" >
						<option>草稿</option>
						<option>发布</option>
					</select>
				</td>
				<td style="text-align:right;width:150px;"></td>
				<td style="text-align:left;width:500px;">

				</td>
			</tr>
			<tr>
			<td style="text-align:right;width:100px;">重新上传文件</td>
			<td><input type="file" name="file" id="file" /></td>
			<td></td>
			<td></td>
			</tr>


				        <?php
                        }
                        ?>             
            </tbody>

          </table>

        </div>
        
        
        
        <!-- End #tab1 -->

      </div>
      <!-- End .content-box-content -->
	  
	</form>

    </div>
    <!-- End .content-box -->
   
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