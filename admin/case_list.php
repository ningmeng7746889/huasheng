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
        $sql = "select * from solution where 1=1 order by create_date desc ";
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
			  <a href="case_create.php" target="_blank"><img src="../images/create.jpg" width="12px">新增方案</a>
      </div>
      
      <div class="content-box-content">
	  
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，下面是最新发布的方案！ </div>
          </div>
          
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th>
                 
                </th>
                <th>方案名称</th>
                <th>状态</th>
                <th>方案内容</th>
                <th>发布时间</th>	 
                <th>选项</th>
              </tr>
            </thead>
              
            <!-- 表内容部分 -->
            <tbody>
              <volist name="case_list" id="vo">
					<?php
                        //通过while循环获得具体留言信息
                        while($rzt = mysql_fetch_assoc($qry)){
                            ?>
              <tr>
                <td></td>
                <td><?php echo $rzt['name']; ?></td>
                <td><?php echo $rzt['status']; ?></td>
                
                <td>
                <a href="case_edit.php?id=<?php echo $rzt['id']; ?>" target="_blank" title="解决方案">
                <?php echo mb_strlen($rzt['contents'])<20?$rzt['contents']:mb_substr(strip_tags($rzt['contents']),0,20,'UTF-8')."...." ?>
                </a>
                
                </td>
                
                <td><?php echo $rzt['create_date']; ?></td>
                <td>
                  <!-- Icons -->
                  <a href="case_edit.php?id=<?php echo $rzt['id']; ?>" title="编辑"><img src="../public/Images/admin/icons/pencil.png" alt="编辑" /></a>
                  <a href="../bll/case_delete.php?id=<?php echo $rzt['id']; ?>" title="删除"><img src="../public/Images/admin/icons/cross.png" alt="删除" /></a> 
                </td>
              </tr>  
                        <?php
                        }
                        ?>
              </volist>                        
            </tbody>
            
              <!-- 表尾 -->
          </table>
        </div>
        
        
        
        <!-- End #tab1 -->

      </div>
      <!-- End .content-box-content -->
	  

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