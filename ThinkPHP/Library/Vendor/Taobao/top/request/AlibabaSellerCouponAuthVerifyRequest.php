<?php
/**
 * TOP API: alibaba.seller.coupon.auth.verify request
 * 
 * @author auto create
 * @since 1.0, 2020.08.18
 */
class AlibabaSellerCouponAuthVerifyRequest
{
	/** 
	 * 卡券验证码
	 **/
	private $couponSeqNumber;
	
	/** 
	 * 服务代码
	 **/
	private $serviceCode;
	
	private $apiParas = array();
	
	public function setCouponSeqNumber($couponSeqNumber)
	{
		$this->couponSeqNumber = $couponSeqNumber;
		$this->apiParas["coupon_seq_number"] = $couponSeqNumber;
	}

	public function getCouponSeqNumber()
	{
		return $this->couponSeqNumber;
	}

	public function setServiceCode($serviceCode)
	{
		$this->serviceCode = $serviceCode;
		$this->apiParas["service_code"] = $serviceCode;
	}

	public function getServiceCode()
	{
		return $this->serviceCode;
	}

	public function getApiMethodName()
	{
		return "alibaba.seller.coupon.auth.verify";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->couponSeqNumber,"couponSeqNumber");
		RequestCheckUtil::checkNotNull($this->serviceCode,"serviceCode");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
