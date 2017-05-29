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
        $sql = "select * from message where create_date>='".$time."' order by create_date desc ";
        //$qry = $mysqli->query($sql)
        $qry = mysql_query($sql);
    
    
        $sql2 = "select * from message where 1=1 order by create_date desc ";
        $qry2 = mysql_query($sql2);
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
    <h2>后台管理系统--留言板</h2>
	<br></br>

    <div class="clear"></div>
    
    

    <div class="content-box">
    
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3></h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">最新留言</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">所有留言</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，下面是最近一周内添加的留言！ </div>
          </div>
          
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th>
                 
                </th>
                <th>留言人</th>
                <th>邮箱</th>
                <th>留言内容</th>
                <th>留言时间</th>	 
                <th>选项</th>
              </tr>
            </thead>
              
            <!-- 表内容部分 -->
            <tbody>
              <volist name="news_list" id="vo">
               <?php

                        //通过while循环获得具体留言信息
                        while($rzt = mysql_fetch_assoc($qry)){
                            ?>
              <tr>
                <td></td>
                <td><?php echo $rzt['name']; ?></td>
                <td><?php echo $rzt['email']; ?></td>
                
                <td>
                <a href="../bll/message_view.php?id=<?php echo $rzt['id']; ?>" target="_blank" title="留言内容">
                <?php echo mb_strlen($rzt['message'])<20?$rzt['message']:mb_substr(strip_tags($rzt['message']),0,20,'UTF-8')."...." ?>
                </a>
                
                </td>
                
                <td><?php echo $rzt['create_date']; ?></td>
                <td>
                  <!-- Icons -->
                  
                  <a href="../bll/message_delete.php?id=<?php echo $rzt['id']; ?>" title="删除"><img src="../public/Images/admin/icons/cross.png" alt="删除" /></a> 
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
        <div class="tab-content" id="tab2">
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，下面是所有的留言！ </div>
          </div>
          
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th>
                 
                </th>
                <th>留言人</th>
                <th>邮箱</th>
                <th>留言内容</th>
                <th>留言时间</th>	 
                <th>选项</th>
              </tr>
            </thead>
              
            <!-- 表内容部分 -->
            <tbody>
              <volist name="news_list" id="vo">
              <?php

                        //通过while循环获得具体留言信息
                        while($rzt2 = mysql_fetch_assoc($qry2)){
                            ?>
              <tr>
                <td></td>
                <td><?php echo $rzt2['name']; ?></td>
                <td><?php echo $rzt2['email']; ?></td>
                <td>
               <a href="../bll/message_view.php?id=<?php echo $rzt2['id']; ?>" target="_blank" title="留言内容">
               <?php echo mb_strlen($rzt2['message'])<20?$rzt2['message']:mb_substr(strip_tags($rzt2['message']),0,20,'UTF-8')."...." ?>
                </a>
                </td>
                <td><?php echo $rzt2['create_date']; ?></td>
                <td>
                  <!-- Icons -->
                 
                  <a href="../bll/message_delete.php?id=<?php echo $rzt2['id']; ?>" title="删除"><img src="../public/Images/admin/icons/cross.png" alt="删除" /></a> 
                </td>
              </tr>  
                        <?php
                        }
                        mysql_close();

                        ?>
              </volist>                        
            </tbody>
            
              <!-- 表尾 -->
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="pagination">               	  
                  	{$page_method}

                  	<a href="#" title="First Page">&laquo; First</a>
                  	<a href="#" title="Previous Page">&laquo; Previous</a> 
                  	<a href="#" class="number" title="1">1</a> 
                  	<a href="#" class="number" title="2">2</a> 
                  	<a href="#" class="number current" title="3">3</a> 
                  	<a href="#" class="number" title="4">4</a> 
                  	<a href="#" title="Next Page">Next &raquo;</a>
                  	<a href="#" title="Last Page">Last &raquo;</a> 

                  </div>                 
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
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