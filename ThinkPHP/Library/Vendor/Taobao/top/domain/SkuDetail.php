<?php

/**
 * 需要失效的SKU的详细定义
 * @author auto create
 */
class SkuDetail
{
	
	/** 
	 * 商品属性
	 **/
	public $attributes;
	
	/** 
	 * 价格，单位是美元，精确到小数点后两位，范围是0.01-9999999.00
	 **/
	public $price;	
}
?>