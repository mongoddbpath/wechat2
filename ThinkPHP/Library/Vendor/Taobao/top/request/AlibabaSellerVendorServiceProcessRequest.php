<?php
/**
 * TOP API: alibaba.seller.vendor.service.process request
 * 
 * @author auto create
 * @since 1.0, 2021.02.25
 */
class AlibabaSellerVendorServiceProcessRequest
{
	/** 
	 * order_num
	 **/
	private $orderNum;
	
	private $apiParas = array();
	
	public function setOrderNum($orderNum)
	{
		$this->orderNum = $orderNum;
		$this->apiParas["order_num"] = $orderNum;
	}

	public function getOrderNum()
	{
		return $this->orderNum;
	}

	public function getApiMethodName()
	{
		return "alibaba.seller.vendor.service.process";
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
