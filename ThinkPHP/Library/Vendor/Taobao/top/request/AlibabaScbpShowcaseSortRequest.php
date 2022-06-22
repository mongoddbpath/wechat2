<?php
/**
 * TOP API: alibaba.scbp.showcase.sort request
 * 
 * @author auto create
 * @since 1.0, 2018.11.20
 */
class AlibabaScbpShowcaseSortRequest
{
	/** 
	 * 当前位置（从1开始）
	 **/
	private $sourceOrder;
	
	/** 
	 * 目标位置（从1开始）
	 **/
	private $targetOrder;
	
	/** 
	 * 要移动的橱窗id
	 **/
	private $windowId;
	
	private $apiParas = array();
	
	public function setSourceOrder($sourceOrder)
	{
		$this->sourceOrder = $sourceOrder;
		$this->apiParas["source_order"] = $sourceOrder;
	}

	public function getSourceOrder()
	{
		return $this->sourceOrder;
	}

	public function setTargetOrder($targetOrder)
	{
		$this->targetOrder = $targetOrder;
		$this->apiParas["target_order"] = $targetOrder;
	}

	public function getTargetOrder()
	{
		return $this->targetOrder;
	}

	public function setWindowId($windowId)
	{
		$this->windowId = $windowId;
		$this->apiParas["window_id"] = $windowId;
	}

	public function getWindowId()
	{
		return $this->windowId;
	}

	public function getApiMethodName()
	{
		return "alibaba.scbp.showcase.sort";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->sourceOrder,"sourceOrder");
		RequestCheckUtil::checkNotNull($this->targetOrder,"targetOrder");
		RequestCheckUtil::checkNotNull($this->windowId,"windowId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
