<?php
/**
 * TOP API: alibaba.seller.vendor.order.detail request
 * 
 * @author auto create
 * @since 1.0, 2020.03.26
 */
class AlibabaSellerVendorOrderDetailRequest
{
	/** 
	 * 订单编号
	 **/
	private $orderNo;
	
	private $apiParas = array();
	
	public function setOrderNo($orderNo)
	{
		$this->orderNo = $orderNo;
		$this->apiParas["order_no"] = $orderNo;
	}

	public function getOrderNo()
	{
		return $this->orderNo;
	}

	public function getApiMethodName()
	{
		return "alibaba.seller.vendor.order.detail";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->orderNo,"orderNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
