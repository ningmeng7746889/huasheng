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
        $username=$_SESSION['username'];
		if($username == 'admin'){
			$sql = "select * from think_user where username!='$username' ";
			
			$qry = mysql_query($sql);
		}else{
			$sql = "select * from think_user where username='$username' ";
			
			$qry = mysql_query($sql);
		}
    
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
    <h2>后台管理系统--用户管理</h2>
	<br></br>

    <div class="clear"></div>
    
    

    <div class="content-box">
    
      <!-- Start Content Box -->
      <div class="content-box-header">

        <h3></h3>
		<ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">用户管理</a></li>
        </ul>
        <div class="clear"></div>
			  
      </div>
      
      <div class="content-box-content">
	  
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>
				<?php if($username=='admin'){?>
					<form action="../bll/user_insert.php" method="post">
					新增用户名:<input type="text" name="username" />
					密码：<input type="text" name="password" />
					<input type="submit" value="新建账号" />
					密码应为15位以下的数字或者字母
					</form>
				<?php }else{ ?>
				         
					您好，用户<?php echo $_SESSION['username']; ?>！

				<?php } ?>
			</div>
          </div>
          
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th>
                 
                </th>
                <th>用户名</th>
                <th>用户密码</th> 
                <th>选项</th>
              </tr>
            </thead>
              
            <!-- 表内容部分 -->
            <tbody>
              <volist name="trend_list" id="vo">
               <?php

                        //通过while循环获得具体留言信息
                        while($rzt = mysql_fetch_assoc($qry)){
                            ?>
              <tr>
                <td></td>
                <td><?php echo $rzt['username']; ?></td>
                <td><?php echo $rzt['password']; ?></td>
 
                <td>
                  <!-- Icons -->
				  <?php if($username=='admin'){?>
				  
                  <a href="../bll/user_delete.php?id=<?php echo $rzt['id']; ?>" title="删除"><img src="../public/Images/admin/icons/cross.png" alt="删除" /></a> 
				  <?php } ?>
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