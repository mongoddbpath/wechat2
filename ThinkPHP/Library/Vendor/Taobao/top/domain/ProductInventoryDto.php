<?php

/**
 * 商品的库存列表
 * @author auto create
 */
class ProductInventoryDto
{
	
	/** 
	 * 库存值
	 **/
	public $inventory;
	
	/** 
	 * 库存编码，为空时表示默认国内仓
	 **/
	public $store_code;	
}
?>