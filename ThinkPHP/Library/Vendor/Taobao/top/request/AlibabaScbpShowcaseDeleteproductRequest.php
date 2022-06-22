<?php
/**
 * TOP API: alibaba.scbp.showcase.deleteproduct request
 * 
 * @author auto create
 * @since 1.0, 2018.11.20
 */
class AlibabaScbpShowcaseDeleteproductRequest
{
	/** 
	 * 橱窗idList
	 **/
	private $windowIdList;
	
	private $apiParas = array();
	
	public function setWindowIdList($windowIdList)
	{
		$this->windowIdList = $windowIdList;
		$this->apiParas["window_id_list"] = $windowIdList;
	}

	public function getWindowIdList()
	{
		return $this->windowIdList;
	}

	public function getApiMethodName()
	{
		return "alibaba.scbp.showcase.deleteproduct";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->windowIdList,"windowIdList");
		RequestCheckUtil::checkMaxListSize($this->windowIdList,20,"windowIdList");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
