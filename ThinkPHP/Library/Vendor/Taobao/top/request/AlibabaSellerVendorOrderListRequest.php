<?php
/**
 * TOP API: alibaba.seller.vendor.order.list request
 * 
 * @author auto create
 * @since 1.0, 2020.03.26
 */
class AlibabaSellerVendorOrderListRequest
{
	/** 
	 * 查询参数
	 **/
	private $queryTradeDto;
	
	private $apiParas = array();
	
	public function setQueryTradeDto($queryTradeDto)
	{
		$this->queryTradeDto = $queryTradeDto;
		$this->apiParas["query_trade_dto"] = $queryTradeDto;
	}

	public function getQueryTradeDto()
	{
		return $this->queryTradeDto;
	}

	public function getApiMethodName()
	{
		return "alibaba.seller.vendor.order.list";
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
