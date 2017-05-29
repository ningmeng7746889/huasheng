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
        $sql = "select * from think_user where username='".$username."' ";
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
<!--<script type="text/javascript">
	function view(mid){
		alert(1);
        //显示div层
        //通过dom获得div层
        var mydiv = document.getElementById('ly'+mid);
        //通过dom设置css
        mydiv.style.display = "block";
	}
</script>-->

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
    <h2>后台管理系统--密码修改</h2>
	<br></br>

    <div class="clear"></div>
    
    

    <div class="content-box">
    
      <!-- Start Content Box -->

      
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，用户<?php echo $_SESSION['username']; ?> </div>
          </div>
          
          <!-- 表头 -->
          <table>
              
            <!-- 表内容部分 -->
			<form action="../bll/pwd_update.php" method="post">
			<input type="hidden" name="username" value="<?php echo $username; ?>" />
            <tbody>
              <!--<volist name="news_list" id="vo">-->

              <tr>
                <td width="80px">原密码</td>
				<td><input type="password" name="pwd_ys" /></td>
				<td></td>
              </tr>
              <tr>
                <td>新密码</td>
				<td><input type="password" name="pwd1" /></td>
				<td text-color="red">新密码控制在16位以内的数字和字母</td>
              </tr>  
              <tr>
                <td>新密码确认</td>
				<td><input type="password" name="pwd2" /></td>
				<td></td>
              </tr> 
              <tr>
                <td></td>
				<td><input type="submit" value="提交" /></td>
				<td></td>
              </tr>   			  
              <!--</volist>-->                        
            </tbody>
			
            </form>
              <!-- 表尾 -->
          </table>
        </div>
        
        
        
        <!-- End #tab1 -->
        <!-- End #tab2 -->
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