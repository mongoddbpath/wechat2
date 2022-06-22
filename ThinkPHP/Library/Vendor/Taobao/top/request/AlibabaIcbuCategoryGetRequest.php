<?php
/**
 * TOP API: alibaba.icbu.category.get request
 * 
 * @author auto create
 * @since 1.0, 2020.01.09
 */
class AlibabaIcbuCategoryGetRequest
{
	/** 
	 * 发布类目id,必须大于等于0， 如果为0，则查询所有一级类目
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
		return "alibaba.icbu.category.get";
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
