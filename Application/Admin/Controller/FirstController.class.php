<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;

use Think\Controller;

class FirstController extends AdminBaseController
{

    //获取数据
    public function getdata()
    {
        // join联合表查询
        $data = M()
            ->table('al_userinfo P')
            ->join('al_bankcard U ON P.id=U.id')
            ->join('al_otherinfo U_M ON P.id=U_M.id')
            ->order('P.update_time desc')->select();
        $this->ajaxReturn($data);
    }

    //页面展示
    public function user_list()
    {
        
        

        if (IS_POST) {

            $page = I('post.page');
            $limit = I('post.limit');

            // 搜索条件
            // $comm_where = array('first.cardname' => 0);
            $searchParams = I('searchParams');
            if ($searchParams['item_no'] != null) {
                $comm_where['P.item_no'] = array('like', '%' . $searchParams['item_no'] . '%');
            }
            if ($searchParams['job_no'] != null) {
                $comm_where['P.job_no'] = array('like', '%' . $searchParams['job_no'] . '%');
            }
            if ($searchParams['username'] != null) {
                $comm_where['P.username'] = array('like', '%' . $searchParams['username'] . '%');
            }
            if ($searchParams['idstype'] != null) {
                $comm_where['P.idstype'] = array('like', '%' . $searchParams['idstype'] . '%');
            }
            if ($searchParams['idsnum'] != null) {
                $comm_where['P.idsnum'] = array('like', '%' . $searchParams['idsnum'] . '%');
            }
            if ($searchParams['item_name'] != null) {
                $comm_where['P.item_name'] = array('like', '%' . $searchParams['item_name'] . '%');
            }
            if ($searchParams['phone'] != null) {
                $comm_where['P.phone'] = array('like', '%' . $searchParams['phone'] . '%');
            }
            if ($searchParams['sex'] != null) {
                $comm_where['P.sex'] = array('like', '%' . $searchParams['sex'] . '%');
            }
            if ($searchParams['status'] != null) {
                $comm_where['P.status'] = array('like', '%' . $searchParams['status'] . '%');
            }
            if($this->item_nos ){
                $comm_where["P.item_no"] = array("in",join(",",$this->item_nos));   
            }
            // join联合表查询
            $data = M()
                ->table('al_userinfo P')
                ->field("P.*")
                ->join('al_bankcard U ON P.id=U.id',"Left")
                ->join('al_otherinfo U_M ON P.id=U_M.id',"Left")
                ->join('al_salary U_MY ON P.id=U_MY.id',"Left")
                ->where($comm_where)
                ->limit(($page - 1) * $limit, $limit)
                ->order('P.update_time desc')->select();

            // join联合表查询


            $count = M('userinfo')->count();


            $res = [
                'code' => 0,
                'msg' => '',
                'count' => $count,
                'data' => $data
            ];
            $this->ajaxReturn($res);
        } else {
            $action = I("action");
            if($action == "export_base"){
                // 导出人员信息
                if($this->item_nos ){
                        $export_where["P.item_no"] = array("in",join(",",$this->item_nos));   
                }

                $result = M()
                    ->table('al_userinfo P')
                    ->join('al_bankcard U ON P.id=U.id')
                    ->join('al_otherinfo U_M ON P.id=U_M.id')
                    ->where($export_where)
                    ->order('P.update_time desc')->select();
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'.date('Ymd-His').'.xls"');
                header('Cache-Control: max-age=0');//*/
                $this->assign("rows",$result);
                $this->display("export_base");
            }else if($action == "export_xinzi"){
                // 导出薪资信息
                if($this->item_nos ){
                    $export_where["P.item_no"] = array("in",join(",",$this->item_nos));   
                }
                $result = M()
                    ->table('al_userinfo P')
                    ->join('al_bankcard U ON P.id=U.id')
                    ->join('al_otherinfo U_M ON P.id=U_M.id')
                    ->where($export_where)
                    ->order('P.update_time desc')->select();
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'.date('Ymd-His').'.xls"');
                header('Cache-Control: max-age=0');//*/
                $this->assign("rows",$result);
                $this->display("export_xinzi");
            }else{
                $this->display();   
            } 
        }
    }

