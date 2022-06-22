<?php
/**
 * TOP API: alibaba.icbu.product.inventory.update request
 * 
 * @author auto create
 * @since 1.0, 2020.11.23
 */
class AlibabaIcbuProductInventoryUpdateRequest
{
	/** 
	 * 更新请求
	 **/
	private $requestParam;
	
	private $apiParas = array();
	
	public function setRequestParam($requestParam)
	{
		$this->requestParam = $requestParam;
		$this->apiParas["request_param"] = $requestParam;
	}

	public function getRequestParam()
	{
		return $this->requestParam;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.product.inventory.update";
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
