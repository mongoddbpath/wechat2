<?php

/**
 * 返回集合
 * @author auto create
 */
class VendorMerchantRecordBaseDto
{
	
	/** 
	 * 近30天PC/MA活跃天数
	 **/
	public $active_day_pc_m;
	
	/** 
	 * 近30天活跃子账号数
	 **/
	public $active_mbr_m;
	
	/** 
	 * 月活跃子账号达标率
	 **/
	public $active_mbr_rate;
	
	/** 
	 * 会员主账号id
	 **/
	public $admin_mbr_id;
	
	/** 
	 * 服务商发品数
	 **/
	public $agency_prod_cnt;
	
	/** 
	 * 服务商开始接洽时间
	 **/
	public $contact_time;
	
	/** 
	 * 交易单当前状态
	 **/
	public $current_status;
	
	/** 
	 * 进入交付时间
	 **/
	public $delivered_time;
	
	/** 
	 * 系统入库时间
	 **/
	public $dw_ins_time;
	
	/** 
	 * 首年0-6个月信保渗透月数
	 **/
	public $fiscal_svrc6m_valid_ord_cnt;
	
	/** 
	 * 实力优品数
	 **/
	public $good_prod_cnt;
	
	/** 
	 * 实力优品达标率
	 **/
	public $good_prod_rate;
	
	/** 
	 * 是否有价格不合理产品Y/N
	 **/
	public $have_price_prod;
	
	/** 
	 * 是否有重复铺货产品Y/N
	 **/
	public $have_repeat_prod;
	
	/** 
	 * 是否蓝海定招
	 **/
	public $is_blue_new_sign;
	
	/** 
	 * 店铺是否装修，页面最晚修改时间和旺铺创建时间差
	 **/
	public $is_comp_dec;
	
	/** 
	 * 最近7天店铺日均搜索曝光是否正常Y/N
	 **/
	public $is_comp_exp_ok;
	
	/** 
	 * 是否信保亮灯Y/N
	 **/
	public $is_crd_scrty;
	
	/** 
	 * 是否商机破蛋【Y/N】
	 **/
	public $is_has_ab;
	
	/** 
	 * 是否首月询盘破蛋【Y/N】
	 **/
	public $is_has_mc_fst_mon;
	
	/** 
	 * 关键词曝光是否正常Y/N
	 **/
	public $is_kw_exp_ok;
	
	/** 
	 * 是否MC15达标（询盘达到15个）
	 **/
	public $is_mc15;
	
	/** 
	 * 是否p4p月消耗达标【Y/N】
	 **/
	public $is_p4p_cost_qualified1;
	
	/** 
	 * 是否p4p绑定推广商品数大于等于30【Y/N】
	 **/
	public $is_p4p_prod_geq30_cnt;
	
	/** 
	 * 是否p4p绑定推广商品数大于等于80【Y/N】
	 **/
	public $is_p4p_prod_geq80_cnt;
	
	/** 
	 * 是否至少发布了1个有效报价RFQ
	 **/
	public $is_rfq;
	
	/** 
	 * 是否有降星风险Y/N
	 **/
	public $is_star_lower_risk;
	
	/** 
	 * 是否有侵权品牌Y/N
	 **/
	public $is_tort_brand;
	
	/** 
	 * 是否至少发布了1个良好的且非aliwood且非段灯片的视频
	 **/
	public $is_video;
	
	/** 
	 * k200比率，关键词除以200的比率
	 **/
	public $kw200_rate;
	
	/** 
	 * 关键词达标率
	 **/
	public $kw_rate;
	
	/** 
	 * 最近一次开通服务天数
	 **/
	public $latest_actual_srvc_days;
	
	/** 
	 * 预测下月星等级
	 **/
	public $level_star;
	
	/** 
	 * 当月星等级
	 **/
	public $level_star_page;
	
	/** 
	 * 主营一级类目描述
	 **/
	public $main_cate_lv1_desc;
	
	/** 
	 * 主营一级类目ID
	 **/
	public $main_cate_lv1_std001;
	
	/** 
	 * 主营二级类目描述
	 **/
	public $main_cate_lv2_desc;
	
	/** 
	 * 主营二级类目ID
	 **/
	public $main_cate_lv2_std001;
	
	/** 
	 * 月mc达标率
	 **/
	public $mc_rate;
	
	/** 
	 * 定制力是否双60
	 **/
	public $nrts6060;
	
	/** 
	 * 开通周期（付款到开通）
	 **/
	public $open_cycle;
	
	/** 
	 * 订单号
	 **/
	public $ord_num;
	
	/** 
	 * p150且4分达标率
	 **/
	public $p1504_rate;
	
	/** 
	 * p30且4分达标率
	 **/
	public $p304_rate;
	
	/** 
	 * 下单时间
	 **/
	public $pay_time;
	
	/** 
	 * 月pc在线天数达标率
	 **/
	public $pc_online_day_rate;
	
	/** 
	 * 月PC在线时长达标率
	 **/
	public $pc_online_hour_rate;
	
	/** 
	 * 潜力品数
	 **/
	public $potential_prod_cnt;
	
	/** 
	 * 潜力品达标率
	 **/
	public $potential_prod_rate;
	
	/** 
	 * 4.0分及以上商品数
	 **/
	public $prod40;
	
	/** 
	 * 4.5分及以上商品数
	 **/
	public $prod45;
	
	/** 
	 * 蓝海品数
	 **/
	public $prod_blue;
	
	/** 
	 * 有效商品数
	 **/
	public $prod_cnt;
	
	/** 
	 * 视频数量
	 **/
	public $prod_video_cnt;
	
	/** 
	 * 赛道，RTS/询盘
	 **/
	public $road;
	
	/** 
	 * RTS力是否双60
	 **/
	public $rts6060;
	
	/** 
	 * RTS商品数
	 **/
	public $rts_prod_cnt;
	
	/** 
	 * 服务编码
	 **/
	public $service_code;
	
	/** 
	 * 服务名称
	 **/
	public $service_name;
	
	/** 
	 * 服务类型：WYQH/WYFP/BXHH(无忧起航、无忧发品、保校护航)
	 **/
	public $service_type;
	
	/** 
	 * 统计日期
	 **/
	public $stat_date;
	
	/** 
	 * 近30天PC/MA在线时长(小时)
	 **/
	public $stay_hour_pc_m;
	
	/** 
	 * 订单完成时间
	 **/
	public $tradesuccess_time;
	
	/** 
	 * 服务商编码
	 **/
	public $vendor_code;
	
	/** 
	 * 服务商公司名
	 **/
	public $vendor_comp_name;
	
	/** 
	 * 历史截至当日橱窗商品使用率
	 **/
	public $win_prod_ratio_std001;	
}
?>