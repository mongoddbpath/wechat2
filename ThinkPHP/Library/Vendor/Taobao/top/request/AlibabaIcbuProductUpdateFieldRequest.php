<?php
/**
 * TOP API: alibaba.icbu.product.update.field request
 * 
 * @author auto create
 * @since 1.0, 2020.04.30
 */
class AlibabaIcbuProductUpdateFieldRequest
{
	/** 
	 * 商品属性和属性值
	 **/
	private $attributes;
	
	/** 
	 * 根据数量设置的折扣价
	 **/
	private $bulkDiscountPrices;
	
	/** 
	 * 类目ID
	 **/
	private $categoryId;
	
	/** 
	 * 定制信息
	 **/
	private $customInfo;
	
	/** 
	 * 商品详情描述，可包含图片中心的图片URL
	 **/
	private $description;
	
	/** 
	 * 补充信息
	 **/
	private $extraContext;
	
	/** 
	 * 分组ID
	 **/
	private $groupId;
	
	/** 
	 * 商品详情种类，true表示智能编辑，不填默认取商品原来的详情种类
	 **/
	private $isSmartEdit;
	
	/** 
	 * 关键词，不要包含特殊符号（如,;），最多三个
	 **/
	private $keywords;
	
	/** 
	 * 语种，当前只有english
	 **/
	private $language;
	
	/** 
	 * 商品主图
	 **/
	private $mainImage;
	
	/** 
	 * 发布的市场，支持main/onesite，默认main发到主市场，填onesite发布为商机通产品
	 **/
	private $market;
	
	/** 
	 * 混淆商品ID
	 **/
	private $productId;
	
	/** 
	 * 商品SKU定义
	 **/
	private $productSku;
	
	/** 
	 * 商品类型，在线批发商品(wholesale)或者询盘商品(sourcing)
	 **/
	private $productType;
	
	/** 
	 * 询盘商品交易信息
	 **/
	private $sourcingTrade;
	
	/** 
	 * 商品名称，最多128个字符
	 **/
	private $subject;
	
	/** 
	 * 使用SKU价的时候需要传入这个参数
	 **/
	private $useSkuPrice;
	
	/** 
	 * 在线批发商品交易信息
	 **/
	private $wholesaleTrade;
	
	private $apiParas = array();
	
	public function setAttributes($attributes)
	{
		$this->attributes = $attributes;
		$this->apiParas["attributes"] = $attributes;
	}

	public function getAttributes()
	{
		return $this->attributes;
	}

	public function setBulkDiscountPrices($bulkDiscountPrices)
	{
		$this->bulkDiscountPrices = $bulkDiscountPrices;
		$this->apiParas["bulk_discount_prices"] = $bulkDiscountPrices;
	}

	public function getBulkDiscountPrices()
	{
		return $this->bulkDiscountPrices;
	}

	public function setCategoryId($categoryId)
	{
		$this->categoryId = $categoryId;
		$this->apiParas["category_id"] = $categoryId;
	}

	public function getCategoryId()
	{
		return $this->categoryId;
	}

	public function setCustomInfo($customInfo)
	{
		$this->customInfo = $customInfo;
		$this->apiParas["custom_info"] = $customInfo;
	}

	public function getCustomInfo()
	{
		return $this->customInfo;
	}

	public function setDescription($description)
	{
		$this->description = $description;
		$this->apiParas["description"] = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setExtraContext($extraContext)
	{
		$this->extraContext = $extraContext;
		$this->apiParas["extra_context"] = $extraContext;
	}

	public function getExtraContext()
	{
		return $this->extraContext;
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

	public function setIsSmartEdit($isSmartEdit)
	{
		$this->isSmartEdit = $isSmartEdit;
		$this->apiParas["is_smart_edit"] = $isSmartEdit;
	}

	public function getIsSmartEdit()
	{
		return $this->isSmartEdit;
	}

	public function setKeywords($keywords)
	{
		$this->keywords = $keywords;
		$this->apiParas["keywords"] = $keywords;
	}

	public function getKeywords()
	{
		return $this->keywords;
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

	public function setMainImage($mainImage)
	{
		$this->mainImage = $mainImage;
		$this->apiParas["main_image"] = $mainImage;
	}

	public function getMainImage()
	{
		return $this->mainImage;
	}

	public function setMarket($market)
	{
		$this->market = $market;
		$this->apiParas["market"] = $market;
	}

	public function getMarket()
	{
		return $this->market;
	}

	public function setProductId($productId)
	{
		$this->productId = $productId;
		$this->apiParas["product_id"] = $productId;
	}

	public function getProductId()
	{
		return $this->productId;
	}

	public function setProductSku($productSku)
	{
		$this->productSku = $productSku;
		$this->apiParas["product_sku"] = $productSku;
	}

	public function getProductSku()
	{
		return $this->productSku;
	}

	public function setProductType($productType)
	{
		$this->productType = $productType;
		$this->apiParas["product_type"] = $productType;
	}

	public function getProductType()
	{
		return $this->productType;
	}

	public function setSourcingTrade($sourcingTrade)
	{
		$this->sourcingTrade = $sourcingTrade;
		$this->apiParas["sourcing_trade"] = $sourcingTrade;
	}

	public function getSourcingTrade()
	{
		return $this->sourcingTrade;
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

	public function setUseSkuPrice($useSkuPrice)
	{
		$this->useSkuPrice = $useSkuPrice;
		$this->apiParas["use_sku_price"] = $useSkuPrice;
	}

	public function getUseSkuPrice()
	{
		return $this->useSkuPrice;
	}

	public function setWholesaleTrade($wholesaleTrade)
	{
		$this->wholesaleTrade = $wholesaleTrade;
		$this->apiParas["wholesale_trade"] = $wholesaleTrade;
	}

	public function getWholesaleTrade()
	{
		return $this->wholesaleTrade;
	}

	public function getApiMethodName()
	{
		return "alibaba.icbu.product.update.field";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkMaxLength($this->description,60000,"description");
		RequestCheckUtil::checkMaxListSize($this->keywords,20,"keywords");
		RequestCheckUtil::checkNotNull($this->language,"language");
		RequestCheckUtil::checkNotNull($this->productId,"productId");
		RequestCheckUtil::checkNotNull($this->productType,"productType");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
