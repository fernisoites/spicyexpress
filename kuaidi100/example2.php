<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>快递单号获取接口API - Example</title>
	<script language="javascript" src="jquery-1.4.4.min.js"></script>
	<script language="javascript">
	$(document).ready(function()
	{
		$("#btnSnap").click(function()
		{
			$("#retData").html('loading...');
 
			var expressid = $("#expressid").val();
            var expressno = $("#expressno").val();
			$.get("get.php",{com:expressid,nu:expressno},
				function(data)
				{
//					$("#retData").html(data);
//
//					var retData = eval(data);
//					var retMsg = '';
//					var j = 0;
//
//					for (var i=0;i<retData.length;i++)
//					{
//						if (i == retData.length -1)
//						{
//							retMsg += "<font color='#CC0000'>" + retData[i].item + "</font><br/>";
//						}else{
//							retMsg += retData[i].item + "<br/>";
//						}
//					}
//					
					$("#retData").html(data);
				}
			);
 
			return false;
		});
	});
	</script>
	<style> 
	#retForm{width:640px;line-height:22px;padding-bottom:10px;border-bottom:1px dotted #ccc;}
	#retData{
	background:#efefef;
	padding:10px;
	line-height:18px;
	width: 96%;
	border: 0;
}
	.txtPartner{width:960px;margin:20px 10px;padding:10px 0 0 0;border-top:1px solid #dfdfdf;}
	.txtPartner h1{font-size:14px;color:#FF5632;}
	.txtPartner a{float:left;margin:0 10px 10px 0;}
    .logo {
	font-size: 18px;
	font-weight: bold;
	text-align: center;
	padding: 10px;
	font-family: "微软雅黑";
}
    .txtURL {
	font-size: 12px;
	padding: 10px;
}
    </style>
</head>
 
<body>
<div class="result">
	<div class="logo"><a href="http://www.kuaidi100.com/" title="">快递100</a><br />
    快递100提供一站式的快递查询服务，涵盖近百家常用快递公司，支持手机查快递。并为B2C等网络应用提供免费的快递查询接口（API）。</div>
<div class="seatchForm">
		<div class="txtURL">
          <p>快递公司：
          <input name="expressid" type="text" id="expressid" value="tnt"/> 
		  快递单号：<input name="expressno" type="text" id="expressno" value="382351534"/>
		  </p>
          <p>说明：查询时需要发送两个参数：公司名（拼音或英文）；快递单号</p>
</div>
		<div class="txtButton"><input type="submit" value="查询" id="btnSnap" class="btnSnap"/></div>
	</div>
	<div class="txtAboutSnap">
		<p>获取范例：</p>
		<div id="retData"></div>
		<p>快递100查询接口(API), 全自动识别验证系统。快速返回快递单号查询结果。http://www.kuaidi100.com</p>
	</div>
</div>
<button type="button" onclick="myFunction()">382351534</button>
<div id="retData"></div>



<?php   $var = '123';
        $link_address = 'http://baidu.com';
        $trkID = 'fedex';
        $trkNo = '640436067274';
         ?>  

</div>
</p>
<?php   $var = '123';
        $link_address = 'http://baidu.com';
        $trkID2 = 'usps';
        $trkNo2 = '9400109699937264542083';
         ?>  

</div>
</p>


<?php
echo "<h2>before</h2>";
$result = "http://baidu.com";
echo "test";
echo "<a href=example.html?id=" . $trkID . ";trk=" . $trkNo . ">" . $trkNo . " </a>";
?>

</div>

</p>


<?php
echo "<h2>before</h2>";
$result = "http://baidu.com";
echo "test";
echo "<a href=example.html?id=" . $trkID2 . ";trk=" . $trkNo2 . ">" . $trkNo2 . " </a>";
?>

</div>

</p>

<form action="page02.php" method="post">            
	<input type="submit" name="submit" value="提交" /> 
</form>

</p>

<div class="seatchForm">
		<div class="txtURL">
          <p>快递公司：
          <input name="expressid" type="text" id="expressid" value="tnt"/> 
		  快递单号：<input name="expressno" type="text" id="expressno" value="382351534"/>
		  </p>
          <p>说明：查询时需要发送两个参数：公司名（拼音或英文）；快递单号</p>
</div>
		<div class="txtButton"><input type="submit" value="查询" id="btnSnap" class="btnSnap"/></div>
	</div>
	<div class="txtAboutSnap">
		<p>获取范例：</p>
		<div id="retData"></div>
		<p>快递100查询接口(API), 全自动识别验证系统。快速返回快递单号查询结果。http://www.kuaidi100.com</p>
	</div>
</div>


</body>
 
</html>