<?php
/**
 * TOP API: alibaba.icbu.photobank.group.operate request
 * 
 * @author auto create
 * @since 1.0, 2019.07.08
 */
class AlibabaIcbuPhotobankGroupOperateRequest
{
	/** 
	 * 图片分组操作请求对象
	 **/
	private $photoGroupOperationRequest;
	
	private $apiParas = array();
	
	public function setPhotoGroupOperationRequest($photoGroupOperationRequest)
	{
		$this->photoGroupOperationRequest = $photoGroupOperationRequest;
		$this->apiParas["photo_group_operation_request"] = $photoGroupOperationRequest;
	}

	public function getPhotoGroupOperationRequest()
	{
		return $this->photoGroupOperationRequest;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.photobank.group.operate";
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
