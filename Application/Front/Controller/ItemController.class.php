<?php

namespace Front\Controller;
use Think\Controller;
class ItemController extends FrontBaseController{

    public function item_list(){
        // 搜索条件
        $cd = array(
            'is_delete' => 0
        );
        $data = M('item as item')
                ->where($cd)
                ->order(" update_time asc ")
                ->select();
        foreach ($data as $key => &$value) {
            $value['create_time'] = date('Y-m-d H:i',$value['create_time']);
            $value['update_time'] = date('Y-m-d H:i',$value['update_time']);
        }
        //生成树结构
        $data = $this->getTree($data);
        $res = [
            'code' => 0,
            'msg' => '',
            'data' => $data
        ];
        $this->ajaxReturn($res); 
    }

    public function getTree($arr,$pid='00000'){
        $tree = array() ;
        foreach($arr as $key=>$val) {
            $val['name'] = $val['item_name'];
            $val['text'] = $val['item_name'];
            $val['value'] = $val['item_no'];
            if($val['pid'] == $pid) {
               $val['children'] = $this->getTree($arr,$val['item_id']);
               if(empty($val['children'])){
                    unset($val['children']);
               }
               $tree[] = $val ;
            }
        }
        return $tree;
    }
    




    
}
