<?php

/**
 * 属性值request对象
 * @author auto create
 */
class AttributeValueRequest
{
	
	/** 
	 * 选填；需要过滤的属性
	 **/
	public $attribute_id;
	
	/** 
	 * 选填；需要过滤的属性值id
	 **/
	public $attribute_value_id;
	
	/** 
	 * 必填；要查询的属性值所属发布类目
	 **/
	public $cat_id;	
}
?>