    // 获取银行卡信息
    public function bank_list()
    {
        $where['mod_name'] = '开户银行';
        $bank_list = M('mod_attr')->field('attr_name')->where($where)->select();
        $this->ajaxReturn($bank_list);
    }

    //获得国籍信息
    public function get_country()
    {
        $where['mod_name'] = '国籍(地区)';
        $bank_list = M('mod_attr')->field('attr_name')->where($where)->select();
        $this->ajaxReturn($bank_list);
    }

    //编辑保存前的检查
    public function checksave()
    {
        $Model = M();
        $Model->startTrans();
        $data = I('post.');
        $where['id'] = $data['item_no'] . $data['uid'];
        $data['update_time'] = date("Y-m-d H:i:s", time());
        $state = M('userinfo')->where($where)->find();
        // var_dump($state);
        // exit;
        if ($state != NULL) {
            $this->echoAjaxRequest(0, "该工程项目已经重复添加请重新选择");
        } else {
            $this->echoAjaxRequest(1);
        }
    }

    //userinfo编辑保存
    public function save()
    {
        $Model = M();
        $Model->startTrans();
        $data = I('post.');
        $where['id'] = $data['id'];
        $data['id'] = $data['item_no'] . $data['uid'];
        $save['id'] = $data['item_no'] . $data['uid'];
        $save['item_no'] = $data['item_no'];
        $save['item_name'] = $data['item_name'];
        $data['update_time'] = date("Y-m-d H:i:s", time());
        if($where['id'] == $data['id']){
            unset($data['id']);
            $state = M('userinfo')->where($where)->save($data);
        }else{
            $state = M('userinfo')->where($where)->save($data);
            $state2 = M('bankcard')->where($where)->save($save);
            $state3 = M('salary')->where($where)->save($save);
            $state4 = M('otherinfo')->where($where)->save($save);
            $state = $state || $state2 || $state3 || $state4;
        }
        if (!$state) {
            $this->echoAjaxRequest(0, "操作失败");
        } else {
            $this->echoAjaxRequest(1);
        }
    }

    //编辑保存
    public function bankcardsave()
    {
        $Model = M();
        $Model->startTrans();
        $data = I('post.');
        $where['id'] = $data['id'];
        $data['update_time'] = date("Y-m-d H:i:s", time());
        $state = M('bankcard')->where($where)->save($data);
        if (!$state) {
            $this->echoAjaxRequest(0, "操作失败");
        } else {
            $this->echoAjaxRequest(1);
        }
    }

    //递归方式把空值转为NULL
    public function _unsetEmpty($arr){
        if($arr !== null){
            if(is_array($arr)){
                if(!empty($arr)){
                    foreach($arr as $key => $value){
                        if($value === '' || $value === null){
                            // unset($arr[$key]);
                            $arr[$key] = null;
                        }else{
                            $arr[$key] = $this->_unsetEmpty($value);      //递归再去执行
                        }
                    }
                }else{ $arr = null; }
            }else{
                if($arr === null){ $arr = null; }         //注意三个等号
            }
        }else{ $arr = ''; }
        return $arr;
    }

    //编辑保存
    public function salarysave()
    {
        $Model = M();
        $Model->startTrans();
        $data = I('post.');
        $where['id'] = $data['id'];
        $data['update_time'] = date("Y-m-d H:i:s", time());
        $data = $this->_unsetEmpty($data);
        $state = M('salary')->where($where)->save($data);
        if (!$state) {
            $this->echoAjaxRequest(0, "操作失败");
        } else {
            $this->echoAjaxRequest(1);
        }
    }

