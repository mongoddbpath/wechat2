<?php

/**
 * 发布类目数据结构
 * @author auto create
 */
class PostCat
{
	
	/** 
	 * 类目id
	 **/
	public $cat_id;
	
	/** 
	 * 孩子类目；如果为叶子，则为空
	 **/
	public $child_ids;
	
	/** 
	 * 中文名字
	 **/
	public $cn_name;
	
	/** 
	 * 英文名字
	 **/
	public $en_name;
	
	/** 
	 * 是否是叶子类目
	 **/
	public $leaf_cat;
	
	/** 
	 * 父亲类目；如果为0，则代表该类目为一级类目
	 **/
	public $parent_ids;	
}
?>