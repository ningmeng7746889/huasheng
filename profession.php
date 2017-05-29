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
          <div class="bt2">专业优势<span>PROFESSION</span></div>
          <div class="TabTitle2">
            <ul class="expmenu">
              <li onclick="javascript:document.getElementById('1F').scrollIntoView()">
                <div class="header"><a href="#1F" title="">视频编解码系统</a></div>
              </li>
              <li onclick="javascript:document.getElementById('2F').scrollIntoView()">
                <div class="header"><a href="#2F" title="">目标识别与跟踪</a></div>
              </li>
              <li onclick="javascript:document.getElementById('3F').scrollIntoView()">
                <div class="header"><a href="#3F" title="">压缩感知技术</a></div>
              </li>
              <li onclick="javascript:document.getElementById('4F').scrollIntoView()">
                <div class="header"><a href="#4F" title="">网络编码多场景传输应用技术</a></div>
              </li>
              <li onclick="javascript:document.getElementById('5F').scrollIntoView()">
                <div class="header"><a href="#5F" title="">3D实时场景生成技术</a></div>
              </li>
            </ul>
          </div>
        </div>
        
		<?php 
include "so.php";
?>

      </div>
      <div class="right1">
        <div class="position">您当前位置：<a href="index.php" title="">网站首页</a> > <a href="profession.php" title="">专业优势</a></div>
        <div class="profession">
        <dl>
        <dt id="1F">一、视频编解码系统</dt>
        <dd>

            <p class="head">1.视频图像后处理技术</p>
            <P class="txt">视频图像后处理技术使用了准确的边界匹配准则，对丢失宏块分割模式与运动矢量的恢复的相关技术，采用了H.264中帧间错误隐藏方法来尽可能的增强解码图像的主观效果，解决了网络中视频丢包现象以及解码过程中的马赛克现象等。</P>
            <p class="img"><img src="images/shipin01.png" alt="视频解码图例" /></p>
            <p class="head">2.HEVC关键技术与GPU优化</p>
            <p class="txt">在新一代视频编码标准HEVC可在保持相同图像质量的前提下，压缩比H.264/AVC高档次提高一倍。然而复杂度提高了四倍，利用GPU的并行计算架构来进行并行优化（CUDA优化）,从而极大降低了编码时延。
            </dd>
        <dt id="2F">二、目标识别与跟踪</dt>
        <dd>
        <p class="txt">考虑与空间位置相关的上下文信息（包括目标物体周围邻近的局部子区域、与目标物体运动相关的邻近其他物体），利用时间和空间上下文对目标进行定位跟踪。</p>
            <p class="img"><img width="700px" src="images/STC1.png" alt="STC" /></p>
            <p class="img"><img width="700px" src="images/STC2.png" alt="STC" /></p>
		</dd>
        <dt id="3F">三、压缩感知技术</dt>
        <dd>
        	
        	<p class="head">1.压缩感知理论和应用研究</p>
            <p class="img"><img src="images/yasuo1.png" alt="图像压缩" /></p>
<!--            <p class="txt">①基于CSEC的信源-信道编码策略</p>  
            <p class="txt">②半确定稀疏压缩感知测量矩阵设计</p>-->
        	<p class="head">2.分布式压缩感知应用技术研究</p>
            <p class="img"><img width="600px" src="images/dcs01.png" alt="DCS" /></p>
<!--            <p class="txt">①时空联合的高维信号压缩感知算法设计</p>  
            <p class="txt">②基于网络编码的DCS-EC系统设计</p>-->
        </dd>
        <dt id="4F">四、网络编码多场景传输应用技术</dt>
        <dd>
        	<p class="img"><img width="600px" alt="网络编码应用图" src="images/Nc01.png" /></p>
            <p class="head">1.广播网络中基于网络编码的重传技术</p>
            <p class="txt">采用基于网络编码的重传技术，根据一定的编码策略对丢失的数据包进行优化组合并选择发送，从而降低数据包的传输延迟，有效提高无线广播吞吐量和视频的重建质量。</p>
            <p class="img"><img width="400px" src="images/nc02.png" alt="广播网络" /></p>
            <p class="head">2.混合网络中基于网络编码的重传技术</p>
            <p class="txt">充分利用蜂窝网的传输高可靠性和广播网络的低复杂性，通过设置丢包率
门限控制两网之间的切换，以实现图像/视频的可靠高效传输。</p>
            <p class="img"><img width="400px" src="images/nc03.png" alt="混合网络" /></p>
            <p class="head">3.WSN中基于网络编码的传输策略</p>
            <p class="txt">利用无线链路的广播特性，采用基于网络编码的数据分发机制，尽快完成数据分发过程，以此来提高网络的吞吐量、传输效率以及降低能耗。</p>
            <p class="img"><img width="400px" src="images/nc04.png" alt="WSN网络" /></p>
            <p class="head">4.卫星通信中基于网络编码的路由策略</p>
            <p class="txt">采用基于编码感知的星间路由算法，即主动寻找网络编码机会的路由算法，来提高鲁棒并均衡负载。</p>
            <p class="img"><img width="400px" src="images/nc05.png" alt="卫星通信" /></p>
            <p class="head">5.深空通信中基于网络编码的协作传输策略</p>
            <p class="txt">采用基于网络编码的协作传输策略，即机会的选择网络编码，在能够进行网络编码时，根据动态变化的链路通信速率选择最优的编码数据长度，以此增大网络的吞吐量，同时，可以利用网络编码传输所产生链路冗余达到提高传输鲁棒性的目的。</p>
            <p class="img"><img width="400px" src="images/nc06.png" alt="深空通信" /></p>
        </dd>

        <dt id="5F">五、3D实时场景生成技术</dt>
        <dd>
        	<p class="img"><img width="350px" height="192px" src="images/3D-1.jpg" alt="3D" /><img width="350px" height="192px" src="images/3D-2.jpg" alt="3D" /></p>
<p class="img"><img width="350px" height="192px" src="images/3D-5.jpg" alt="3D" /><img width="350px" height="192px" src="images/3D-4.jpg" alt="3D" /></p>
        	<p class="head" style="text-align:center;">Ogre3D图形引擎</p>
            <p class="txt" style="text-align:center;">支持各种图片格式及模型导入；</p>
            <p class="txt" style="text-align:center;">支持硬件蒙皮等技术；</p>
            <p class="txt" style="text-align:center;">面向对象，单件模式设计。</p>
        </dd>
        <dt>
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
