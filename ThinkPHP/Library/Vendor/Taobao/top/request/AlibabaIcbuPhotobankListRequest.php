<?php
/**
 * TOP API: alibaba.icbu.photobank.list request
 * 
 * @author auto create
 * @since 1.0, 2020.05.08
 */
class AlibabaIcbuPhotobankListRequest
{
	/** 
	 * 当前翻页数
	 **/
	private $currentPage;
	
	/** 
	 * 额外的上下文信息. 例如:icvId
	 **/
	private $extraContext;
	
	/** 
	 * 图片组id
	 **/
	private $groupId;
	
	/** 
	 * 存放位置 必要条件, 包括ALL_GROUP(所有目录), SUB_GROUP(指定图片组下),UNGROUP(未分组), TEMP(disable)四个值
	 **/
	private $locationType;
	
	/** 
	 * 每页显示数
	 **/
	private $pageSize;
	
	private $apiParas = array();
	
	public function setCurrentPage($currentPage)
	{
		$this->currentPage = $currentPage;
		$this->apiParas["current_page"] = $currentPage;
	}

	public function getCurrentPage()
	{
		return $this->currentPage;
	}

	public function setExtraContext($extraContext)
	{
		$this->extraContext = $extraContext;
		$this->apiParas["extra_context"] = $extraContext;
	}

	public function getExtraContext()
	{
		return $this->extraContext;
	}

	public function setGroupId($groupId)
	{
		$this->groupId = $groupId;
		$this->apiParas["group_id"] = $groupId;
	}

	public function getGroupId()
	{
		return $this->groupId;
	}

	public function setLocationType($locationType)
	{
		$this->locationType = $locationType;
		$this->apiParas["location_type"] = $locationType;
	}

	public function getLocationType()
	{
		return $this->locationType;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.photobank.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
