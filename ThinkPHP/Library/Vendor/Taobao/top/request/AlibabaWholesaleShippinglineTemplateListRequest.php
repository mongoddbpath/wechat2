<?php
/**
 * TOP API: alibaba.wholesale.shippingline.template.list request
 * 
 * @author auto create
 * @since 1.0, 2018.07.26
 */
class AlibabaWholesaleShippinglineTemplateListRequest
{
	/** 
	 * 每页返回的数据个数
	 **/
	private $count;
	
	/** 
	 * 第几页从1开始
	 **/
	private $pageNum;
	
	private $apiParas = array();
	
	public function setCount($count)
	{
		$this->count = $count;
		$this->apiParas["count"] = $count;
	}

	public function getCount()
	{
		return $this->count;
	}

	public function setPageNum($pageNum)
	{
		$this->pageNum = $pageNum;
		$this->apiParas["page_num"] = $pageNum;
	}

	public function getPageNum()
	{
		return $this->pageNum;
	}

	public function getApiMethodName()
	{
		return "alibaba.wholesale.shippingline.template.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkMaxValue($this->count,100,"count");
		RequestCheckUtil::checkMinValue($this->count,1,"count");
		RequestCheckUtil::checkMaxValue($this->pageNum,100,"pageNum");
		RequestCheckUtil::checkMinValue($this->pageNum,1,"pageNum");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
