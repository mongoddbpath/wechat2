<?php

/**
 * 商品属性
 * @author auto create
 */
class ProductAttribute
{
	
	/** 
	 * 属性ID
	 **/
	public $attribute_id;
	
	/** 
	 * 属性名称
	 **/
	public $attribute_name;
	
	/** 
	 * 作为sku属性值时，用图形来显示；必须是alibaba图片中心的图片URL，请使用alibaba.icbu.photobank.upload上传图片
	 **/
	public $sku_custom_image_url;
	
	/** 
	 * 作为sku属性值时，自定义属性值名称
	 **/
	public $sku_custom_value_name;
	
	/** 
	 * 属性值ID
	 **/
	public $value_id;
	
	/** 
	 * 属性值名称
	 **/
	public $value_name;	
}
?>