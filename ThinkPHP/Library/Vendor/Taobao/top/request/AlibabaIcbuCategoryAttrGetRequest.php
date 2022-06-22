<?php
/**
 * TOP API: alibaba.icbu.category.attr.get request
 * 
 * @author auto create
 * @since 1.0, 2018.07.26
 */
class AlibabaIcbuCategoryAttrGetRequest
{
	/** 
	 * 类目属性request对象
	 **/
	private $attributeRequest;
	
	private $apiParas = array();
	
	public function setAttributeRequest($attributeRequest)
	{
		$this->attributeRequest = $attributeRequest;
		$this->apiParas["attribute_request"] = $attributeRequest;
	}

	public function getAttributeRequest()
	{
		return $this->attributeRequest;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.category.attr.get";
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
