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
          <div class="bt2">联系我们<span>CONTACT</span></div>
          <div class="TabTitle2">
            <ul class="expmenu">
              <li>
                <div class="header"><a href="contact.php" title="">联系我们</a></div>
              </li>

            </ul>
          </div>
        </div>
		
<?php 
include "so.php";
?>
		
      </div>
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="contact.php" title="">联系我们</a></div>
        <div class="contact">

            <form action="bll/message_insert.php" method="post" accept-charset="UTF-8" class="bootstrap-frm">
			<h1>留言板
			<span>请填写相关的留言信息，我们将及时为您答复。</span>
			</h1>
			<label>
			<span>姓名:</span>
			<input id="name" type="text" name="name" placeholder="Your Full Name" />
			</label>
			<label>
			<span>邮箱:</span>
			<input id="email" type="email" name="email" placeholder="Valid Email Address" />
			</label>
			<label>
			<span>留言:</span>
			<textarea id="message" name="message" placeholder="Your Message to Us"></textarea>
			</label>

			<span>&nbsp;</span>
			<input type="submit" name="submit" id="btnOK" class="button" value="提交" />
			</label>
			</form>
        </div>

      </div>
    </div>
<?php
	include "foot.php";
 ?>
  
  
  </div>
</div>

</body>
</html>
