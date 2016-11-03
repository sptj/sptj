<?php
header("Content-Type:text/html; charset=utf-8");
include('WeChatCallBackAPI.php');
//include('MysqlDataBase.php');
$wechatObj = new wechatCallbackapiTest();
//$databasemanager=new MysqlManager();
$wechatObj->valid();
$wechatObj->MsgAnalyse();
$Keyword=$wechatObj->GetKeyWord();
if($Keyword=='开灯')
{

	//$databasemanager->UpdateSwitchState(1);
	$wechatObj->responseMsg("灯已开");
}
else if($Keyword=='关灯')
{

	//$databasemanager->UpdateSwitchState(0);	
	$wechatObj->responseMsg("就不关");
}
else
{
	$wechatObj->responseMsg("没有此指令");	
}
//$databasemanager->CloseConnect();

?>



