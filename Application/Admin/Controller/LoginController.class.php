<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index(){
		$this->display("login");
    }
    
    public function doLogin(){
    	$username = I("username");
    	$password = I("password");
    	$cd = array(
    		'username' => $username,
    		'is_delete' => 0 ,
    		'status' => 1 
    	);
    	$result = M('user')->where($cd)->find();
    	if($result){
    		if($result['password'] !== md5($password)){
    			echo json_encode(array("status"=>0,"msg"=>"密码错误"));	
    		}else{
    			$data = array(
    				'last_login_time' => time() ,
    				'login_ip' => getIp()
    			);
    			M('user')->where( array('user_id'=>$result['user_id']))->save($data);

				// 获取当前用户的所有角色权限
				$resRoleAuth = $this->resUserAuth($result['user_id'],'','alldata');
				// 获取用户所有的职位
				$user_position = M('user_position as user_position')
				->field('position.*')
				->join('al_position as position ON position.position_id = user_position.position_id')
				->where(['user_position.user_id'=>$result['user_id']])
				->select();
				
				// 缓存权限
				$session_data = [];
				foreach ($resRoleAuth as $key => $value) {
					if ($value['controller'] != null && $value['action'] != null) {
						$session_data[$value['controller']][$value['action']] = true;
					}
				}
				// 缓存职位
				$session_data['role'] = [];
				foreach ($user_position as $key => $value) {
					array_push($session_data['role'],$value['position_id']);
				}
				// 缓存登录令牌
				$token = base64_encode($username.':'.md5($result['username'].'chuangli'.$result['password']));

    			session("token",$token);

				session('user_auth',$session_data);
				session('user_auth_time',time());

    			session("admin_id",$result['user_id']);
    			session("username",$result['username']);
    			session("nickname",$result['nickname']);
    			echo json_encode(array("status"=>1,"msg"=>"登陆成功"));		
    		}
    	}else{
    		echo json_encode(array("status"=>0,"msg"=>"帐号不存在"));
    	}
    }


    public function logout(){
    	session("admin_id",false);
		session("username","");
		session("nickname","");
		$this->display("login");
    }


	//返回用户权限
    /*
		$user_id 类型:int 描述：用户user_id -必填
    	$u_where 类型:array 描述：自定义查询条件 -可选
    	$type 类型:string 参数:alldata 描述：返回数据类型 -可选
	*/

    public function resUserAuth($user_id,$u_where = array(),$type = null){

		$pre = C('DB_PREFIX');

        //获取用户已拥有的权限
        $userAuth = M('user_role')
			->field('role.auth_id')
			->join("{$pre}role as role ON role.role_id = {$pre}user_role.role_id")
			->where(array("{$pre}user_role.user_id"=>$user_id))
			->select();

		//合并权限提取并集
		foreach ($userAuth as $key => $value) {
			$authStr .= $value['auth_id'].',';
		}
		$userAuth = array_values(array_unique(explode(',',$authStr)));
		
        //遍历权限-生成一次性查询语句
        $authWhere = array();
        foreach ($userAuth as $key => $value) {
			if ($value != null) {
				array_push($authWhere,array('eq',$value));
			}
        }
        array_push($authWhere,array('or'));

        //通用查询语句
        $sql_where = array(
            'auth_id'=>$authWhere
        );

        if($u_where != null){
            $userMenu = M('role_auth')->order('sort desc')->where(array($sql_where,$u_where))->select();
        }else{
            $userMenu = M('role_auth')->order('sort desc')->where($sql_where)->select();
        }
        //返回权限id字符串
        if(strcasecmp($type,"string") == 0){
            foreach ($userMenu as $key => $value) {
                $userMenuStr .= $value['auth_id'].',';
            }
            return $userMenuStr;
        }
        //返回权限id数组
        else{
            $userMenuArr = array();
            foreach ($userMenu as $key => $value) {
                //是否返回所有参数数据
                if(strcasecmp($type,"alldata") == 0){
                    array_push($userMenuArr,$value);
                }
                //只返回id数据
                else{
                    array_push($userMenuArr,$value['auth_id']);
                }
            }
        }

        //返回数组
        return $userMenuArr;
    }
}