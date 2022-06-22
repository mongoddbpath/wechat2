<?php
/**
 * TOP API: alibaba.scbp.showcase.addproduct request
 * 
 * @author auto create
 * @since 1.0, 2018.11.20
 */
class AlibabaScbpShowcaseAddproductRequest
{
	/** 
	 * 需要添加的产品ids
	 **/
	private $productIdList;
	
	private $apiParas = array();
	
	public function setProductIdList($productIdList)
	{
		$this->productIdList = $productIdList;
		$this->apiParas["product_id_list"] = $productIdList;
	}

	public function getProductIdList()
	{
		return $this->productIdList;
	}

	public function getApiMethodName()
	{
		return "alibaba.scbp.showcase.addproduct";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->productIdList,"productIdList");
		RequestCheckUtil::checkMaxListSize($this->productIdList,20,"productIdList");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
