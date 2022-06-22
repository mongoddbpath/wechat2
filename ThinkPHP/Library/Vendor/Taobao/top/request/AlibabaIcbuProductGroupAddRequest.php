<?php
/**
 * TOP API: alibaba.icbu.product.group.add request
 * 
 * @author auto create
 * @since 1.0, 2018.07.26
 */
class AlibabaIcbuProductGroupAddRequest
{
	/** 
	 * 补充信息，如isv id
	 **/
	private $extraContext;
	
	/** 
	 * 分组名称
	 **/
	private $groupName;
	
	/** 
	 * 上级分组ID，如果建立顶级分组设为-1
	 **/
	private $parentId;
	
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

	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
		$this->apiParas["group_name"] = $groupName;
	}

	public function getGroupName()
	{
		return $this->groupName;
	}

	public function setParentId($parentId)
	{
		$this->parentId = $parentId;
		$this->apiParas["parent_id"] = $parentId;
	}

	public function getParentId()
	{
		return $this->parentId;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.product.group.add";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->groupName,"groupName");
		RequestCheckUtil::checkNotNull($this->parentId,"parentId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
