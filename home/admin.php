<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>华晟电子科技有限公司</title>


<link rel="stylesheet" href="../../../public/Css/admin/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../../../public/Css/admin/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../../../public/Css/admin/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="../../../public/Js/admin/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../../public/Js/admin/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="../../../public/Js/admin/facebox.js"></script>
<script type="text/javascript" src="../../../public/Js/admin/jquery.wysiwyg.js"></script>

</head>

<body>
<div id="body-wrapper">

  <div id="sidebar">
    <div id="sidebar-wrapper">
     
      	<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
      	<img id="logo" src="../../../public/Images/admin/logo.png" alt="Simpla Admin logo" />

      	<div id="profile-links"> 
      		您好,<a href="#" title="当前用户:{$username}">{$username}</a> |
	 		<a href="__URL__/quit" title="退出">退出</a> 
       	</div>
       	
	    <ul id="main-nav">
     		<!-- 类型为nav-top-itrm current 表示选中时的样式 -->
     		 <li> <a href="#" class="nav-top-item">账号设置  User</a>
	          <ul>
	            <li><a href="#">密码更改</a></li>
	            <li><a href="#">新增账户</a></li>
	          </ul>
	        </li>
	        
	        <li> <a href="#" class="nav-top-item current">留言板  Contact</a>
	          <ul>
	            <li><a class="current" href="#">当前留言</a></li>
	          </ul>
	        </li>
	             
	     </ul>
         
    </div>
  </div>
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
    <h2>后台管理系统</h2>
	<br></br>
	
    <!--<ul class="shortcut-buttons-set">
      <li>
      	<a class="shortcut-button" href="#">
      		<span> 
      			<img src="../../../public/Images/admin/icons/pencil_48.png" alt="icon" /><br />
        		写文章
        	</span>
        </a>
      </li>
      
      <li>
      	<a class="shortcut-button" href="__URL__/article">
      		<span> 
      			<img src="../../../public/Images/admin/icons/paper_content_pencil_48.png" alt="icon" /><br />
        		写新闻
        	</span>
        </a>
      </li>
      
      
    </ul>-->
    

    <div class="clear"></div>
    
    

    <div class="content-box">
    
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3></h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">最新留言(共{$news_count}篇)</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">所有留言</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../../../public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，下面是最近添加的留言！ </div>
          </div>
          
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th>
                 
                </th>
                <th>文章标题</th>
                <th>作者</th>
                <th>添加时间</th>
                <th>最后修改</th>	 
                <th>选项</th>
              </tr>
            </thead>
              
            <!-- 表内容部分 -->
            <tbody>
              <volist name="news_list" id="vo">
              <tr>
                <td></td>
                <td>{$vo['subject']} </td>
                <td><a href="#" title="title">{$vo['author']}</a></td>
                <td>{$vo['createtime']}</td>
                <td>{$vo['lastmodifytime']} </td>
                <td>
                  <!-- Icons -->
                  <a href="__URL__/edit/id/{$vo['id']}" title="编辑"><img src="../../../public/Images/admin/icons/pencil.png" alt="编辑" /></a> 
                  <a href="__URL__/delete/id/{$vo['id']}" title="删除"><img src="../../../public/Images/admin/icons/cross.png" alt="删除" /></a> 
                </td>
              </tr>  
              </volist>                        
            </tbody>
            
              <!-- 表尾 -->
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="pagination">               	  
                  	{$page_method}
                  <!--
                  	<a href="#" title="First Page">&laquo; First</a>
                  	<a href="#" title="Previous Page">&laquo; Previous</a> 
                  	<a href="#" class="number" title="1">1</a> 
                  	<a href="#" class="number" title="2">2</a> 
                  	<a href="#" class="number current" title="3">3</a> 
                  	<a href="#" class="number" title="4">4</a> 
                  	<a href="#" title="Next Page">Next &raquo;</a>
                  	<a href="#" title="Last Page">Last &raquo;</a> 
                  -->
                  </div>                 
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        
        
        
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../../../public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，下面是最近添加的留言！ </div>
          </div>
          
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th>
                 
                </th>
                <th>文章标题</th>
                <th>作者</th>
                <th>添加时间</th>
                <th>最后修改</th>	 
                <th>选项</th>
              </tr>
            </thead>
              
            <!-- 表内容部分 -->
            <tbody>
              <volist name="news_list" id="vo">
              <tr>
                <td></td>
                <td>{$vo['subject']} </td>
                <td><a href="#" title="title">{$vo['author']}</a></td>
                <td>{$vo['createtime']}</td>
                <td>{$vo['lastmodifytime']} </td>
                <td>
                  <!-- Icons -->
                  <a href="__URL__/edit/id/{$vo['id']}" title="编辑"><img src="../../../public/Images/admin/icons/pencil.png" alt="编辑" /></a> 
                  <a href="__URL__/delete/id/{$vo['id']}" title="删除"><img src="../../../public/Images/admin/icons/cross.png" alt="删除" /></a> 
                </td>
              </tr>  
              </volist>                        
            </tbody>
            
              <!-- 表尾 -->
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="pagination">               	  
                  	{$page_method}
                  <!--
                  	<a href="#" title="First Page">&laquo; First</a>
                  	<a href="#" title="Previous Page">&laquo; Previous</a> 
                  	<a href="#" class="number" title="1">1</a> 
                  	<a href="#" class="number" title="2">2</a> 
                  	<a href="#" class="number current" title="3">3</a> 
                  	<a href="#" class="number" title="4">4</a> 
                  	<a href="#" title="Next Page">Next &raquo;</a>
                  	<a href="#" title="Last Page">Last &raquo;</a> 
                  -->
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
   

    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2016 华晟电子科技有限公司 | Powered by <a href="#">admin templates</a> | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
