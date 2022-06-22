<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class UserController extends AdminBaseController {
    

    public function user_list(){

        if (IS_POST) {

            $page = I('post.page');
            $limit = I('post.limit');
            // 搜索条件
                $comm_where = array('user.is_delete' => 0);
                $searchParams = I('searchParams');
               
                if ($searchParams['username'] != null) {
                    $comm_where['username'] = array('like','%'.$searchParams['username'].'%');
                }
                if ($searchParams['real_name'] != null) {
                    $comm_where['real_name'] = array('like','%'.$searchParams['real_name'].'%');
                }
                if ($searchParams['status'] != null && ($searchParams['status'] == 0 || $searchParams['status'] == 1 || $searchParams['status'] == 2)) {
                    $comm_where['status'] = $searchParams['status'];
                }
                if ($searchParams['mobile'] != null) {
                    $comm_where['mobile'] = array('like','%'.$searchParams['mobile'].'%');
                }
                /*
                // 工程项目 - 子查询条件
                if ($searchParams['item'] != null) {
                    $comm_where['item.item_id'] = $searchParams['item_id'];
                    $add_join .= ' LEFT JOIN al_user_item item ON item.uid = user.user_id';
                }*/
                
                // 角色 - 子查询条件
                if ($searchParams['role'] != null) {
                    $comm_where['role.role_id'] = $searchParams['role'];
                    $add_join .= ' LEFT JOIN al_user_role role ON role.user_id = user.user_id';
                }

            $data = M('user as user')
                    ->join($add_join)
                    ->where($comm_where)
                    ->limit(($page-1) * $limit,$limit)
                    ->select();
    

            $count = M('user as user')
                    ->join($add_join)
                    ->where($comm_where)
                    ->count();
                    
            foreach ($data as $key => &$value) {
                // 获取用户工程项目
                    $user_item = M('user_item as user_item')
                        ->join('al_item ON al_item.item_id = user_item.item_id')
                        ->where(['user_item.user_id'=>$value['user_id']])
                        ->select();
                    $value['item'] = $user_item;

                
                // 获取用户角色
                    $user_role = M('user_role as user_role')
                        ->join('al_role ON al_role.role_id = user_role.role_id')
                        ->where(['user_role.user_id'=>$value['user_id']])
                        ->select();
                    $value['role'] = $user_role;

                if ($value['status'] == 0) {
                    $value['status'] = '待审核';
                }else if($value['status'] == 1) {
                    $value['status'] = '正常';
                }else if($value['status'] == 2) {
                    $value['status'] = '冻结';
                }
            }

            $res = [
                'code' => 0,
                'msg' => '',
                'count' => $count,
                'data' => $data
            ];
            $this->ajaxReturn($res);
        }else{
            // 职位
            $position_where=array(
                'is_delete' => 0 
            );
            $position = M('position')->where($position_where)->select();
            $position = $this->position_vTree($position);
            
            // 工程项目
            $item_where=array(
                'is_delete' => 0 
            );
            $dept = M('item')->where($dept_where)->select();
            $dept = $this->item_vTree($dept);

            // 角色
            $role_where=array(
                'is_delete' => 0 
            );
            $role = M('role')->where($role_where)->select();

            $this->assign("role",$role);
            $this->assign("dept",$dept);
            $this->assign("position",$position);
            $this->display();
        }

    }

    public function getUserName(){
        if(IS_POST){
            $check_user = I('post.check_user');
            $user_arr = explode(',',$check_user);
            $user_list = M('user')->field('user_id,username')->where(['user_id'=>array('in',$user_arr)])->select();
            $this->echoAjaxRequest(0,"用户信息",$user_list);  
        }
    }
    
    public function userinfo(){
        if(IS_POST){
            $user_id = session("admin_id");
            $check_user = I('post.check_user');
            $password = I("password");
            $real_name = I('real_name');
            $mobile = I('mobile');

            if ($password != null) {
                $data['password'] = md5($password);
            }
            $data2 = array(
                'real_name'  => $real_name ,
                'mobile' => $mobile
            );

            $flag = true ;
            $Model = M();
            $Model->startTrans();
            if (M('user_info')->where(['user_id'=>$user_id])->save($data2) === false) {
                $flag = false;
            }
            if (M('user')->where(array("user_id"=>$user_id))->save($data) === false) {
                $flag = false;
            }
            if($flag){
                $Model->commit();
                $this->echoAjaxRequest(1); 
            }else{
                $this->echoAjaxRequest(0,"操作失败"); 
            }
        }else{
            $user_id = session("admin_id");
            $userinfo  = M('user user')
            ->where(array("user.user_id"=>$user_id))
            ->find();

            // 获取用户工程项目
            $user_item = M('user_item as user_item')
                    ->join('al_item ON al_item.item_id = user_item.item_id')
                    ->where(['user_item.user_id'=>$user_id])
                    ->select();
                $this->item = $user_item;

            
            // 获取用户角色
                $user_role = M('user_role as user_role')
                    ->join('al_role ON al_role.role_id = user_role.role_id')
                    ->where(['user_role.user_id'=>$user_id])
                    ->select();
                $this->role = $user_role;

            

            $this->userinfo = $userinfo;
            $this->display();
        }
    }

    public function add(){
    	$user_no = md5(uniqid(md5(microtime(true)),true));
        $role = M('role')->where(['is_delete'=>0])->select();
        $this->assign("role",$role);
    	$this->assign("user_no",$user_no);
    	$this->display();
    }

    public function save(){
        $user_id  = I('user_id');
        $username = I("username");
        $password = I("password");
        $status   = I('status');
        $real_name   = I('real_name');
        $mobile   = I('mobile');
        $data = array(
            'user_no'  => $user_no ,
            'username' => $username,
            'status'   => $status,
            'real_name'  => $real_name ,
            'mobile' => $mobile
        );
        $Model = M();
        $Model->startTrans();
        $flag = true ;
        if($user_id){
            $data['update_time'] = time();
            if($password){
                $data['password'] = md5($password);
            }
            if(!M('user')->where(array("user_id"=>$user_id))->save($data)){
                $flag = false ;
                $this->echoAjaxRequest(0,"操作失败");      
            }
        }else{
            $user_id =  md5(uniqid(md5(microtime(true)),true));
            $data['user_id'] = $user_id ;
            $data['password'] = md5($password);
            $data['create_time'] = time();
            $data['upate_time']  = time();
            if(!M('user')->add($data)){
                $flag = false ;
                $this->echoAjaxRequest(0,"操作失败");     
            }
        }

        if($flag){
            $Model->commit();
            $this->echoAjaxRequest(1); 
        }
    }



    public function edit(){
        $user_id = I('user_id');
        $result  = M('user')
        ->where(array("user_id"=>$user_id))
        ->find();
        $role = M('role')->where(['is_delete'=>0])->field("role_name,role_id")->select();
        foreach($role as $key => $val){
            $cd = array(
                'user_id' => $user_id ,
                'role_id' => $val['role_id']
            );
            if(M('user_role')->where($cd)->find()){
                $role[$key]['checked'] = 'checked';
            }
        }
        
        /*
        $dept = M('dept')->where(['is_delete'=>0])->select();
        $dept = $this->dept_vTree($dept);
        foreach($dept as $key => $val){
            $cd = array(
                'user_id' => $user_id ,
                'dept_id' => $val['dept_id']
            );
            if(M('user_dept')->where($cd)->find()){
                $dept[$key]['checked'] = 'checked';
            }
        }*/
        $this->assign("role",$role);
        $this->assign("row",$result);
        $this->display();
    }


    //设置角色
    public function set_role(){
        if (IS_POST) {
            $user_id = I('check_user');
            $user_id = explode(',',$user_id);
            $Model = M();
            $Model->startTrans();
            $role = I('role');
            M('user_role')->where(array("user_id"=>array('in',$user_id)))->delete();
            foreach($role as $key => $val){
                foreach ($user_id as $key => $i_user) {
                    if (!empty($i_user)) {
                        $data = array(
                            'role_id' => $val ,
                            'user_id' => $i_user 
                        );
                        if(!M('user_role')->add($data)){
                            $flag = false ;
                            $this->echoAjaxRequest(0,"操作失败"); 
                        }  
                    }
                }
            }
            if($flag !== false){
                $Model->commit();
                $this->echoAjaxRequest(1); 
            }
        }else{
            $role = M('role')->where(['is_delete'=>0])->select();
            $this->assign("role",$role);
            $this->display();
        }
    }


    //设置项目
    public function set_item(){
        if (IS_POST) {
            $user_id = I('check_user');
            $user_id = explode(',',$user_id);
            $Model = M();
            $Model->startTrans();
            $item = I('item');
            M('user_item')->where(array("user_id"=>array('in',$user_id)))->delete();
            foreach($item as $key => $val){
                foreach ($user_id as $key => $i_user) {
                    if (!empty($i_user)) {
                        $data = array(
                            'item_id' => $val ,
                            'user_id' => $i_user 
                        );
                        if(!M('user_item')->add($data)){
                            $flag = false ;
                            $this->echoAjaxRequest(0,"操作失败"); 
                        }
                    }
                }
            }
            if($flag !== false){
                $Model->commit();
                $this->echoAjaxRequest(1); 
            }
        }else{
            $item = M('item')->where(['is_delete'=>0])->select();
            $item = $this->item_vTree($item);
            $this->assign("item",$item);
            $this->display();
        }
    }


    public function delete(){
        $user_id = I("user_id");
        $cd = array(
            'user_id' => array("in",$user_id)
        );
        if(M('user')->where($cd)->save(array("is_delete"=>1))){
            $this->echoAjaxRequest(1);
        }
    }

    public function item_vTree($data, $pid = '00000', $step = 0, &$tree = []){
        foreach ($data as $key => $val) {
            if ($val['pid'] == $pid) {
                $val['item_name'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $step). $val['item_name'];
                $tree[] = $val;
                $this->item_vTree($data, $val['item_id'], $step + 1, $tree);
            }
        }
        return $tree;
    }

    public function position_vTree($data, $pid=0, $level=1, $isClear=true){
        //声明一个静态数组存储结果
        static $res = array();
        //刚进入函数要清除上次调用此函数后留下的静态变量的值，进入深一层循环时则不要清除
        if($isClear==true) $res =array();
        foreach ($data as $v) {
            if($v['pid'] == $pid){
                $v['level'] = $level;
                $v['name'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $level). $v['name'];
                $res[] = $v;
                $this->position_vTree($data, $v['id'], $level+1, $isClear=false);
            }
        }
        return $res;
    }
    
}