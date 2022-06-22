<?php

namespace Front\Controller;
use Think\Controller;
class CountryController extends FrontBaseController{

    public function get_country(){
        $keyword = I("keyword");
        $cd = array(
            'is_delete' => 0 ,
            'mod_name' => '国籍(地区)'
        );
        if($keyword){
            $cd['attr_name'] = array("like","%{$keyword}%")  ;
        }
        $result  = M('mod_attr')->where($cd)->select();

        foreach($result as $key=>$val) {
            $result[$key]['label'] = $val['attr_name'];
            $result[$key]['value'] = $val['status'];
        }

        $this->echoAjaxRequest(1,"",$result);
    }
    
}
