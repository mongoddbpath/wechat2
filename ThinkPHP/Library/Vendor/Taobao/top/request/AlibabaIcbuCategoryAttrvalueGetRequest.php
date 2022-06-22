<?php
/**
 * TOP API: alibaba.icbu.category.attrvalue.get request
 * 
 * @author auto create
 * @since 1.0, 2019.12.12
 */
class AlibabaIcbuCategoryAttrvalueGetRequest
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
		return "alibaba.icbu.category.attrvalue.get";
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
