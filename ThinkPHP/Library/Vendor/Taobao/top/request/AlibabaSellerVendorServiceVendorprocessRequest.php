<?php
/**
 * TOP API: alibaba.seller.vendor.service.vendorprocess request
 * 
 * @author auto create
 * @since 1.0, 2021.05.13
 */
class AlibabaSellerVendorServiceVendorprocessRequest
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
		return "alibaba.seller.vendor.service.vendorprocess";
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
