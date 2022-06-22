<?php

/**
 * 类目
 * @author auto create
 */
class PostCategory
{
	
	/** 
	 * 类目ID
	 **/
	public $category_id;
	
	/** 
	 * 子类目ID数组
	 **/
	public $child_ids;
	
	/** 
	 * 类目的中文名称
	 **/
	public $cn_name;
	
	/** 
	 * 是否叶子类目（只有叶子类目才能发布商品）
	 **/
	public $leaf_category;
	
	/** 
	 * 类目层级
	 **/
	public $level;
	
	/** 
	 * 类目名称
	 **/
	public $name;
	
	/** 
	 * 父类目ID数组
	 **/
	public $parent_ids;	
}
?>