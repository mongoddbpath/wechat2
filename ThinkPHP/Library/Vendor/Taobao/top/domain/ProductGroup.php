<?php

/**
 * 商品分组
 * @author auto create
 */
class ProductGroup
{
	
	/** 
	 * 下级分组ID列表
	 **/
	public $children_id_list;
	
	/** 
	 * 分组ID
	 **/
	public $group_id;
	
	/** 
	 * 分组名称
	 **/
	public $group_name;
	
	/** 
	 * 上级分组ID
	 **/
	public $parent_id;
	
	/** 
	 * 父节点id，父节点处在分组树的二级
	 **/
	public $parent_id2;	
}
?>