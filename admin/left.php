<!-- 类型为nav-top-itrm current 表示选中时的样式 -->
<div id="sidebar">
    <div id="sidebar-wrapper">
     
      	<h1 id="sidebar-title"><a href="#">管理员</a></h1>
      	<img id="logo" src="../images/logo_black.jpg" width="150px" alt="Simpla Admin logo" />

      	<div id="profile-links"> 
      		您好,<a href="#" title="当前用户:{$username}">管理员</a> |
	 		<a href="../bll/admin_exit.php" title="退出">退出</a> 
       	</div>
       	
	    <ul id="main-nav">
     		<!-- 类型为nav-top-itrm current 表示选中时的样式 -->
     		 <li> <a href="#" class="nav-top-item">账号设置  User</a>
	          <ul>
	            <li><a href="pwd_update.php">密码更改</a></li>
	            <li><a href="user_list.php">新增账户</a></li>
	          </ul>
	        </li>
	        
	        <li> <a href="#" class="nav-top-item">留言板  Contact</a>
	          <ul>
	            <li><a class="" href="message.php">当前留言</a></li>
	          </ul>
	        </li>
			
			<li> <a href="#" class="nav-top-item">新闻与动态  News</a>
	          <ul>
	            <li><a class="" href="news_list.php">公司新闻</a></li>
				<li><a class="" href="trend_list.php">行业动态</a></li>
	          </ul>
	        </li>
			
			<li> <a href="#" class="nav-top-item">产品与方案  Product</a>
	          <ul>
	            <li><a class="" href="product_list.php">产品展示</a></li>
				<li><a class="" href="case_list.php">解决方案</a></li>
	          </ul>
	        </li>
	             
			<li> <a href="#" class="nav-top-item">其他  Others</a>
	          <ul>
	            <li><a class="" href="file_list.php">资料下载</a></li>
				<li><a class="" href="recruit_list.php">人才招聘</a></li>
	          </ul>
	        </li>
			
	     </ul>
         
    </div>
  </div>