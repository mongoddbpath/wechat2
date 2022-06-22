<?php
/**
 * TOP API: alibaba.icbu.category.postcat.get request
 * 
 * @author auto create
 * @since 1.0, 2020.07.06
 */
class AlibabaIcbuCategoryPostcatGetRequest
{
	/** 
	 * 发布类目查询request
	 **/
	private $postCatRequest;
	
	private $apiParas = array();
	
	public function setPostCatRequest($postCatRequest)
	{
		$this->postCatRequest = $postCatRequest;
		$this->apiParas["post_cat_request"] = $postCatRequest;
	}

	public function getPostCatRequest()
	{
		return $this->postCatRequest;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.category.postcat.get";
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
