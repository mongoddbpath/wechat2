<?php

/**
 * Top返回对象
 * @author auto create
 */
class TopResultDo
{
	
	/** 
	 * 库存更新是否成功
	 **/
	public $data;
	
	/** 
	 * 接口更新失败时错误信息
	 **/
	public $message;
	
	/** 
	 * 失败错误码
	 **/
	public $msg_code;
	
	/** 
	 * 调用是否成功
	 **/
	public $success;
	
	/** 
	 * 接口失败时的追踪id
	 **/
	public $trace_id;	
}
?>