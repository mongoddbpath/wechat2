<?php

/**
 * 在线批发商品交易信息
 * @author auto create
 */
class WholesaleTrade
{
	
	/** 
	 * 每批数量，当sale_type=batch时生效，范围是1-99999
	 **/
	public $batch_number;
	
	/** 
	 * 阶梯交期
	 **/
	public $deliver_periods;
	
	/** 
	 * 备货期，单位是天，范围是1-60
	 **/
	public $handling_time;
	
	/** 
	 * 最小起订量，必须是batch_number的整数倍，范围是1-99999
	 **/
	public $min_order_quantity;
	
	/** 
	 * 尺寸，单位是厘米，长宽高范围是1-9999999
	 **/
	public $package_size;
	
	/** 
	 * 价格，单位是美元，精确到小数点后两位，范围是0.01-9999999.00
	 **/
	public $price;
	
	/** 
	 * 销售方式，按件卖(normal)或者按批卖(batch)
	 **/
	public $sale_type;
	
	/** 
	 * 运费模板ID
	 **/
	public $shipping_line_template_id;
	
	/** 
	 * 最小计量单位，参见FAQ 计量单位枚举值
	 **/
	public $unit_type;
	
	/** 
	 * 体积，单位是立方厘米，范围是1-9999999
	 **/
	public $volume;
	
	/** 
	 * 重量，单位是kg，精确到小数点后三位，范围是0.01-9999999.000
	 **/
	public $weight;	
}
?>