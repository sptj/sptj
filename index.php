<?php
header("Content-Type:text/html; charset=utf-8");
include('WeChatCallBackAPI.php');
include('MysqlDataBase.php');
$wechatObj = new wechatCallbackapiTest();
$databasemanager=new MysqlManager();
$wechatObj->valid();
$wechatObj->MsgAnalyse();
$Keyword=$wechatObj->GetKeyWord();
if($Keyword=='开灯')
{

	$databasemanager->UpdateSwitchState(1);
	$wechatObj->responseMsg("灯马上就开");
}
else if($Keyword=='关灯')
{

	$databasemanager->UpdateSwitchState(0);	
	$wechatObj->responseMsg("灯马上就关");
}
else
{
	$wechatObj->responseMsg('对不起，仅能识别“开灯”，“关灯”这两个关键词~');
}

$databasemanager->CloseConnect();

?>



