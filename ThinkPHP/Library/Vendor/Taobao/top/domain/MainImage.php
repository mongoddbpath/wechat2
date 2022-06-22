<?php

/**
 * 商品主图
 * @author auto create
 */
class MainImage
{
	
	/** 
	 * alibaba图片中心的图片URL列表，请使用alibaba.icbu.photobank.upload接口上传图片
	 **/
	public $images;
	
	/** 
	 * 是否打水印，是(true)或否(false)
	 **/
	public $watermark;
	
	/** 
	 * 水印是否有边框，有边框(Y)或者无边框(N)
	 **/
	public $watermark_frame;
	
	/** 
	 * 水印位置，在中间(center)或者在底部(bottom)
	 **/
	public $watermark_position;	
}
?>