<?php

/**
 * 属性值数据结构
 * @author auto create
 */
class AttributeValue
{
	
	/** 
	 * 属性id
	 **/
	public $attr_id;
	
	/** 
	 * 属性值id
	 **/
	public $attr_value_id;
	
	/** 
	 * 所属类目id
	 **/
	public $cat_id;
	
	/** 
	 * 该属性值的子属性id
	 **/
	public $child_attrs;
	
	/** 
	 * 英文名字
	 **/
	public $en_name;
	
	/** 
	 * 是否SKU属性值
	 **/
	public $sku_value;	
}
?>