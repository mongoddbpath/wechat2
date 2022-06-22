<?php
/**
 * TOP API: alibaba.icbu.product.group.get request
 * 
 * @author auto create
 * @since 1.0, 2019.09.11
 */
class AlibabaIcbuProductGroupGetRequest
{
	/** 
	 * 补充信息
	 **/
	private $extraContext;
	
	/** 
	 * 分组ID，传-1获得所有一级分组
	 **/
	private $groupId;
	
	private $apiParas = array();
	
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

	public function getApiMethodName()
	{
		return "alibaba.icbu.product.group.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->groupId,"groupId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
