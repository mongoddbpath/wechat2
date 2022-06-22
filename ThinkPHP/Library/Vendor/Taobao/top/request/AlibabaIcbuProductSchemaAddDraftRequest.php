<?php
/**
 * TOP API: alibaba.icbu.product.schema.add.draft request
 * 
 * @author auto create
 * @since 1.0, 2020.10.13
 */
class AlibabaIcbuProductSchemaAddDraftRequest
{
	/** 
	 * 发布入参
	 **/
	private $paramProductTopPublishRequest;
	
	private $apiParas = array();
	
	public function setParamProductTopPublishRequest($paramProductTopPublishRequest)
	{
		$this->paramProductTopPublishRequest = $paramProductTopPublishRequest;
		$this->apiParas["param_product_top_publish_request"] = $paramProductTopPublishRequest;
	}

	public function getParamProductTopPublishRequest()
	{
		return $this->paramProductTopPublishRequest;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.product.schema.add.draft";
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
