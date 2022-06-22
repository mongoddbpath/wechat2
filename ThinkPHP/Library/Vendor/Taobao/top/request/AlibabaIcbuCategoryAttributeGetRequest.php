<?php
/**
 * TOP API: alibaba.icbu.category.attribute.get request
 * 
 * @author auto create
 * @since 1.0, 2020.02.27
 */
class AlibabaIcbuCategoryAttributeGetRequest
{
	/** 
	 * 发布类目id
	 **/
	private $catId;
	
	private $apiParas = array();
	
	public function setCatId($catId)
	{
		$this->catId = $catId;
		$this->apiParas["cat_id"] = $catId;
	}

	public function getCatId()
	{
		return $this->catId;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.category.attribute.get";
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
