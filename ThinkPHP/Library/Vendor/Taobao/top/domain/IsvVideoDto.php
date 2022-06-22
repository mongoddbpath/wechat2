<?php

/**
 * 视频列表
 * @author auto create
 */
class IsvVideoDto
{
	
	/** 
	 * 封面图
	 **/
	public $cover_url;
	
	/** 
	 * 视频时长
	 **/
	public $duration;
	
	/** 
	 * 视频大小
	 **/
	public $file_size;
	
	/** 
	 * 发布时间，时间戳毫秒
	 **/
	public $publish_time;
	
	/** 
	 * 用户名，脱敏数据
	 **/
	public $publish_user_name;
	
	/** 
	 * 质量
	 **/
	public $quality;
	
	/** 
	 * 关联商品数量
	 **/
	public $related_product_count;
	
	/** 
	 * 状态
	 **/
	public $status;
	
	/** 
	 * 标题
	 **/
	public $title;
	
	/** 
	 * 高度
	 **/
	public $video_height;
	
	/** 
	 * 视频id
	 **/
	public $video_id;
	
	/** 
	 * 视频链接
	 **/
	public $video_url;
	
	/** 
	 * 视频宽度
	 **/
	public $video_width;	
}
?>