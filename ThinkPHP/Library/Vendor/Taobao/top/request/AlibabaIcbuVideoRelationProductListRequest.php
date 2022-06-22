<?php
/**
 * TOP API: alibaba.icbu.video.relation.product.list request
 * 
 * @author auto create
 * @since 1.0, 2020.06.29
 */
class AlibabaIcbuVideoRelationProductListRequest
{
	/** 
	 * videoId-主图视频；detailVideoId-详情视频
	 **/
	private $type;
	
	/** 
	 * 视频加密id
	 **/
	private $videoId;
	
	private $apiParas = array();
	
	public function setType($type)
	{
		$this->type = $type;
		$this->apiParas["type"] = $type;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setVideoId($videoId)
	{
		$this->videoId = $videoId;
		$this->apiParas["video_id"] = $videoId;
	}

	public function getVideoId()
	{
		return $this->videoId;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.video.relation.product.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->type,"type");
		RequestCheckUtil::checkNotNull($this->videoId,"videoId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
