<?php
/**
 * TOP API: alibaba.icbu.video.upload request
 * 
 * @author auto create
 * @since 1.0, 2020.06.01
 */
class AlibabaIcbuVideoUploadRequest
{
	/** 
	 * 视频封面地址，必需是alicdn下的图片地址，否则会使用系统默认的封面
	 **/
	private $coverUrl;
	
	/** 
	 * 视频文件名
	 **/
	private $videoName;
	
	/** 
	 * 视频文件地址
	 **/
	private $videoPath;
	
	private $apiParas = array();
	
	public function setCoverUrl($coverUrl)
	{
		$this->coverUrl = $coverUrl;
		$this->apiParas["cover_url"] = $coverUrl;
	}

	public function getCoverUrl()
	{
		return $this->coverUrl;
	}

	public function setVideoName($videoName)
	{
		$this->videoName = $videoName;
		$this->apiParas["video_name"] = $videoName;
	}

	public function getVideoName()
	{
		return $this->videoName;
	}

	public function setVideoPath($videoPath)
	{
		$this->videoPath = $videoPath;
		$this->apiParas["video_path"] = $videoPath;
	}

	public function getVideoPath()
	{
		return $this->videoPath;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.video.upload";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->videoName,"videoName");
		RequestCheckUtil::checkNotNull($this->videoPath,"videoPath");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
