
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>那年我们一起看过的大风车</title>
<style type="text/css">
#box{ 
	border:2px solid #f60; width:800px; height:600px; margin:0 auto;
}
</style>
<script type="text/javascript">
	var canvas,context;//画布、上下文
	var X,Y;//风车的圆心X坐标、Y坐标
	var canvasWidth,canvasHeight;//画布的宽高
	var speed = 1;//风车的转速、默认为1
	var R = 10;//风车的半径
	/***
		author:qingfeilee
		date:2012-03-21
		description:初始化页面函数
	*/
	function init(){
		initCanvas();
		initParams();
		draw();
		setInterval(draw,20);
	}
	/***
		author:qingfeilee
		date:2012-03-21
		description:初始化画布宽高、风车圆心坐标
	*/
	function initParams(){
		canvasWidth = canvas.width;
		canvasHeight = canvas.height;
		X = canvasWidth/2;
		Y = canvasHeight/4;
	}
	/***
		author:qingfeilee
		date:2012-03-21
		description:设置风的大小
	*/
	function setSpeed(speed){
		this.speed = speed;
	}
	/***
		author:qingfeilee
		date:2012-03-21
		description:设置风的大小
	*/
	function setR(R){
		this.R = R;
	}
	/***
		author:qingfeilee
		date:2012-03-21
		description:初始化画布
	*/
	function initCanvas(){
		try{
		canvas = document.getElementById("windmill");
		context = canvas.getContext("2d");
		}catch(e){
			document.getElementById("tip_info").innerHTML = "您的浏览器不支持！";
		}
	}
	/***
		author:qingfeilee
		date:2012-03-21
		description:绘制半圆
	*/
	function drawArc(tangle, style){
		 context.beginPath();
		 var trunkGradient = context.createLinearGradient(X, Y, X, Y+4*R);
         trunkGradient.addColorStop(0, style);
         trunkGradient.addColorStop(1, '#FFF00F');
         context.fillStyle = trunkGradient;
		 
		context.arc(X - (2*R*Math.cos(tangle)), Y - 2*R*Math.sin(tangle), 2*R, tangle, Math.PI+tangle, true);
		context.closePath();
		context.fill();
		context.save();
	}
	/***
		author:qingfeilee
		date:2012-03-21
		description:绘制手把柄
	*/
	function drawHandle(){
		 var trunkGradient = context.createLinearGradient(X, Y, X+10, Y);
         trunkGradient.addColorStop(0, '#663300');
         trunkGradient.addColorStop(0.4, '#996600');
         trunkGradient.addColorStop(1, '#552200');
         context.fillStyle = trunkGradient;
         context.fillRect(X, Y, 0.2*R, 8*R);
	}
		/***
		author:qingfeilee
		date:2012-03-21
		description:绘制文字
	*/
	function drawText(){
		 context.font = "30px 宋体 bold";
         context.textAlign = 'center';
		 context.fillText('那年我们一起看过的大风车', X, canvasWidth - 300, 300);
	}
	/***
		author:qingfeilee
		date:2012-03-21
		description:绘制函数
	*/
	var tangle = 0;
	function draw(){
		tangle = tangle + (speed*1/32)*Math.PI;
		
		context.clearRect(0,0,canvasWidth,canvasHeight);
		drawHandle();
		drawText();
		drawArc(tangle,"#552200");
		drawArc(tangle+1/2*Math.PI, "#990000");
		drawArc(tangle+Math.PI, "#0033FF");
		drawArc(tangle+3/2*Math.PI, "#225500");
		
		document.getElementById("tip_info").innerHTML = "转动角度："+parseInt(tangle)+"    当前的风速："+speed;
	}
	
	window.addEventListener("load",init,true);
</script>
</head>

