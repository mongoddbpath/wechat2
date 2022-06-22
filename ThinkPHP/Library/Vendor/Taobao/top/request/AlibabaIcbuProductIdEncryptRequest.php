<?php
/**
 * TOP API: alibaba.icbu.product.id.encrypt request
 * 
 * @author auto create
 * @since 1.0, 2020.06.17
 */
class AlibabaIcbuProductIdEncryptRequest
{
	/** 
	 * 语种
	 **/
	private $language;
	
	/** 
	 * 明文id
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
		return "alibaba.icbu.product.id.encrypt";
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
