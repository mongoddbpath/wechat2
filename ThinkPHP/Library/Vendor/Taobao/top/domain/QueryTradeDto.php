<?php

/**
 * 查询参数
 * @author auto create
 */
class QueryTradeDto
{
	
	/** 
	 * 买家aliid
	 **/
	public $buyer_ali_id;
	
	/** 
	 * 交易单创建结束时间
	 **/
	public $create_time_end;
	
	/** 
	 * 交易单创建起始时间
	 **/
	public $create_time_start;
	
	/** 
	 * 交易单状态变更结束时间
	 **/
	public $fire_time_end;
	
	/** 
	 * 交易单状态变更起始时间
	 **/
	public $fire_time_start;
	
	/** 
	 * 是否展示
	 **/
	public $is_display;
	
	/** 
	 * 结束值
	 **/
	public $length;
	
	/** 
	 * 起始值
	 **/
	public $off_set;
	
	/** 
	 * 订单号列表
	 **/
	public $order_nos;
	
	/** 
	 * 页码
	 **/
	public $page;
	
	/** 
	 * 每页显示数量
	 **/
	public $page_size;
	
	/** 
	 * 服务code列表
	 **/
	public $service_code;
	
	/** 
	 * 状态列表
	 **/
	public $status;
	
	/** 
	 * 交易id号列表
	 **/
	public $trade_ids;	
}
?>