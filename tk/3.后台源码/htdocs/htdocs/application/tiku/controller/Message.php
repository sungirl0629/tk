<?php
namespace app\admin\Controller;
use think\Controller;

/**
 * 网页云信-手机验证码
 * @author   suker   
 * @version  1.0.1
 * @datetime 2017-03-23 T21:51:08+0800
 */
class Message extends Controller
{
	//开发者平台分配的AppKey-自己去申请免费20条测试-key一定要有效
	//http://netease.im/sms?from=bdjjdx2630
	 private $AppKey='37206cc1f822ae09bf84b935825e98b2';      
	 //开发者平台分配的AppSecret,可刷新
    private $AppSecret='218f8254705a';     
	//随机数（最大长度128个字符）        
    private $Nonce;		
	//当前UTC时间戳，从1970年1月1日0点0 分0 秒开始到现在的秒数(String)
    private $CurTime;             	
    private $CheckSum;				//SHA1(AppSecret + Nonce + CurTime),三个参数拼接的字符串，进行SHA1哈希计算，转化成16进制字符(String，小写)
	const   HEX_DIGITS = "0123456789abcdef";

	 /**
	 * 调用此方法发送验证码
	 * @author   suker   
	 * @version  1.0.1
	 * @datetime 2017-03-23 T21:51:08+0800
	 */
	 public function sendMessage()
	{
		 $mobile=input('post.telphone');
		 //$mobile="15562195951";
		//接受页面的传值--略
		
		 $url = 'https://api.netease.im/sms/sendcode.action';
        $data= array(
           'mobile'=>$mobile,  //发给xx手机
						'deviceId'=>'',          //设备信息，可为空
						'templateid'=>'3049851',      //可为空
						'codeLen'=>'4'         //验证码位数
        );
		
      $result = $this->postDataCurl($url,$data);
	  
	  //此处可以将信息存储到session中用于验证
	  return json($result);
	}
	 
	  public function postDataCurl($url,$data){
        $this->checkSumBuilder();       //发送请求前需先生成checkSum

        $timeout = 5000;
        $http_header = array(
            'AppKey:'.$this->AppKey,
            'Nonce:'.$this->Nonce,
            'CurTime:'.$this->CurTime,
            'CheckSum:'.$this->CheckSum,
            'Content-Type:application/x-www-form-urlencoded;charset=utf-8'
        );

        $postdataArray = array();
        foreach ($data as $key=>$value){
            array_push($postdataArray, $key.'='.urlencode($value));
        }
        $postdata = join('&', $postdataArray);
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_POST, 1);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt ($ch, CURLOPT_HEADER, false );
        curl_setopt ($ch, CURLOPT_HTTPHEADER,$http_header);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER,false); //处理http证书问题
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        if (false === $result) {
            $result =  curl_errno($ch);
        }
        curl_close($ch);
        return $this->json_to_array($result) ;
    }
	
	
	  /**
     * API checksum校验生成
     * @param  void
     * @return $CheckSum(对象私有属性)
     */
    private function checkSumBuilder(){
        //此部分生成随机字符串
        $hex_digits = self::HEX_DIGITS;
        $this->Nonce;
        for($i=0;$i<128;$i++){			//随机字符串最大128个字符，也可以小于该数
            $this->Nonce.= $hex_digits[rand(0,15)];
        }
        $this->CurTime = (string)(time());	//当前时间戳，以秒为单位

        $join_string = $this->AppSecret.$this->Nonce.$this->CurTime;
        $this->CheckSum = sha1($join_string);
    }
	
	 private function json_to_array($json_str){
      

        if(is_array($json_str) || is_object($json_str)){
            $json_str = $json_str;
        }else if(is_null(json_decode($json_str))){
            $json_str = $json_str;
        }else{
            $json_str =  strval($json_str);
            $json_str = json_decode($json_str,true);
        }
        $json_arr=array();
        foreach($json_str as $k=>$w){
            if(is_object($w)){
                $json_arr[$k]= $this->json_to_array($w); 
            }else if(is_array($w)){
                $json_arr[$k]= $this->json_to_array($w);
            }else{
                $json_arr[$k]= $w;
            }
        }
        return $json_arr;
    }
}