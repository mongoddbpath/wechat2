<?php
/**
 * TOP API: alibaba.scbp.showcase.list request
 * 
 * @author auto create
 * @since 1.0, 2018.11.20
 */
class AlibabaScbpShowcaseListRequest
{
	/** 
	 * 每页展示个数
	 **/
	private $perPageSize;
	
	/** 
	 * 页码
	 **/
	private $toPage;
	
	private $apiParas = array();
	
	public function setPerPageSize($perPageSize)
	{
		$this->perPageSize = $perPageSize;
		$this->apiParas["per_page_size"] = $perPageSize;
	}

	public function getPerPageSize()
	{
		return $this->perPageSize;
	}

	public function setToPage($toPage)
	{
		$this->toPage = $toPage;
		$this->apiParas["to_page"] = $toPage;
	}

	public function getToPage()
	{
		return $this->toPage;
	}

	public function getApiMethodName()
	{
		return "alibaba.scbp.showcase.list";
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
