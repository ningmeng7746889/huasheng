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
        $sql = "select * from solution where create_date>='".$time."' order by create_date desc ";
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
    <!-- 配置文件 -->
    <script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
	<style>
		.title{
			width:600px;
		}
		textarea{
			resize: none;	
			width: 600px;
			height: 600px;
			max-width: 600px;
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
    
     <form action="../bll/case_insert.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <!-- Page Head -->
    <h2>后台管理系统--解决方案</h2>
	<br></br>

    <div class="clear"></div>
    
    

    <div class="content-box">
    
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3></h3>
		<ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">解决方案</a></li>
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
				<td style="text-align:right;width:100px;">方案标题</td>
				<td cols="3" style="text-align:left;width:500px;"><input type="text" name="name" class="title" /></td>
			</tr>
			<tr>
				<td style="text-align:right;width:150px;">发布日期</td>
				<td style="text-align:left;width:500px;"><input type="date" name="date" width="500px" /></td>
			</tr>
			<tr>
				<td style="text-align:right;width:100px;">方案状态</td>
				<td style="text-align:left;width:500px;">
					<select name="status" width="500px" >
						<option>草稿</option>
						<option>发布</option>
					</select>
				</td>
			</tr>
			<tr>
			<td style="text-align:right;width:100px;">首页图片</td>
			<td><input type="file" name="file" id="file" /></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:top;">方案内容</td>
				<td cols="3" style="text-align:left;width:800px">    
				<!-- 加载编辑器的容器 -->
				<script id="container" name="contents" type="text/plain">
        
				</script>

				<!-- 实例化编辑器 -->
				<script type="text/javascript">
					var ue = UE.getEditor('container');
				</script>
				</td>
			</tr>
				                     
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