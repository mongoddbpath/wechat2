<?php

namespace Front\Controller;
use Think\Controller;
class CredentialsController extends FrontBaseController{
    //获取证件类型
    public function get_idstype(){
        $cd = array(
            'is_delete' => 0 ,
            'mod_name' => '证件类型'
        );
        $result  = M('mod_attr')->where($cd)->select();

        $this->echoAjaxRequest(1,"",$result);
    }
    
}
