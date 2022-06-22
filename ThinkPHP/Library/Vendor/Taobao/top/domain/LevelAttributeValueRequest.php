<?php

/**
 * 属性值request对象
 * @author auto create
 */
class LevelAttributeValueRequest
{
	
	/** 
	 * 类目属性id，放到数组第一个位置
	 **/
	public $attr_id;
	
	/** 
	 * 必填；要查询的属性值所属发布类目
	 **/
	public $cat_id;
	
	/** 
	 * 属性值id, 不同取值范围时的查询策略如下:  <=0：列出当前类目属性的所有属性值  >0：指定当前类目属性的某一个属性值，列出该属性值下的子属性和该子属性的所有属性值
	 **/
	public $value_id;	
}
?>