<body>
	<div id="box">
		<canvas id = "windmill" style = "background-color:#001111" width = "800px" height = "600px"></canvas>
		<div id = "tip_info"></div>
        <div>
        	<button onClick="setSpeed(0)">停止</button>
        	<button onClick="setSpeed(0.1)">微风</button>
        	<button onClick="setSpeed(0.5)">小风</button>
            <button onClick="setSpeed(1)">中风</button>
            <button  onClick="setSpeed(2)">大风</button>
            <button  onClick="setSpeed(4)">狂风</button>
            |
            <button onClick="setR(5)">小号</button>
        	<button onClick="setR(20)">中号</button>
        	<button onClick="setR(30)">大号</button>
            <button onClick="setR(35)">超大号</button>
        </div>
    </div>
<!--
   ┏━━━━━━━━━━━━━━━━━━━━━┓
   ┃               脚 本 之 家                ┃
   ┣━━━━━━━━━━━━━━━━━━━━━┫
   ┃                                          ┃
   ┃           提供源码发布与下载             ┃
   ┃                                          ┃
   ┃           http://www.jb51.net            ┃
   ┃                                          ┃
   ┃            互助、分享、提高              ┃
   ┗━━━━━━━━━━━━━━━━━━━━━┛
-->

</body>
</html>
<?php



// /**
  // * wechat php test
  // */

// //define your token
// define("TOKEN", "weixin");
// $wechatObj = new wechatCallbackapiTest();
// $wechatObj->valid();
// $wechatObj->responseMsg();
// class wechatCallbackapiTest
// {
	// public function valid()
    // {
        // $echoStr = $_GET["echostr"];

        // //valid signature , option
        // if($this->checkSignature()){
        	// echo $echoStr;
        	// exit;
        // }
    // }

    // public function responseMsg()
    // {
		// //get post data, May be due to the different environments
		// $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	// //extract post data
		// if (!empty($postStr)){
                
              	// $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                // $fromUsername = $postObj->FromUserName;
                // $toUsername = $postObj->ToUserName;
                // $keyword = trim($postObj->Content);
                // $time = time();
                // $textTpl = "<xml>
							// <ToUserName><![CDATA[%s]]></ToUserName>
							// <FromUserName><![CDATA[%s]]></FromUserName>
							// <CreateTime>%s</CreateTime>
							// <MsgType><![CDATA[%s]]></MsgType>
							// <Content><![CDATA[%s]]></Content>
							// <FuncFlag>0</FuncFlag>
							// </xml>";             
				// if(!empty( $keyword ))
                // {
              		// $msgType = "text";
                	// $contentStr = "Welcome to wechat world!";
                	// $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	// echo $resultStr;
                // }else{
                	// echo "Input something...";
                // }

        // }else {
        	// echo "";
        	// exit;
        // }
    // }
		
	// private function checkSignature()
	// {
        // $signature = $_GET["signature"];
        // $timestamp = $_GET["timestamp"];
        // $nonce = $_GET["nonce"];	
        		
		// $token = TOKEN;
		// $tmpArr = array($token, $timestamp, $nonce);
		// sort($tmpArr);
		// $tmpStr = implode( $tmpArr );
		// $tmpStr = sha1( $tmpStr );
		
		// if( $tmpStr == $signature ){
			// return true;
		// }else{
			// return false;
		// }
	// }
// }

?>
<?php
// header("Content-Type:text/html; charset=utf-8");
// include('WeChatCallBackAPI.php');
// //include('MysqlDataBase.php');
// $wechatObj = new wechatCallbackapiTest();
// //$databasemanager=new MysqlManager();
// $wechatObj->valid();
// $wechatObj->MsgAnalyse();
// $Keyword=$wechatObj->GetKeyWord();
 // if($Keyword=='开灯')
 // {
	// // //$databasemanager->UpdateSwitchState(1);
	 // $wechatObj->responseMsg("灯马上就开");
 // }
 // else if($Keyword=='关灯')
// {

	// // //$databasemanager->UpdateSwitchState(0);	
	 // $wechatObj->responseMsg("灯马上就关");
 // }
 // else
 // {
	 // $wechatObj->responseMsg('对不起，仅能识别“开灯”，“关灯”这两个关键词~');
// }

// //$databasemanager->CloseConnect();

?>



