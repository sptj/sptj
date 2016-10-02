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
else if('关灯')
{

	//$databasemanager->UpdateSwitchState(0);	
	$wechatObj->responseMsg("灯未开");
}

//$databasemanager->CloseConnect();

?>



