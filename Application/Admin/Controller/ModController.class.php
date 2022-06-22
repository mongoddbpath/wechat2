<?php

namespace Admin\Controller;
use Think\Controller;
class ModController extends AdminBaseController {
    public function mod_list(){
        if (IS_POST) {
            $page = I('post.page');
            $limit = I('post.limit');
            // 搜索条件
            $comm_where = array('is_delete' => 0);
            $searchParams = I('searchParams');
            if ($searchParams['mod_name'] != null) {
                $isParams = true;
                $comm_where['mod_name'] = array('like','%'.$searchParams['mod_name'].'%');
            }
            $data = M('mod')
                    ->where($comm_where)
                    ->limit(($page-1) * $limit,$limit)
                    ->select();
            $count = M('mod')
                    ->where($comm_where)
                    ->count();
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
            $mod_name = I("mod_name");
           
            $cd = array(
                'mod_name' => $mod_name ,
                 'is_delete' => 0  
            );
            if(M('mod')->where($cd)->find()){
               $this->echoAjaxRequest(0,"基础模块名称重复"); 
            }
            $mod_id =  md5(uniqid(md5(microtime(true)),true));
            
            $data = array(
                'mod_id' => $mod_id ,
                'mod_name' => $mod_name ,
            );
            if(M('mod')->add($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
            $this->display();   
        }
    }


    public function edit(){
        $mod_id = I("mod_id");
        $action  = I('action');
        $cd  = array(
            'mod_id' => $mod_id
        );
        if($action == 'save'){
            $mod_name = I("mod_name");
            $data = array(
                'mod_name' => $mod_name ,
            );
            if(M('mod')->where($cd)->save($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
    
            $result = M('mod')->where($cd)->find();
            $this->assign("row",$result);
            $this->display();   
        }  
    }

    public function delete(){
        $mod_id = I("mod_id");
        $cd = array(
            'mod_id' => array("in",$mod_id)
        );
        if(M('mod')->where($cd)->save(array("is_delete"=>1))){
            $this->echoAjaxRequest(1);
        }
    }
    


    public function mod_attr_list(){
        if (IS_POST) {
            $page = I('post.page');
            $limit = I('post.limit');
            // 搜索条件
            $comm_where = array('is_delete' => 0);
            $searchParams = I('searchParams');
        
            // 模块 - 子查询条件
            if ($searchParams['mod'] != null) {
                $comm_where['mod_id'] = $searchParams['mod'];
            }

            $data = M('mod_attr')
                    ->where($comm_where)
                    ->limit(($page-1) * $limit,$limit)
                    ->select();
            $count = M('mod_attr')
                    ->where($comm_where)
                    ->count();
                    
            foreach ($data as $key => &$value) {
                /*/ 获取用户工程项目
                    $user_item = M('user_item as user_item')
                        ->join('al_item ON al_item.item_id = user_item.item_id')
                        ->where(['user_item.user_id'=>$value['user_id']])
                        ->select();
                    $value['item'] = $user_item;
                */
                if ($value['status'] == 0) {
                    $value['status'] = '禁用';
                }else if($value['status'] == 1) {
                    $value['status'] = '正常';
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
            $mod_where=array(
                'is_delete' => 0 
            );
            $mod = M('mod')->where($mod_where)->select();

            $this->assign("mod",$mod);
            $this->display();
        }
    }

    public function add_mod_attr(){
        $action = I('action');
        if($action == 'save'){
            $mod_id = I("mod_id");
            $attr_name = I('attr_name');
            $status = I('status');   
            $mod_info = M('mod')->where(array("mod_id"=>$mod_id))->find();
            $mod_name = $mod_info["mod_name"];
            $cd = array(
                'mod_id' => $mod_id ,
                'attr_name' => $attr_name,
                'is_delete' => 0
            );
            if(M('mod_attr')->where($cd)->find()){
               $this->echoAjaxRequest(0,"属性名称重复"); 
            }
            $attr_id =  md5(uniqid(md5(microtime(true)),true));
            $data = array(
                'attr_id' => $attr_id ,
                'mod_id' => $mod_id ,
                'mod_name' => $mod_name ,
                'attr_name' => $attr_name ,
                'status' => $status ,
            );
            if(M('mod_attr')->add($data)){       
                $this->echoAjaxRequest(1);     
            }
        }else{
            $mod = M('mod')->where("is_delete=%d",0)->select();
            $this->assign("mod",$mod);
            $this->display();   
        }
    }

    public function edit_mod_attr(){
        $attr_id = I("attr_id");
        $action  = I('action');
        $cd  = array(
            'attr_id' => $attr_id
        );
        if($action == 'save'){
            $mod_id = I("mod_id");
            $attr_name = I('attr_name');
            $status = I('status');   
            $mod_info = M('mod')->where(array("mod_id"=>$mod_id))->find();
            $mod_name = $mod_info["mod_name"];
            $cd = array(
                'mod_id' => $mod_id ,
                'attr_name' => $attr_name ,
                'attr_id' => array("neq",$attr_id)
            );
            if(M('mod_attr')->where($cd)->find()){
               $this->echoAjaxRequest(0,"属性名称重复"); 
            }
            $data = array(
                'mod_id' => $mod_id ,
                'mod_name' => $mod_name ,
                'attr_name' => $attr_name ,
                'status' => $status ,
            );
            if(M('mod_attr')->where(['attr_id'=>$attr_id])->save($data)){
                $this->echoAjaxRequest(1);     
            }
        }else{
            $mod = M('mod')->where(['is_delete'=>0])->select();
            $result = M('mod_attr')->where($cd)->find();
            $this->assign("row",$result);
            $this->assign("mod",$mod);
            $this->display();   
        }  
    }

    public function del_mod_attr(){
        $attr_id = I("attr_id");
        $cd = array(
            'attr_id' => array("in",$attr_id)
        );
        if(M('mod_attr')->where($cd)->save(array("is_delete"=>1))){
            $this->echoAjaxRequest(1);
        }   
    }
}