

<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

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



