<?php
/**
 * TOP API: alibaba.scbp.showcase.status request
 * 
 * @author auto create
 * @since 1.0, 2018.11.20
 */
class AlibabaScbpShowcaseStatusRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "alibaba.scbp.showcase.status";
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
