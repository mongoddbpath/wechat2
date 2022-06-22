<?php
/**
 * TOP API: alibaba.icbu.product.list request
 * 
 * @author auto create
 * @since 1.0, 2020.12.10
 */
class AlibabaIcbuProductListRequest
{
	/** 
	 * 类目ID
	 **/
	private $categoryId;
	
	/** 
	 * 当前页
	 **/
	private $currentPage;
	
	/** 
	 * 最早修改时间，格式yyyy-MM-dd HH:mm:ss
	 **/
	private $gmtModifiedFrom;
	
	/** 
	 * 最晚修改时间，格式yyyy-MM-dd HH:mm:ss
	 **/
	private $gmtModifiedTo;
	
	/** 
	 * 商品一级分组id，可选填。若填写0 则表示取回的商品没有一级分组，不填入代表取回的商品不关心它的一级分组，填写对应的group id将返回这个分组下的商品
	 **/
	private $groupId1;
	
	/** 
	 * 商品二级分组id，可选填。若填写-1 则表示取回的商品没有二级分组，不填入代表取回的商品不关系它的二级分组，填写对应的group id将返回这个分组下的商品
	 **/
	private $groupId2;
	
	/** 
	 * 商品三级分组id，可选填。若填写-1 则表示取回的商品没有三级分组，不填入代表取回的商品不关心它的三级分组，填写对应的group id将返回这个分组下的商品
	 **/
	private $groupId3;
	
	/** 
	 * 商品明文id
	 **/
	private $id;
	
	/** 
	 * 商品语种，目前只支持ENGLISH
	 **/
	private $language;
	
	/** 
	 * 每页大小，最大30
	 **/
	private $pageSize;
	
	/** 
	 * 商品名称，支持模糊匹配
	 **/
	private $subject;
	
	private $apiParas = array();
	
	public function setCategoryId($categoryId)
	{
		$this->categoryId = $categoryId;
		$this->apiParas["category_id"] = $categoryId;
	}

	public function getCategoryId()
	{
		return $this->categoryId;
	}

	public function setCurrentPage($currentPage)
	{
		$this->currentPage = $currentPage;
		$this->apiParas["current_page"] = $currentPage;
	}

	public function getCurrentPage()
	{
		return $this->currentPage;
	}

	public function setGmtModifiedFrom($gmtModifiedFrom)
	{
		$this->gmtModifiedFrom = $gmtModifiedFrom;
		$this->apiParas["gmt_modified_from"] = $gmtModifiedFrom;
	}

	public function getGmtModifiedFrom()
	{
		return $this->gmtModifiedFrom;
	}

	public function setGmtModifiedTo($gmtModifiedTo)
	{
		$this->gmtModifiedTo = $gmtModifiedTo;
		$this->apiParas["gmt_modified_to"] = $gmtModifiedTo;
	}

	public function getGmtModifiedTo()
	{
		return $this->gmtModifiedTo;
	}

	public function setGroupId1($groupId1)
	{
		$this->groupId1 = $groupId1;
		$this->apiParas["group_id1"] = $groupId1;
	}

	public function getGroupId1()
	{
		return $this->groupId1;
	}

	public function setGroupId2($groupId2)
	{
		$this->groupId2 = $groupId2;
		$this->apiParas["group_id2"] = $groupId2;
	}

	public function getGroupId2()
	{
		return $this->groupId2;
	}

	public function setGroupId3($groupId3)
	{
		$this->groupId3 = $groupId3;
		$this->apiParas["group_id3"] = $groupId3;
	}

	public function getGroupId3()
	{
		return $this->groupId3;
	}

	public function setId($id)
	{
		$this->id = $id;
		$this->apiParas["id"] = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setLanguage($language)
	{
		$this->language = $language;
		$this->apiParas["language"] = $language;
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function setSubject($subject)
	{
		$this->subject = $subject;
		$this->apiParas["subject"] = $subject;
	}

	public function getSubject()
	{
		return $this->subject;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.product.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->language,"language");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
