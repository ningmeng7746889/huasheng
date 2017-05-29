        <div class="so">
          <div class="bt2">快速搜索<span>SEARCH</span></div>
          <div class="soso">
            <!--<form method="post" action="">-->
              <select class="wbyselect" id="selectType" name="soutype">
                <option value="product">产品</option>
                <option value="news">新闻</option>
              </select>
              <input type="text" id="search" value="-请输入关键字-" onfocus="javascript:if(this.value == '-请输入关键字-') this.value = '';" onblur="javascript:if(this.value == '') this.value = '-请输入关键字-'; " class="wbyinput" name="search"/>
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