<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AdminBaseController {
    public function index(){
      $admin_id = session("admin_id");
      $result  = M('user')->where(array("user_id"=>$admin_id))->find();
      $result = $this->resUserAuth($admin_id,'','alldata');
      $this->result = $result;
		  $this->display();
    }


    public function welcome(){
      $user_id = session("admin_id");
      $sql = " SELECT * FROM al_user_position a  LEFT JOIN al_position b  ON  a.position_id = b.position_id where user_id = '{$user_id}' ";
      $result = M()->query($sql);
      $positions = array();
      foreach($result as $key => $val){
        $positions[] = $val['name'];
      }
      $sql = " SELECT * FROM al_user_dept a  LEFT JOIN al_dept b  ON  a.dept_id = b.dept_id where user_id = '{$user_id}' ";
      $result = M()->query($sql);
      $depts = array();
      foreach($result as $key => $val){
        $depts[] = $val['dept_name'];
      }

      $distribution_order = M('order')->where(array("distribution_status"=>0))->count();
      $cd = array(
        "task_status" => 0 
      );
      $result = M('project_task')->where($cd)->select();
      $task_list = array();
      $warning_start = time();
      foreach($result as $key => $val){
          if($val['warning_start'] < $warning_start){
            $task_list[$val['node_name']]['node_name'] = $val['node_name'];
            $task_list[$val['node_name']]['num'] = $task_list[$val['node_name']]['num']  + 1 ;  
          }   
      }
      $this->assign("user_position",join(",",$positions)); 
      $this->assign("user_depts",join(",",$depts)); 
      $this->assign("task_list",$task_list);
      $this->assign("distribution_order",$distribution_order);
    	$this->display();
    }
}