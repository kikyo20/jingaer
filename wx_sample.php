<?php  
/** 
  * wechat php test 
  */  
  
//define your token  
define("TOKEN", "ashin1206jingjing0817");  
$wechatObj = new wechatCallbackapiTest();//将11行的class类实例化  
//$wechatObj->valid();
$wechatObj->responseMsg();  
class wechatCallbackapiTest  
{  
    public function valid()
    {  
        $echoStr = $_GET["echostr"]; 
        if($this->checkSignature()){  
            echo $echoStr;  
            exit;  
        }  
    }  
    
   /* public function responseMsg()  
    {  
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
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
			if($keyword=="静静"){
				$contentStr="哈哈哈哈哈";
			}else{
preg_match('/(\d+)([+-\/\*])(\d+)/i',$keyword,$res);
if($res[2]=='+'){
	$result=$res[1]+$res[3];
}else if($res[2]=='-'){
	$result=$res[1]-$res[3];
}else if($res[2]=='*'){
	$result=$res[1]*$res[3];
}else if($res[2]=='/'){	
	$result=$res[1]/$res[3];
}
 $contentStr = "$res[1]"."$res[2]"."$res[3]"."=".$result;
// $contentStr = implode($res)+"...";
}
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);//
                    echo $resultStr;
                }else{  
                    echo "Input something...";
                }  
        }else {  
            echo "";
            exit;  
        }  
    }  */
    private function checkSignature()  
    {  
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
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
