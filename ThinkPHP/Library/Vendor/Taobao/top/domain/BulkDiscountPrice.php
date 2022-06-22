<?php

/**
 * 根据订单数量设置折扣价
 * @author auto create
 */
class BulkDiscountPrice
{
	
	/** 
	 * 价格，范围是0.01-9999999.00
	 **/
	public $price;
	
	/** 
	 * 起始数量，范围是1-99999
	 **/
	public $start_quantity;	
}
?>