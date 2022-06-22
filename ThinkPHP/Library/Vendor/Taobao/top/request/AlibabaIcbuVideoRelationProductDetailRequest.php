<?php
/**
 * TOP API: alibaba.icbu.video.relation.product.detail request
 * 
 * @author auto create
 * @since 1.0, 2020.05.28
 */
class AlibabaIcbuVideoRelationProductDetailRequest
{
	/** 
	 * 商品id
	 **/
	private $productId;
	
	/** 
	 * 视频id
	 **/
	private $videoId;
	
	private $apiParas = array();
	
	public function setProductId($productId)
	{
		$this->productId = $productId;
		$this->apiParas["product_id"] = $productId;
	}

	public function getProductId()
	{
		return $this->productId;
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
		return "alibaba.icbu.video.relation.product.detail";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->productId,"productId");
		RequestCheckUtil::checkNotNull($this->videoId,"videoId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