    //编辑保存
    public function otherinfosave()
    {
        $Model = M();
        $Model->startTrans();
        $data = I('post.');
        $where['id'] = $data['id'];
        $data['update_time'] = date("Y-m-d H:i:s", time());
        $data = $this->_unsetEmpty($data);
        $state = M('otherinfo')->where($where)->save($data);
        if (!$state) {
            $this->echoAjaxRequest(0, "操作失败");
        } else {
            $this->echoAjaxRequest(1);
        }
    }

    // 编辑获取对应的那条信息
    public function edit()
    {
        // join联合表查询
        $where['id'] = I('id');
        $result = M('userinfo')
        ->where($where)
        ->select();
        // join联合表查询
        $this->assign("row", $result);
        // 获取国家列表
        $where2['mod_name'] = '国籍(地区)';
        $item = M('mod_attr')->field('attr_name')->where($where2)->select();
        $this->assign("item", $item);
        $this->display();
    }

    //获取编辑的那条记录
    public function salaryedit()
    {
        // join联合表查询
        $where['P.id'] = I('id');
        $result = M()
            ->table('al_userinfo P')
            ->join('al_salary U ON P.id=U.id')->where($where)
            ->select();

        // join联合表查询
        $this->assign("row", $result);
        // var_dump($result);
        // exit;
        $this->display();
    }

    // 编辑获取对应的那条信息
    public function bankcardedit()
    {
        // join联合表查询
        $where['P.id'] = I('id');
        $result = M()
            ->table('al_userinfo P')
            ->join('al_bankcard U ON P.id=U.id','LEFT')->where($where)
            ->select();

        // join联合表查询
        $this->assign("row", $result);
        // 获取银行卡列表
        $where2['mod_name'] = '开户银行';
        $item = M('mod_attr')->field('attr_name')->where($where2)->select();
        $this->assign("item",$item);
        // 获取地区省市表
        $where3['level'] = 1;
        $item2 = M('region')->field('region_name')->where($where3)->select();
        $this->assign("item2",$item2);
        $this->display();
    }

    // 编辑获取对应的那条信息
    public function otherinfoedit()
    {
        // join联合表查询
        $where['P.id'] = I('id');
        $result = M()
            ->table('al_userinfo P')
            ->join('al_otherinfo U ON P.id=U.id','LEFT')->where($where)
            ->select();

        // join联合表查询
        $this->assign("row", $result);
        // 获取国家列表
        $where2['mod_name'] = '国籍(地区)';
        $item = M('mod_attr')->field('attr_name')->where($where2)->select();
        $this->assign("item", $item);
        $this->display();
    }

    //获取上传图片
    public function getimg()
    {
        // join联合表查询
        $where['P.id'] = I('id');
        $result = M()
            ->table('al_userinfo P')
            ->field("P.*")
            ->join('al_bankcard U ON P.id=U.id','LEFT')->where($where)
            ->select();

        // join联合表查询
        $this->assign("row", $result);
        $this->display();
    }


    // 获取图片
    public function getimg1()
    {
        $where['id'] = I('id');
        $bank_list = M('userinfo')->field('imgsurl,zjimgsurl')->where($where)->select();
        var_dump($this->ajaxReturn($bank_list));
        exit;
        $this->ajaxReturn($bank_list);
    }

    // 获取图片
    public function getimg2()
    {
        $where['id'] = I('id');
        $bank_list = M('bankcard')->field('imgsurl')->where($where)->select();
        $this->ajaxReturn($bank_list);
    }

    // 获取各地区省份
    public function getregion(){
        $where['level'] = 1;
        $bank_list = M('region')->field('region_name')->where($where)->select();
        $this->ajaxReturn($bank_list);
    }

    //删除
    public function delete()
    {
        $id = I("id");
        $cd = array(
            'id' => array("in", $id)
        );
        M('userinfo')->where($cd)->delete();
        M('otherinfo')->where($cd)->delete();
        M('bankcard')->where($cd)->delete();
        M('salary')->where($cd)->delete();
        $this->echoAjaxRequest(1);
    }

    
}
