<?php
/**
 * TOP API: alibaba.icbu.photobank.group.list request
 * 
 * @author auto create
 * @since 1.0, 2018.11.20
 */
class AlibabaIcbuPhotobankGroupListRequest
{
	/** 
	 * 补充信息
	 **/
	private $extraContext;
	
	/** 
	 * 查询图片分组信息，如果传入id，则获取当前分组和所有子分组信息，否则获取所有一级分组信息
	 **/
	private $id;
	
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

	public function setId($id)
	{
		$this->id = $id;
		$this->apiParas["id"] = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.photobank.group.list";
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
