<?php

/**
 * SKU定义
 * @author auto create
 */
class SkuDefinition
{
	
	/** 
	 * attr2Value
	 **/
	public $attr2_value;
	
	/** 
	 * 根据订单数量设置折扣价
	 **/
	public $bulk_discount_prices;
	
	/** 
	 * 商品的库存列表
	 **/
	public $inventory_dto_list;
	
	/** 
	 * 商品的SKU编码
	 **/
	public $sku_code;
	
	/** 
	 * 商品的SKUid，唯一标识SKU
	 **/
	public $sku_id;	
}
?>