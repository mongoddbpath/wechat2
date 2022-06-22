<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class AdminBaseController extends Controller {

	public function _initialize(){
		// $units[]=md5(uniqid(md5(microtime(true)),true));
		$admin_id = session("admin_id"); // 登陆人id
		$user_auth = session("user_auth"); // 登录人权限
		$user_auth_time = session("user_auth_time"); // 时间
		$token = session("token"); // 登录令牌
		//解码得到令牌信息
		$token_info = explode(":",base64_decode($token));
		$token_id = $token_info[0]; // 账号名
		$token_md5 = $token_info[1]; // 加密字符
	
		$user_info = M('user')->where(['user_id'=>$admin_id])->find();

		// 检测角色状态 - 修改用户角色后session缓存导致只要不退出账号，权限一直在的问题 
		$user_position = M('user_position as user_position')
			->field('position.*')
			->join('al_position as position ON position.position_id = user_position.position_id')
			->where(['user_position.user_id'=>$result['user_id']])
			->select();
		$position_arr = [];
		foreach ($user_position as $key => $value) {
			array_push($position_arr,$value['position_id']);
		}
		$a = array_diff($position_arr,$user_auth['role']);
		$b = array_diff($user_auth['role'],$position_arr);
		$role_state = array_merge($a,$b);
		if ($role_state != null) {
			// 重新缓存用户权限
			$this->reloadSessionCache($admin_id);
			if (IS_POST) {
				$this->echoAjaxRequest(0,"您的权限组发生修改，请重新操作");
			}else {
				echo "<script>window.parent.location.href='/index.php/Admin';</script>";
				exit;
			}
		}
	
		// 检测权限时间 - 修改角色权限后session缓存导致只要不退出账号，权限一直在的问题
		$is_auth_time = M('user_role as user_role')
			->field('role.update_time')
			->join("al_role as role ON role.role_id = user_role.role_id")
			->where(array("user_role.user_id"=>$admin_id))
			->select();

		foreach ($is_auth_time as $key => $value) {
			// 权限缓存时间小于权限修改时间 - 权限过期重新登录
			if ( $user_auth_time < $value['update_time'] ) {
				// 重新缓存用户权限
				$this->reloadSessionCache($admin_id);
				if (IS_POST) {
					$this->echoAjaxRequest(0,"您的权限组发生修改，请重新操作");
				}else {
					echo "<script>parent.location.href='/index.php/Admin';</script>";
					exit;
				}
			}
		}

		//检测用户权限 - 系统存在当前操作权限，但是用户不存在权限时重新登录
		$is_auth = M('role_auth')->where(['controller'=>CONTROLLER_NAME,'action'=>ACTION_NAME])->find();
		if ( $is_auth != null && $user_auth[CONTROLLER_NAME][ACTION_NAME] != true ) {
			if (IS_POST) {
				$this->echoAjaxRequest(0,"您没有此权限操作"); 
			}else {
				echo "您没有权限操作";
				exit;
			}
			//parent.location.href='/index.php/Admin/Login';
		}

		if(empty($admin_id)){
			redirect('/index.php/Admin/Login');
		}
		
		// 账号状态
		if ($user_info['status'] == 0) {
			if (IS_POST) {
				$this->echoAjaxRequest(0,'账号状态为待审核，无法继续完成操作'); 
			}else{
				echo "<script>alert('账号状态为待审核，无法继续完成操作');window.location.href='/index.php/Admin/Login';</script>";
				exit;
			}
		}else if($user_info['status'] == 2){
			if (IS_POST) {
				$this->echoAjaxRequest(0,'账号状态为冻结，无法继续完成操作'); 
			}else{
				echo "<script>alert('账号状态为冻结，无法继续完成操作');window.location.href='/index.php/Admin/Login';</script>";
				exit;
			}
		}
		if($user_info['is_delete'] == 1){
			if (IS_POST) {
				$this->echoAjaxRequest(0,'账号已被删除，无法继续完成操作'); 
			}else{
				echo "<script>alert('账号已被删除，无法继续完成操作');window.location.href='/index.php/Admin/Login';</script>";
				exit;
			}
		}

		// 判断登录令牌
		if ( $token_md5 != md5($user_info['username'].'chuangli'.$user_info['password']) ) {
			if (IS_POST) {
				$this->echoAjaxRequest(0,'账号信息已失效，请重新登录'); 
			}else{
				echo "<script>alert('账号信息已失效，请重新登录');window.location.href='/index.php/Admin/Login';</script>";
				exit;
			}
		}

		//查询当前用户管理的所有项目
        $sql = " SELECT * from al_user_item WHERE user_id = '{$admin_id}' ";
        $result = M()->query($sql);
        $item_nos = array();
        foreach($result as $key => $val){
            $sql = " SELECT * FROM `al_item` WHERE   path like '%/{$val['item_id']}/%' or item_id='{$val['item_id']}' ";
            $result = M()->query($sql); 
            foreach($result as $k => $v){
                if(!in_array($v['item_no'], $item_nos)){
                  $item_nos[] = $v['item_no'];
                }
            }
        }
        $this->item_nos = $item_nos ;

		$this->assign("user_auth",session('user_auth'));
		$this->assign("nickname",session('nickname'));
		$this->assign("username",session('username'));
		$this->assign("user_id",session('user_id'));
		$this->assign("lay_id",md5('/index.php/Admin/Role/add'));
	}


	public function echoAjaxRequest($status=1,$msg="操作成功",$data=array()){
		$result = array(
			'status' => $status ,
			'msg' => $msg ,
			'data' => $data
		);
		$this->ajaxReturn($result);
	}

	// 返回角色权限菜单
	// $role_id 描述：角色id -必填
    // $u_where 参数:array 描述：自定义查询条件 -可选
    // $type 参数:string 参数:alldata 描述：返回数据类型 -可选
    // $is_parent 参数：array 描述：过虑父节点,解决alyui前端tree权限分配时父节点导致的选择问题 -可选

	public function resRoleAuth($role_id,$u_where = array(),$type = null,$is_parent = false){

        // 获取用户已拥有的权限
        $userAuth = M('role')
			->field('auth_id')
			->where(array("role_id"=>$role_id))
			->find();

		// 拆分权限字符串为数组
		$userAuth = explode(',',$userAuth['auth_id']);
		// 遍历权限-生成一次性查询语句
		$authWhere = array();
		foreach ($userAuth as $key => $value) {
			if ($value != null) {
				array_push($authWhere,array('eq',$value));
			}
		}
		array_push($authWhere,array('or'));

        // 通用查询语句
        $sql_where = array(
            'auth_id'=>$authWhere,
			'state'=>1
        );
		// 剔除父节点数据
		!$is_parent or $sql_where['is_parent']=0;

        if($u_where != null){
            $userMenu = M('role_auth')->order('sort asc')->where(array($sql_where,$u_where))->select();
        }else{
            $userMenu = M('role_auth')->order('sort asc')->where($sql_where)->select();
        }
		// dump(M()->getLastSql());
		// exit;
        // 返回权限id字符串
        if(strcasecmp($type,"string") == 0){
            foreach ($userMenu as $key => $value) {
                $userMenuStr .= $value['auth_id'].',';
            }
            return $userMenuStr;
        }
        // 返回权限id数组
        else{
            $userMenuArr = array();
            foreach ($userMenu as $key => $value) {
                // 是否返回所有参数数据
                if(strcasecmp($type,"alldata") == 0){
                    array_push($userMenuArr,$value);
                }
                // 只返回id数据
                else{
                    array_push($userMenuArr,$value['auth_id']);
                }
            }
        }

        // 返回数组
        return $userMenuArr;
	}

	//返回用户权限
    /*
		$user_id 类型:int 描述：用户user_id -必填
    	$u_where 类型:array 描述：自定义查询条件 -可选
    	$type 类型:string 参数:alldata 描述：返回数据类型 -可选
		$not_menu 类型:bool 参数:true/false 描述：排除导航权限，只返回操作权限
	*/

    public function resUserAuth($user_id,$u_where = array(),$type = null,$not_menu = false){

        // 获取用户已拥有的权限
		$pre = C('DB_PREFIX');
        $userAuth = M('user_role')
			->field('role.auth_id')
			->join("{$pre}role as role ON role.role_id = {$pre}user_role.role_id")
			->where(array("{$pre}user_role.user_id"=>$user_id))
			->select();

		// 合并权限提取并集
		foreach ($userAuth as $key => $value) {
			$authStr .= $value['auth_id'].',';
		}
		$userAuth = array_values(array_unique(explode(',',$authStr)));
		
        // 遍历权限-生成一次性查询语句
        $authWhere = array();
        foreach ($userAuth as $key => $value) {
			if ($value != null) {
				array_push($authWhere,array('eq',$value));
			}
        }
        array_push($authWhere,array('or'));

        // 通用查询语句
        $sql_where = array(
            'auth_id'=>$authWhere,
			'state'=>1
        );

		!$not_menu or $sql_where['is_parent'] = 0;

        if($u_where != null){
            $userMenu = M('role_auth')->order('sort asc')->where(array($sql_where,$u_where))->select();
        }else{
            $userMenu = M('role_auth')->order('sort asc')->where($sql_where)->select();
        }
        // 返回权限id字符串
        if(strcasecmp($type,"string") == 0){
            foreach ($userMenu as $key => $value) {
                $userMenuStr .= $value['auth_id'].',';
            }
            return $userMenuStr;
        }
        // 返回权限id数组
        else{
            $userMenuArr = array();
            foreach ($userMenu as $key => $value) {
                // 是否返回所有参数数据
                if(strcasecmp($type,"alldata") == 0){
                    array_push($userMenuArr,$value);
                }
                // 只返回id数据
                else{
                    array_push($userMenuArr,$value['auth_id']);
                }
            }
        }

        // 返回数组
        return $userMenuArr;
    }

	// 获取系统菜单-勾选-递归获取权限
	public function buildMenuChildAuto($pid, $menuList){
		$treeList = [];
		$disabled = [];
		foreach ($menuList as $v) {
			if ($pid == $v['pid']) {
				$node = $v;

				// 默认展开
				// if($v['pid']==0){
				// 	$node['spread'] = true;
				// }
				
				// 前端必须使用id
				$node['id'] = $v['auth_id'];

				$node['spread'] = true;

				$child = $this->buildMenuChildAuto($v['auth_id'], $menuList);
			
				if (!empty($child)) {
					// 判断父节点是否是被禁用的-不可勾选
					if(in_array($child[0]['pid'],$disabled,TRUE)){
						foreach ($child as $c_k => &$c_v) {
							$c_v['disabled'] = true;
							array_push($disabled,$c_v['auth_id']);
						}
					}
					$node['children'] = $child;
				}
				$treeList[] = $node;
			}
		}
		return $treeList;
	}

	// 缓存权限
	public function addSessionCache($auth_arr){
		$session_data = [];
		foreach ($auth_arr as $key => $value) {
			if ($value['controller'] != null && $value['action'] != null) {
				$session_data[$value['controller']][$value['action']] = true;
			}
		}
		session('user_auth',$session_data);
	}

	// 重新缓存用户权限
	public function reloadSessionCache($admin_id){
		$session_data = $this->resUserAuth($admin_id,'','alldata',true);
		$this->addSessionCache($session_data);
		session('user_auth_time',time());
	}

}