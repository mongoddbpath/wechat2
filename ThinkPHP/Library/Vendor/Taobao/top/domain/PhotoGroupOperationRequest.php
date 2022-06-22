<?php

/**
 * 图片分组操作请求对象
 * @author auto create
 */
class PhotoGroupOperationRequest
{
	
	/** 
	 * add操作中表示新增分组的父分组id，delete操作和rename操作表示要操作的分组id
	 **/
	public $group_id;
	
	/** 
	 * add操作中表示新增的分组名，rename操作中表示重命名后的分组名，delete操作不填
	 **/
	public $group_name;
	
	/** 
	 * add表示新增分组，delete表示删除分组，rename表示重命名分组
	 **/
	public $operation;	
}
?>