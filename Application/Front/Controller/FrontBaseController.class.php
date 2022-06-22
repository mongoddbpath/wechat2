<?php
// 本类由系统自动生成，仅供测试用途
namespace Front\Controller;
use Think\Controller;
class FrontBaseController extends Controller {

	public function echoAjaxRequest($status=1,$msg="操作成功",$data=array()){
		$result = array(
			'status' => $status ,
			'msg' => $msg ,
			'data' => $data
		);
		$this->ajaxReturn($result);
	}

	public function _initialize()
    {
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Credentials:true');
		header("Access-Control-Allow-Headers: access-token,access_token,Content-Type");
		// 强行把原来的Post的数据变成$_POST
		if(!I('')) {
			$request_data = file_get_contents('php://input');
			$request_data = json_decode($request_data, true);
			foreach ($request_data as $key => $value) {
				$_POST[$key]=$value;
			}
		}
    }

	public function hasarrnull($arr)
	{
		$hasarrnull = false;
		foreach($arr as $k=>$v){
		if($v==''){ $hasarrnull = true; }
		if($k == 'note' && $v==''){ $hasarrnull = false; }
		}
		return $hasarrnull;
	}

	public function isnotmobile($phonenumber){
		$a = false;
		if(preg_match("/^1[34578]{1}\d{9}$/",$phonenumber)){
		}else{
			$a = true;
		}
		return $a;
	}

	#验证邮箱函数的使用
	function check_email($email)
	{
    $result = trim($email);//trim方法去除首位的空格
    if (filter_var($result, FILTER_VALIDATE_EMAIL)) {
        return "true";
    } else {
        return "false";
    }
	}

}