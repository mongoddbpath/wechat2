<?php

/**
 * 属性数据结构
 * @author auto create
 */
class Attribute
{
	
	/** 
	 * 属性id
	 **/
	public $attr_id;
	
	/** 
	 * 属性可选的属性值
	 **/
	public $attribute_values;
	
	/** 
	 * 表示是否车型库属性，如果是，则需要从分层属性接口里获取下一级属性
	 **/
	public $car_model;
	
	/** 
	 * 所属发布类目id
	 **/
	public $catid;
	
	/** 
	 * 中文名字
	 **/
	public $cn_name;
	
	/** 
	 * 用成SKU属性时，是否支持自定义图片展示
	 **/
	public $customize_image;
	
	/** 
	 * 用成SKU属性时，是否支持自定义属性值名称
	 **/
	public $customize_value;
	
	/** 
	 * 英文名字
	 **/
	public $en_name;
	
	/** 
	 * 输入类型
	 **/
	public $input_type;
	
	/** 
	 * 是否是关键属性
	 **/
	public $key_attr;
	
	/** 
	 * 是否是定位属性；
	 **/
	public $locator;
	
	/** 
	 * 属性在该发布类目下的顺序
	 **/
	public $order;
	
	/** 
	 * 如果是该类目下某个属性值的子属性，这里为该属性值id
	 **/
	public $parent_value;
	
	/** 
	 * 是否必填属性
	 **/
	public $required;
	
	/** 
	 * 展示类型；input；group
	 **/
	public $show_type;
	
	/** 
	 * 该属性能否当成SKU属性
	 **/
	public $sku_attribute;
	
	/** 
	 * 该属性的单位
	 **/
	public $units;
	
	/** 
	 * valueType
	 **/
	public $value_type;	
}
?>