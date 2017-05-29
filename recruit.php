<?php 
    //获得留言信息
    error_reporting(E_ALL & ~E_DEPRECATED);//忽略错误
    $db = include("config.inc.php");
    $link = mysql_connect($db["DB_HOST"],$db["DB_USER"],$db["DB_PWD"]);
    mysql_select_db($db["DB_NAME"], $link);

    mysql_query('set names utf8');
        //写sql语句获得具体留言信息
		
    $sql = "select * from recruit where status='发布' order by create_date desc ";
    //$qry = $mysqli->query($sql)
    $qry = mysql_query($sql);
    
?>
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
          <div class="bt2">人才招聘<span>RECRUIT</span></div>
          <div class="TabTitle2">
            <ul class="expmenu">
              <li>
                <div class="header"><a href="recruit.php" title="">人才招聘</a></div>
              </li>
            </ul>
          </div>
        </div>

		<?php 
include "so.php";
?>

      </div>
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="recruit.php" title="">人才招聘</a></div>
        <div class="recruit">
        <dl>
			<?php
                while($rzt = mysql_fetch_assoc($qry)){
            ?>
			<dt><?php echo $rzt['name']; ?></dt>
			<dd><p class="p1">工作职责： </p>
			<p class="p2"><?php echo $rzt['duty']; ?></p>
			<p class="p1">职位要求：</p>
			<p class="p2"><?php echo $rzt['requirement']; ?></p> 
           
			<?php } ?>
        <dt>算法工程师</dt>
		
        <dd><p class="p1">工作职责： </p>
<p class="p2">参与算法库的设计、建立，编写、测试算法</p>

<p class="p1">职位要求：</p> 
<p class="p2">1.硕士及以上学历</p> 
<p class="p2">2.有CPU和GPU优化经验值优先</p> 
<p class="p2">3.熟练掌握编程语言，能够使用解释性语言一种或几种进行算法仿真</p> 
<p class="p2">4.有数据结构和算法设计经验者优先</p> 

        <dt>硬件工程师</dt>
        <dd><p class="p1">工作职责：</p>
<p class="p2">1.芯片PCB板级原型平台设计实现，采用通用电子器件组合实现芯片功能；</p> 
<p class="p2">2.芯片原型电路设计与实现以及芯片性能验证方案制定</p> 
<p class="p2">3.完成上级主管安排的其它工作任务</p>

<p class="p1">职位要求：</p> 
<p class="p2">1.硕士及以上学历；理工类（电子，自动化，仪器仪表，电气）专业优先</p> 
<p class="p2">2.深厚的数字硬件和模拟硬件电路理论和实践知识</p>
<p class="p2">3.掌握电路原理图、PCB图设计、电路仿真，熟练掌握Altium Designer等绘图软件</p> 
<p class="p2">4.可熟练阅读并理解英文技术文档 </p></dd>
                <dt>IPC软件工程师</dt>
        <dd><p class="p1">工作职责： </p>
<p class="p2">1.负责IPC产品应用层软件设计及调试</p>
<p class="p2">2.负责嵌入式文件系统设计和维护</p>
<p class="p2">3.各种标准安防协议和私有平台协议对接</p>
<p class="p1">职位要求：</p> 
<p class="p2">1.硕士及以上学历</p> 
<p class="p2">2.熟练掌握嵌入式linux开发技术，GDB开发调试工具，熟悉linux脚本编写，Makefile文件制作</p> 
<p class="p2">3.具有ONVIF、RTSP、视音频网传、视音频存储、视音频解码显示等经验优先考虑</p> 
<p class="p2">4.能承担较大工作压力，有良好的沟通和合作能力，具有团队精神和敬业精神</p> 
<p class="p2">5.熟练掌握C，C++开发语言，精通多进程，多线程技术，在多环境进行软件开发</p></dd>
        <dt>FPGA硬件工程师</dt>
        <dd><p class="p1">工作职责： </p>
<p class="p2">1.负责FPGA相关产品的逻辑设计，包括逻辑方案设计、器件选型、代码编写、系统验证测试</p>
<p class="p2">2.编制FPGA设计各阶段文档</p>
<p class="p1">职位要求：</p> 
<p class="p2">1.硕士及以上学历</p> 
<p class="p2">2.精通VHDL/Verilog语言，具有较复杂逻辑设计经验、优良的代码编写风格；能熟练使用各种调试工具及仪器</p> 
<p class="p2">3.熟悉FPGA数字信号处理器（DSP）算法的开发与实现或有AD/DA方面经验者优先</p> 
<p class="p2">4.对单片机、DSP等嵌入式软硬件开发有经验者或有完整的基于FPGA的单板原理图设计经验者优先考虑</p> 
<p class="p2">5.具备良好的英文阅读能力，具有持续创新思维</p></dd>
        <dt>PCB工程师</dt>
        <dd><p class="p1">工作职责： </p>
<p class="p2">1.与结构设计工程师和硬件设计工程师进行良好沟通，提出合理改进意见，完成PCB的绘制</p>
<p class="p2">2.按照PCB设计规范，绘制PCB，编写PCB设计相关文档资料</p>
<p class="p2">3.跟踪PCB制造和PCBA装配过程，和相关部门密切协作，解决相关问题</p>
<p class="p1">职位要求：</p> 
<p class="p2">1.硕士及以上学历</p> 
<p class="p2">2.熟悉基本的数字模拟电路，熟悉电子产品元器件，具备良好的电子线路设计理论和实践基础</p> 
<p class="p2">3.熟练使用PCB设计工具</p> 
<p class="p2">4.熟悉PCB相关的EMI/EMC等电磁兼容的问题处理</p> 
<p class="p2">5.了解各种类型的PCB制造和PCBA装配工艺</p></dd>
        </dl>
        </div>
        <!--<div class="ym">123</div>-->
      </div>
    </div>
    
	<?php
	include "foot.php";
 ?>
 
  </div>
</div>

</body>
</html>
