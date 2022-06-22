<?php

namespace Admin\Controller;
use Think\Controller;
class ItemController extends AdminBaseController {
    public function item_list(){
        if (IS_POST) {
            $page = I('post.page');
            $limit = I('post.limit');
            // 搜索条件
            $comm_where = array('is_delete' => 0);
            $searchParams = I('searchParams');
            if ($searchParams['item_name'] != null) {
                $isParams = true;
                $comm_where['item_name'] = array('like','%'.$searchParams['item_name'].'%');
            }
            $data = M('item as item')
                    ->where($comm_where)
                    ->limit(($page-1) * $limit,$limit)
                    ->order(" update_time asc ")
                    ->select();
            $count = M('item as item')
                    ->where($comm_where)
                    ->count();
            foreach ($data as $key => &$value) {
                $value['create_time'] = date('Y-m-d H:i',$value['create_time']);
                $value['update_time'] = date('Y-m-d H:i',$value['update_time']);
            }
            if (!$isParams) {
                //生成树结构
                $data = $this->vTree($data);
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
        $action = I('action');
        if($action == 'save'){
            $item_name = I("item_name");
            $item_no = I("item_no");
            $pid = I("pid");
            if($pid == '00000'){
                $path = "/00000/";
            }else{
                $path = M('item')->where(array('item_id'=>$pid))->getField("path");
                $path = $path.$pid."/";
            }
            $cd = array(
                'item_name' => $item_name 
            );
            if(M('item')->where($cd)->find()){
               $this->echoAjaxRequest(0,"工程项目名称重复"); 
            }
            $item_id =  md5(uniqid(md5(microtime(true)),true));
            
            $data = array(
                'item_id' => $item_id ,
                'path' => $path ,
                'item_name' => $item_name ,
                'item_no' => $item_no ,
                'pid' => $pid ,
                'create_time' => time() ,
                'update_time' => time()
            );
            if(M('item')->add($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
            $result = M('item')->where("is_delete=%d",0)->select();
            $item = $this->vTree($result);
            $this->assign("item",$item);
            $this->display();   
        }
    }


    public function edit(){
        $item_id = I("item_id");
        $action  = I('action');
        $cd  = array(
            'item_id' => $item_id
        );
        if($action == 'save'){
            $item_name = I("item_name");
            $item_no = I("item_no");
            $pid = I("pid");
            if($pid == '00000'){
                $path = "/00000/";
            }else{
                $path = M('item')->where(array('item_id'=>$pid))->getField("path");
                $path = $path.$pid."/";
            }
            $data = array(
                'item_name' => $item_name ,
                'item_no' => $item_no ,
                'update_time' => time(),
                'pid' => $pid ,
                'path' => $path
            );
            $cd = array(
                "item_id" => $item_id 
            );
            if(M('item')->where($cd)->save($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
            $result = M('item')->where("is_delete=%d",0)->select();
            $item = $this->vTree($result);
            $result = M('item')->where($cd)->find();
            $this->assign("item",$item);
            $this->assign("row",$result);
            $this->display();   
        }  
    }

    //$tree = [];
    public function vTree($data, $pid = '00000', $step = 0, &$tree = []){
        foreach ($data as $key => $val) {
            if ($val['pid'] == $pid) {
                $val['item_name'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $step). $val['item_name'];
                $tree[] = $val;
                $this->vTree($data, $val['item_id'], $step + 1, $tree);
            }
        }
        return $tree;
    }


    public function tree($arr,$id='00000',$level=0){
        $list =array();
        foreach ($arr as $k=>$v){
            if ($v['pid'] == $id){
                $v['level']=$level;
                $v['son'] = $this->tree($arr,$v['item_id'],$level+1);
                $v['item_name'] = str_repeat('－', $level) . "&nbsp;" . $v['item_name'];
                $list[] = $v;
            }
        }
        return $list;
    }




    public function delete(){
        $item_id = I("item_id");
        $cd = array(
            'item_id' => array("in",$item_id)
        );
        if(M('item')->where($cd)->save(array("is_delete"=>1))){
            $this->echoAjaxRequest(1);
        }
    }


    //工程项目人员
    public function item_user(){
        
        if (IS_POST) {
            
            $page = I('post.page');
            $limit = I('post.limit');
            $item_id = I('get.item_id');

            // 获取部门下的所有用户
            $comm_where = array('user.is_delete' => 0);
            $comm_where['item.item_id'] = $item_id;
            $data = M('user as user')
                ->field('user.*')
                ->join('al_user_item user_item ON user_item.user_id = user.user_id')
                ->join('al_item item ON item.item_id = user_item.item_id')
                ->where($comm_where)
                ->limit(($page-1) * $limit,$limit)
                ->select();

                foreach ($data as $key => &$value) {
                    // 获取用户部门
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
                }

            $res = [
                'code' => 0,
                'msg' => '',
                'count' => $count,
                'data' => $data
            ];
            $this->ajaxReturn($res);

        }else{
            $this->item_id = I('get.item_id');
            $this->display();
        }
    }
    
}