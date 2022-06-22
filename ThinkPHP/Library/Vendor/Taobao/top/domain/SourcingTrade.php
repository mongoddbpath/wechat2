<?php

/**
 * 询盘商品交易信息
 * @author auto create
 */
class SourcingTrade
{
	
	/** 
	 * 阶梯交期
	 **/
	public $deliver_periods;
	
	/** 
	 * 发货港口
	 **/
	public $delivery_port;
	
	/** 
	 * 发货期限
	 **/
	public $delivery_time;
	
	/** 
	 * FOB价格货币，参见FAQ 货币枚举值
	 **/
	public $fob_currency;
	
	/** 
	 * FOB最大价格
	 **/
	public $fob_max_price;
	
	/** 
	 * FOB最小价格
	 **/
	public $fob_min_price;
	
	/** 
	 * FOB计量单位，参见FAQ 计量单位枚举值
	 **/
	public $fob_unit_type;
	
	/** 
	 * 最小起订量
	 **/
	public $min_order_quantity;
	
	/** 
	 * 最小起订量计量单位，参见FAQ 计量单位枚举值
	 **/
	public $min_order_unit_type;
	
	/** 
	 * 常规包装
	 **/
	public $packaging_desc;
	
	/** 
	 * 付款方式，参见FAQ 付款方式枚举值
	 **/
	public $payment_methods;
	
	/** 
	 * 供货能力周期，参见FAQ 时间周期枚举值
	 **/
	public $supply_period_type;
	
	/** 
	 * 供货能力
	 **/
	public $supply_quantity;
	
	/** 
	 * 供货能力计量单位，参见FAQ 计量单位枚举值
	 **/
	public $supply_unit_type;	
}
?>