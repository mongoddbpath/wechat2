<?php
/**
 * TOP API: alibaba.icbu.category.id.mapping request
 * 
 * @author auto create
 * @since 1.0, 2020.10.10
 */
class AlibabaIcbuCategoryIdMappingRequest
{
	/** 
	 * 属性id
	 **/
	private $attributeId;
	
	/** 
	 * 属性值id
	 **/
	private $attributeValueId;
	
	/** 
	 * 发布类目id
	 **/
	private $catId;
	
	/** 
	 * 转化类型, 1 = 转化类目id 2= 转化属性id 3= 转化属性值id
	 **/
	private $convertType;
	
	private $apiParas = array();
	
	public function setAttributeId($attributeId)
	{
		$this->attributeId = $attributeId;
		$this->apiParas["attribute_id"] = $attributeId;
	}

	public function getAttributeId()
	{
		return $this->attributeId;
	}

	public function setAttributeValueId($attributeValueId)
	{
		$this->attributeValueId = $attributeValueId;
		$this->apiParas["attribute_value_id"] = $attributeValueId;
	}

	public function getAttributeValueId()
	{
		return $this->attributeValueId;
	}

	public function setCatId($catId)
	{
		$this->catId = $catId;
		$this->apiParas["cat_id"] = $catId;
	}

	public function getCatId()
	{
		return $this->catId;
	}

	public function setConvertType($convertType)
	{
		$this->convertType = $convertType;
		$this->apiParas["convert_type"] = $convertType;
	}

	public function getConvertType()
	{
		return $this->convertType;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.category.id.mapping";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->catId,"catId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
