<?php

/**
 * 单个商品详情
 * @author auto create
 */
class AlibabaProductResponse
{
	
	/** 
	 * 商品属性
	 **/
	public $attributes;
	
	/** 
	 * 类目ID
	 **/
	public $category_id;
	
	/** 
	 * 定制信息
	 **/
	public $custom_info;
	
	/** 
	 * 商品详情描述
	 **/
	public $description;
	
	/** 
	 * Y为上架状态
	 **/
	public $display;
	
	/** 
	 * 产品更新时间
	 **/
	public $gmt_modified;
	
	/** 
	 * 商品分组ID
	 **/
	public $group_id;
	
	/** 
	 * 是否是智能编辑
	 **/
	public $is_smart_edit;
	
	/** 
	 * 关键词
	 **/
	public $keywords;
	
	/** 
	 * 语种
	 **/
	public $language;
	
	/** 
	 * 商品的主图
	 **/
	public $main_image;
	
	/** 
	 * 产品负责人
	 **/
	public $owner_member;
	
	/** 
	 * 产品负责人显示名，由firstname和lastname拼接组成
	 **/
	public $owner_member_display_name;
	
	/** 
	 * https://www.alibaba.com/product-detail/Short-Umbrella-Girls-Black-Lace-Polka_1600107214049.html?spm=a2700.galleryofferlist.normalList.12.6c612db4ueHAW2
	 **/
	public $pc_detail_url;
	
	/** 
	 * /**      * SKU价      */     SKU_PRICE("sku_price"),     /**      * 阶梯价      */     LADDER_PRICE("ladder_price"),     /**      * fob价: 单一区间fob价      */     FOB_PRICE("fob_price");
	 **/
	public $price_type;
	
	/** 
	 * 产品ID
	 **/
	public $product_id;
	
	/** 
	 * 商品SKU
	 **/
	public $product_sku;
	
	/** 
	 * 商品类型
	 **/
	public $product_type;
	
	/** 
	 * 询盘商品交易信息
	 **/
	public $sourcing_trade;
	
	/** 
	 * status 的值：sketch：草稿，approved：审核通过，tbd：审核不通过，new 、modified ：审核中
	 **/
	public $status;
	
	/** 
	 * 商品名称
	 **/
	public $subject;
	
	/** 
	 * 在线批发商品交易信息
	 **/
	public $wholesale_trade;	
}
?>