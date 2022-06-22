<?php

/**
 * 待更新的库存列表
 * @author auto create
 */
class InventoryDto
{
	
	/** 
	 * 库存变动值
	 **/
	public $inventory;
	
	/** 
	 * 库存的仓编码,根据商品查询返回的仓编码进行设置,不同的客户类型,仓编码会不一样
	 **/
	public $inventory_code;
	
	/** 
	 * 操作类型，加库存或者减库存,加库存:plus,减库存:sub
	 **/
	public $operate;
	
	/** 
	 * 待更新库存的SKUid,如果没有skuId,设置成-1
	 **/
	public $sku_id;	
}
?>