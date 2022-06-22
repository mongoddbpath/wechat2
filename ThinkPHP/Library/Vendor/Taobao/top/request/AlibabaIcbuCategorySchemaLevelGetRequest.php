<?php
/**
 * TOP API: alibaba.icbu.category.schema.level.get request
 * 
 * @author auto create
 * @since 1.0, 2020.10.13
 */
class AlibabaIcbuCategorySchemaLevelGetRequest
{
	/** 
	 * 类目id
	 **/
	private $catId;
	
	/** 
	 * 返回的文案的语种，可以输入en_US或者zh
	 **/
	private $language;
	
	/** 
	 * 层级属性的当前层级属性
	 **/
	private $xml;
	
	private $apiParas = array();
	
	public function setCatId($catId)
	{
		$this->catId = $catId;
		$this->apiParas["cat_id"] = $catId;
	}

	public function getCatId()
	{
		return $this->catId;
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

	public function setXml($xml)
	{
		$this->xml = $xml;
		$this->apiParas["xml"] = $xml;
	}

	public function getXml()
	{
		return $this->xml;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.category.schema.level.get";
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
