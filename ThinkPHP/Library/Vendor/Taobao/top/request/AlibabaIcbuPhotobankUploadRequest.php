<?php
/**
 * TOP API: alibaba.icbu.photobank.upload request
 * 
 * @author auto create
 * @since 1.0, 2021.01.06
 */
class AlibabaIcbuPhotobankUploadRequest
{
	/** 
	 * 扩展参数信息,如ICVID
	 **/
	private $extraContext;
	
	/** 
	 * 上传图片名称
	 **/
	private $fileName;
	
	/** 
	 * 上传图片所在分组
	 **/
	private $groupId;
	
	/** 
	 * 图片字节数组
	 **/
	private $imageBytes;
	
	private $apiParas = array();
	
	public function setExtraContext($extraContext)
	{
		$this->extraContext = $extraContext;
		$this->apiParas["extra_context"] = $extraContext;
	}

	public function getExtraContext()
	{
		return $this->extraContext;
	}

	public function setFileName($fileName)
	{
		$this->fileName = $fileName;
		$this->apiParas["file_name"] = $fileName;
	}

	public function getFileName()
	{
		return $this->fileName;
	}

	public function setGroupId($groupId)
	{
		$this->groupId = $groupId;
		$this->apiParas["group_id"] = $groupId;
	}

	public function getGroupId()
	{
		return $this->groupId;
	}

	public function setImageBytes($imageBytes)
	{
		$this->imageBytes = $imageBytes;
		$this->apiParas["image_bytes"] = $imageBytes;
	}

	public function getImageBytes()
	{
		return $this->imageBytes;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.photobank.upload";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->fileName,"fileName");
		RequestCheckUtil::checkNotNull($this->imageBytes,"imageBytes");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
