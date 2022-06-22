<?php
/**
 * TOP API: alibaba.scbp.showcase.updateproduct request
 * 
 * @author auto create
 * @since 1.0, 2018.11.20
 */
class AlibabaScbpShowcaseUpdateproductRequest
{
	/** 
	 * 新的商品id
	 **/
	private $newProductId;
	
	/** 
	 * 橱窗id
	 **/
	private $windowId;
	
	private $apiParas = array();
	
	public function setNewProductId($newProductId)
	{
		$this->newProductId = $newProductId;
		$this->apiParas["new_product_id"] = $newProductId;
	}

	public function getNewProductId()
	{
		return $this->newProductId;
	}

	public function setWindowId($windowId)
	{
		$this->windowId = $windowId;
		$this->apiParas["window_id"] = $windowId;
	}

	public function getWindowId()
	{
		return $this->windowId;
	}

	public function getApiMethodName()
	{
		return "alibaba.scbp.showcase.updateproduct";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->newProductId,"newProductId");
		RequestCheckUtil::checkNotNull($this->windowId,"windowId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
