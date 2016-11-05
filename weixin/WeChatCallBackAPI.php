<?php
define("TOKEN", "sptj1993");

class wechatCallbackapiTest
{
	private $postObj;
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

		if( $tmpStr == $signature )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        if($this->checkSignature())
		{
			header('content-type:text');
        	echo $echoStr;
        }
    }
 	
	public function MsgAnalyse()
	{
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		$this->postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
	}
	
	public function GetKeyWord()
	{
		$keyword = trim($this->postObj->Content);	
		return 	$keyword;
	}
	
    public function responseMsg($sptj)
    {             
		$fromUsername = $this->postObj->FromUserName;
		$toUsername   = $this->postObj->ToUserName;
		$time = time();
		$textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>0</FuncFlag>
					</xml>";             
		$msgType = "text";
		$contentStr = $sptj;
		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
		echo $resultStr;
    }
	
}

?>





