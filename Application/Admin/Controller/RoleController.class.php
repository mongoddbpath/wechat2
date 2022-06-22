<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends AdminBaseController {
    public function role_list(){

        if (IS_POST) {
            $page = I('post.page');
            $limit = I('post.limit');

            // 搜索条件
            $comm_where = array('is_delete' => 0);
            $searchParams = I('searchParams');
            if ($searchParams['role_name'] != null) {
                $comm_where['role_name'] = array('like','%'.$searchParams['role_name'].'%');
            }
            if ($searchParams['status'] != null && ($searchParams['status'] == 0 || $searchParams['status'] == 1)) {
                $comm_where['status'] = $searchParams['status'];
            }
            
            $data = M('role as role')
                    ->where($comm_where)
                    ->limit(($page-1) * $limit,$limit)
                    ->order(" update_time asc ")
                    ->select();
            $count = M('role as role')
                    ->where($comm_where)
                    ->count();
            foreach ($data as $key => &$value) {
                $value['create_time'] = date('Y-m-d H:i',$value['create_time']);
                $value['update_time'] = date('Y-m-d H:i',$value['update_time']);
            }
            $res = [
                'code' => 0,
                'msg' => '',
                'count' => $count,
                'data' => $data
            ];
            $this->ajaxReturn($res);
        }else{
            $this->display();
        }
        
    }


    public function add(){
        $action = I("action");
        if($action == 'save'){
            $role_name = I("role_name");
            $status = I('status');
            $id_arr = explode(',',I('id_str')); //权限id数组
            //验证生成权限字符串
            $id_where = array();
            foreach ($id_arr as $key => $value) {
                array_push($id_where,array('eq',$value));
            }
            if($id_where == null){
                $this->echoAjaxRequest(0,"【权限分配】请至少勾选一个有效权限"); 
            }
            array_push($id_where,array('or'));
            $role_auth = M('role_auth')->where(['auth_id'=>$id_where,'state'=>1])->select();
            foreach ($role_auth as $key => $value) {
                $id_str .= $value['auth_id'].',';
            }

            $cd = array(
                'role_name' => $role_name
            );
            if(M('role')->where($cd)->find()){
               $this->echoAjaxRequest(0,"角色名重复"); 
            }
            $data = array(
                'role_id' => md5(uniqid(md5(microtime(true)),true)),
                'role_name' => $role_name ,
                'auth_id' => $id_str,
                'status' => $status ,
                'create_time' => time() ,
                'update_time' => time()
            );
            if(M('role')->add($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
            $this->assign("user_no",$user_no);
            $this->display();   
        }
    	//$user_no = md5(uniqid(md5(microtime(true)),true));	
    }


    public function edit(){
        $role_id = I("role_id");
        $action  = I("action");
        $cd  = array(
            'role_id' => $role_id
        );
        if($action == "save"){
            $role_name = I("role_name");
            $status = I('status');
            $id_arr = explode(',',I('id_str')); //权限id数组
            //验证生成权限字符串
            $id_where = array();
            foreach ($id_arr as $key => $value) {
                array_push($id_where,array('eq',$value));
            }
            if($id_where == null){
                $this->echoAjaxRequest(0,"【权限分配】请至少勾选一个有效权限"); 
            }
            array_push($id_where,array('or'));
            $role_auth = M('role_auth')->where(['auth_id'=>$id_where,'state'=>1])->select();
            foreach ($role_auth as $key => $value) {
                $id_str .= $value['auth_id'].',';
            }
            
            $data = array(
                'role_name' => $role_name ,
                'auth_id' => $id_str,
                'status' => $status ,
                'update_time' => time()
            );
            if(M('role')->where($cd)->save($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
            $result = M('role')->where($cd)->find();
            $this->assign("row",$result);
            $this->display();   
        }
    }

    public function save(){
        $role_id = I('role_id');
        $role_name = I("role_name");
        $status = I('status');
        if($role_id){
            $data = array(
                'role_name' => $role_name ,
                'status' => $status ,
                'update_time' => time()
            );
            $cd = array(
                "role_id" => $role_id 
            );
            if(M('role')->where($cd)->save($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
            $cd = array(
                'role_name' => $role_name 
            );
            if(M('role')->where($cd)->find()){
               $this->echoAjaxRequest(0,"角色名重复"); 
            }
            $data = array(
                'role_id' => md5(uniqid(md5(microtime(true)),true)),
                'role_name' => $role_name ,
                'status' => $status ,
                'create_time' => time() ,
                'update_time' => time()
            );

            if(M('role')->add($data)){
                $this->echoAjaxRequest(1);     
            }
        }
        exit;
    }

    //删除角色
    public function delete(){
        $role_id = I("role_id");
        $cd = array(
            'role_id' => array("in",$role_id)
        );
        if(M('role')->where($cd)->save(array("is_delete"=>1))){
            $this->echoAjaxRequest(1);
        }
    }

    //获取系统菜单与角色权限
    public function getSystemAuth(){

        $role_id = I("role_id");

        //递归调用函数形成无限级菜单
        $systemAuth = M('role_auth')->where(['state'=>1])->select();
        $allAuto = $this->buildMenuChildAuto(0,$systemAuth);

        //获取当前用户的所有角色权限
        $resRoleAuth = $this->resRoleAuth($role_id,'','string',true);

		$this->echoAjaxRequest(1,'系统菜单',['allAuto'=>$allAuto,'resRoleAuth'=>$resRoleAuth]);
    }
    
}