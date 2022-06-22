<?php
// 本类由系统自动生成，仅供测试用途
namespace Front\Controller;

use Think\Controller;

class FrontController extends FrontBaseController
{

    //微信授权登录
    public static $OK = 0;
    public static $IllegalAesKey = -41001;
    public static $IllegalIv = -41002;
    public static $IllegalBuffer = -41003;
    public static $DecodeBase64Error = -41004;


    public function login()
    {
        $rs = array("status" => 1);
        $code = I('code');
        $result = $this->get_oepnid($code);
        $openid = $result['openid'];
        $user_info = M('item_user')->where(array('openid' => $openid))->find();
        if (empty($user_info)) {
            $uid =  md5(uniqid(md5(microtime(true)), true));
            $user_info = array(
                'uid' => $uid,
                'openid' => $openid
            );
            if (M('item_user')->add($user_info)) {
                $rs['data'] = $user_info;
            }
        } else {
            $rs['data'] = $user_info;
        }
        echo json_encode($rs);
    }


    public function get_oepnid($code)
    {
        $appId = "wxdc5197e8ecc4df8e";
        $appSecret = "5716f1034498c104cd21c02797ef5acd";
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $appId . "&secret=" . $appSecret . "&js_code=" . $code . "&grant_type=authorization_code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($output, true);
        return $result;
    }

    // 获取银行卡信息
    public function bank_list()
    {
        $where['mod_name'] = '开户银行';
        $bank_list = M('mod_attr')->field('attr_name')->where($where)->select();
        $this->ajaxReturn($bank_list);
    }



    // 用户详情表添加
    public function adduserinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('userinfo')->where($where)->find();
            if ($this->hasarrnull($data)) {
                $this->echoAjaxRequest(0, "操作失败");
            } elseif (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('userinfo')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } elseif ($this->isnotmobile($data['phone'])) {
                $this->echoAjaxRequest(0, "操作失败");
            } else {
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['create_time'] = date("Y-m-d H:i:s", time());
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $state = M('userinfo')->add($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
        }
    }

    // 银行表的添加
    public function addbank()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('bankcard')->where($where)->find();
            if ($this->hasarrnull($data)) {
                $this->echoAjaxRequest(0, "操作失败");
            } elseif (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('bankcard')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } else {
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['create_time'] = date("Y-m-d H:i:s", time());
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $state = M('bankcard')->add($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
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

    // 薪资表的添加
    public function addsalary()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('salary')->where($where)->find();
            if ($data['allmoney'] == '' || $data['getmoney'] == '') {
                $this->echoAjaxRequest(0, "操作失败");
            } elseif (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('salary')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } else {
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['create_time'] = date("Y-m-d H:i:s", time());
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $data = $this->_unsetEmpty($data);
                $state = M('salary')->add($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
        }
    }

    // 其他信息表的添加
    public function addotherinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('otherinfo')->where($where)->find();
            if ($data['email'] != '' && !$this->check_email($data['email'])) {
                $this->echoAjaxRequest(0, "操作失败");
            } elseif (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('otherinfo')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } else {
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['create_time'] = date("Y-m-d H:i:s", time());
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $data = $this->_unsetEmpty($data);
                $state = M('otherinfo')->add($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
        }
    }


    //获取用户信息列表
    public function userinfo_list()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $userinfo_list = M('userinfo')->where($where)->order('create_time desc')->select();
            $this->ajaxReturn($userinfo_list);
        }
    }

    public function getuserinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['id'] = $data['id'];
            $userinfo_list = M('userinfo')->where($where)->select();
            $this->ajaxReturn($userinfo_list);
        }
    }

    public function updateuserinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            if ($this->hasarrnull($data)) {
                $this->echoAjaxRequest(0, "操作失败");
            } elseif ($this->isnotmobile($data['phone'])) {
                $this->echoAjaxRequest(0, "操作失败");
            } else {
                $where['id'] = $data['id'];
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $state = M('userinfo')->where($where)->save($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
        }
    }

    //获取银行卡信息列表
    public function bankcard_list()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $bankcard_list = M('bankcard')->where($where)->order('create_time desc')->select();
            $this->ajaxReturn($bankcard_list);
        }
    }

    public function getbankinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['id'] = $data['id'];
            $userinfo_list = M('bankcard')->where($where)->select();
            $this->ajaxReturn($userinfo_list);
        }
    }

    public function updatebank()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            if ($this->hasarrnull($data)) {
                $this->echoAjaxRequest(0, "操作失败");
            } else {
                $where['id'] = $data['id'];
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $state = M('bankcard')->where($where)->save($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
        }
    }

    // 检查是否在update的时候有重复的数据
    public function updatebank2()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('bankcard')->where($where)->find();
            if (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('bankcard')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } else {
                $this->echoAjaxRequest(1);
            }
        }
    }

    // 检查是否在update的时候有重复的数据
    public function updateuserinfo2()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('userinfo')->where($where)->find();
            if (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('userinfo')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } else {
                $this->echoAjaxRequest(1);
            }
        }
    }

    //获取薪资卡信息列表
    public function salary_list()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $salary_list = M('salary')->where($where)->order('create_time desc')->select();
            $this->ajaxReturn($salary_list);
        }
    }

    public function getsalaryinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['id'] = $data['id'];
            $getsalaryinfo_list = M('salary')->where($where)->select();
            $this->ajaxReturn($getsalaryinfo_list);
        }
    }

    // 检查是否在update的时候有重复的数据
    public function updatesalary2()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('salary')->where($where)->find();
            if (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('salary')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } else {
                $this->echoAjaxRequest(1);
            }
        }
    }

    public function updatesalary()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            if ($data['allmoney'] == '' || $data['getmoney'] == '') {
                $this->echoAjaxRequest(0, "操作失败");
            } else {
                $where['id'] = $data['id'];
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $data = $this->_unsetEmpty($data);
                $state = M('salary')->where($where)->save($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
        }
    }

    //获取其他信息列表
    public function otherinfo_list()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $otherinfo_list = M('otherinfo')->where($where)->order('create_time desc')->select();
            $this->ajaxReturn($otherinfo_list);
        }
    }

    public function getotherinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['id'] = $data['id'];
            $getsalaryinfo_list = M('otherinfo')->where($where)->select();
            $this->ajaxReturn($getsalaryinfo_list);
        }
    }

    public function updateotherinfo()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            if ($data['email'] != '' && !$this->check_email($data['email'])) {
                $this->echoAjaxRequest(0, "操作失败");
            } else {
                $where['id'] = $data['id'];
                $data['id'] = $data['item_no'] . $data['uid'];
                $data['update_time'] = date("Y-m-d H:i:s", time());
                $data = $this->_unsetEmpty($data);
                $state = M('otherinfo')->where($where)->save($data);
                if (!$state) {
                    $this->echoAjaxRequest(0, "操作失败");
                } else {
                    $this->echoAjaxRequest(1);
                }
            }
        }
    }

    // 检查是否在update的时候有重复的数据
    public function updateotherinfo2()
    {
        if (IS_POST) {
            $data = $_POST; // 获得前端Post的数据
            $where['uid'] = $data['uid'];
            $where['item_no'] = $data['item_no'];
            $getid = M('otherinfo')->where($where)->find();
            if (!empty($getid)) {
                // 如果已经存在则直接返回id
                $id = M('otherinfo')->where($where)->getField('id');
                $this->echoAjaxRequest(3, "操作失败", $id);
            } else {
                $this->echoAjaxRequest(1);
            }
        }
    }
}
