<?php
/**
 * TOP API: alibaba.icbu.product.schema.render request
 * 
 * @author auto create
 * @since 1.0, 2021.01.13
 */
class AlibabaIcbuProductSchemaRenderRequest
{
	/** 
	 * 商品规则渲染请求
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
		return "alibaba.icbu.product.schema.render";
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
