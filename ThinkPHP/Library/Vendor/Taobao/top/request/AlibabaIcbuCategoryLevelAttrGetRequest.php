<?php
/**
 * TOP API: alibaba.icbu.category.level.attr.get request
 * 
 * @author auto create
 * @since 1.0, 2020.02.27
 */
class AlibabaIcbuCategoryLevelAttrGetRequest
{
	/** 
	 * 属性值request对象
	 **/
	private $attributeValueRequest;
	
	private $apiParas = array();
	
	public function setAttributeValueRequest($attributeValueRequest)
	{
		$this->attributeValueRequest = $attributeValueRequest;
		$this->apiParas["attribute_value_request"] = $attributeValueRequest;
	}

	public function getAttributeValueRequest()
	{
		return $this->attributeValueRequest;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.category.level.attr.get";
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
