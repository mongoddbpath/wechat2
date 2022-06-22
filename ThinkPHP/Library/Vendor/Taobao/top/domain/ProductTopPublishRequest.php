<?php

/**
 * 发布入参
 * @author auto create
 */
class ProductTopPublishRequest
{
	
	/** 
	 * 类目id
	 **/
	public $cat_id;
	
	/** 
	 * 返回文案的语种，支持en_US,zh,zh_TW
	 **/
	public $language;
	
	/** 
	 * 商品的具体数据信息
	 **/
	public $xml;	
}
?>