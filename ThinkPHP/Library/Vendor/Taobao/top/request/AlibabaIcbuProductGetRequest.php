<?php
/**
 * TOP API: alibaba.icbu.product.get request
 * 
 * @author auto create
 * @since 1.0, 2021.01.04
 */
class AlibabaIcbuProductGetRequest
{
	/** 
	 * 商品语种，目前只支持ENGLISH
	 **/
	private $language;
	
	/** 
	 * 混淆后的商品ID
	 **/
	private $productId;
	
	private $apiParas = array();
	
	public function setLanguage($language)
	{
		$this->language = $language;
		$this->apiParas["language"] = $language;
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function setProductId($productId)
	{
		$this->productId = $productId;
		$this->apiParas["product_id"] = $productId;
	}

	public function getProductId()
	{
		return $this->productId;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.product.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->language,"language");
		RequestCheckUtil::checkNotNull($this->productId,"productId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
