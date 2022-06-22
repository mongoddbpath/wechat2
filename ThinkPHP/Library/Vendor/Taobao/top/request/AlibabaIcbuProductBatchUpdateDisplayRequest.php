<?php
/**
 * TOP API: alibaba.icbu.product.batch.update.display request
 * 
 * @author auto create
 * @since 1.0, 2019.09.23
 */
class AlibabaIcbuProductBatchUpdateDisplayRequest
{
	/** 
	 * on表示上架，off表示下架
	 **/
	private $newDisplay;
	
	/** 
	 * 用逗号分隔的混淆id字符串
	 **/
	private $productIdList;
	
	private $apiParas = array();
	
	public function setNewDisplay($newDisplay)
	{
		$this->newDisplay = $newDisplay;
		$this->apiParas["new_display"] = $newDisplay;
	}

	public function getNewDisplay()
	{
		return $this->newDisplay;
	}

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
		return "alibaba.icbu.product.batch.update.display";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->newDisplay,"newDisplay");
		RequestCheckUtil::checkNotNull($this->productIdList,"productIdList");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
