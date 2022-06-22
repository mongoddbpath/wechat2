<?php

namespace Front\Controller;
use Think\Controller;
class UploadController extends FrontBaseController {
	public function upload(){
		//上传文件目录获取
		$month = date('Ym',time());
		$dir = APP_PATH."../Upload/".$month."/";
		//初始化返回数组
		$arr = array(
			'code' => 0,
			'msg'=> '',
			'data' =>array(
			    //'src' => $dir.$_FILES["file"]["name"]
			)
		);
		$file_info = $_FILES['file'];
		$file_error = $file_info['error'];
		if(!is_dir($dir))//判断目录是否存在
		{	
		    $rs = mkdir ($dir,0777,true);//如果目录不存在则创建目录
		}
		$file = $dir.$_FILES["file"]["name"];
		if(!file_exists($file))
		{
			if($file_error == 0){
					$extension = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION); 
					//获取随机数
					$new_name = time().rand(100000,999999).".".$extension;
					$file = $dir.$new_name;
			        if(move_uploaded_file($_FILES["file"]["tmp_name"],$dir. $new_name)){
					//if(move_uploaded_file($_FILES["file"]["tmp_name"],$dir. $_FILES["file"]["name"])){
			           $arr['data'] = "/Upload/".$month."/".$new_name;
			           $arr['msg'] ="上传成功";
			        }
			    }else{
			        switch($file_error){
			            case 1:
			           $arr['msg'] ='上传文件超过了PHP配置文件中upload_max_filesize选项的值';
			                break;
			            case 2:
			              $arr['msg'] ='超过了表单max_file_size限制的大小';
			                break;
			            case 3:
			               $arr['msg'] ='文件部分被上传';
			                break;
			            case 4:
			              $arr['msg'] ='没有选择上传文件';
			                break;
			            case 6:
			                $arr['msg'] ='没有找到临时文件';
			                break;
			            case 7:
			            case 8:
			               $arr['msg'] = '系统错误';
			                break;
			        }
			    }
			}
			else
			{
				$arr['code'] ="1"; 
			    $arr['msg'] = "当前目录中，文件".$file."已存在";
			} 
		    echo json_encode($arr);
	}

	public function sfzupload(){
		$dataok = I('post.');

		$url = "http://shenfenzhe.market.alicloudapi.com/do";//支持https 如需https请修改 
    	$method = "1";//post=1 get=0
    	$appcode = "989ba257787e44e3819b01af148b247e";
		
	$data = array(
			'image'=>$dataok['url'],//身份证图片远程地址（确保可以访问）
			'id_card_side'=>'front',//身份证正反面参数， 正面 front 反面 back
			);
	$data = http_build_query($data);
 
	$result = $this->api51_curl($url,$data,$method,$appcode);
	
	// 返回数据OK
	$this->ajaxReturn(json_decode($result,true));
		
	}

	public function api51_curl($url,$data=false,$ispost=0,$appcode){
		$headers = array();
		//根据阿里云要求，定义Appcode
		array_push($headers, "Authorization:APPCODE " . $appcode);
		array_push($headers, "Content-Type".":"."application/x-www-form-urlencoded; charset=UTF-8");
  
		$httpInfo = array();
		 
		$ch = curl_init();
  		curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
		curl_setopt( $ch, CURLOPT_USERAGENT , 'api51.cn' );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 300 );
		curl_setopt( $ch, CURLOPT_TIMEOUT , 300);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_HEADER, false);
		   curl_setopt($ch, CURLOPT_FAILONERROR, false);
           if (1 == strpos("$".$url, "https://"))
            {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            }
		if($ispost)
		{
			 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt( $ch , CURLOPT_POST , true );
			curl_setopt( $ch , CURLOPT_POSTFIELDS , $data );
			curl_setopt( $ch , CURLOPT_URL , $url );
		}
		else
		{
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			if($data){
				curl_setopt( $ch , CURLOPT_URL , $url.'?'.$data );
			 
			}else{
				curl_setopt( $ch , CURLOPT_URL , $url);
			}
			
		}
		$response = curl_exec( $ch );
 
		if ($response === FALSE) {
			// echo "cURL Error: " . curl_error($ch);
			return false;
		}
		$httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
		$httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
		curl_close( $ch );
		return $response;
		
	}
	
}