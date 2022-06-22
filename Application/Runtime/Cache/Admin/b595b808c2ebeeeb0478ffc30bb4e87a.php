<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>人员信息采集系</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="/Public/css/font.css">
        <link rel="stylesheet" href="/Public/css/xadmin.css">
        <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
        <script src="/Public/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/Public/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            // 是否开启刷新记忆tab功能
            // var is_remember = false;
        </script>
        
        

    </head>
    
<style>
    .menu_li{
        display:none;
    }
</style>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<body class="index">
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo">
            <a href="./index.html">人员信息采集系统</a></div>
        <div class="left_open">
            <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
        </div>
        <ul class="layui-nav left" lay-filter="">

            <?php if(is_array($result)): foreach($result as $key=>$value): if($value['pid'] == 0): ?><li class="layui-nav-item to-index auth_id_<?php echo ($value['auth_id']); ?>" menu="menu_<?php echo ($value['auth_id']); ?>"><a href="#<?php echo ($value['auth_id']); ?>"><?php echo ($value['title']); ?></a></li><?php endif; endforeach; endif; ?>

            <!--<li class="layui-nav-item to-index" menu="menu_2"><a>基础设置</a></li>
            <li class="layui-nav-item to-index" menu="menu_3"><a>服务管理</a></li>
            <li class="layui-nav-item to-index" menu="menu_4"><a>订单管理</a></li>
            <li class="layui-nav-item to-index" menu="menu_5"><a>项目管理</a></li>
            <li class="layui-nav-item to-index" menu="menu_6"><a>任务管理</a></li>
            <li class="layui-nav-item to-index" menu="menu_7"><a>统计报表</a></li> -->
        </ul>

        <ul class="layui-nav right" lay-filter="">
            <li class="layui-nav-item right">
                <a href="javascript:;"><?php echo ($username); ?></a>
                <dl class="layui-nav-child">
                    <!-- 二级菜单 -->
                    <dd><a onclick="xadmin.open('个人信息','<?php echo U('user/userinfo');?>',800,600)">个人信息</a></dd>
                    <dd><a href="<?php echo U('Login/logout');?>">退出</a></dd>
                </dl>
            </li>
        </ul>

    </div>
    <!-- 顶部结束 -->


    <!-- 中部开始 -->


    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <?php if(is_array($result)): foreach($result as $key=>$parent): if($parent['pid'] != 0 && $parent['is_menu'] == 1): ?><li  class="menu_li menu_<?php echo ($parent['pid']); ?>" style="display: none;">    <!-- style='display:<?php echo ($parent["pid"]==1?"block":"none"); ?>;' -->
                            <a href="javascript:;">
                                <i class="iconfont left-nav-li layui-icon <?php echo ($parent['lay_icon']); ?>" lay-tips="<?php echo ($parent['title']); ?>"></i>
                                <cite><?php echo ($parent['title']); ?></cite>
                                <i class="iconfont nav_right">&#xe697;</i></a>
                            <ul class="sub-menu">
                                <?php if(is_array($result)): foreach($result as $key=>$child): if($child['pid'] == $parent['auth_id']): if($child['is_blank'] == 1): ?><li>
                                                <a onclick='xadmin.open("<?php echo ($child["title"]); ?>","/index.php/Admin/<?php echo ($child["controller"]); ?>/<?php echo ($child["action"]); ?>",800,600)'>
                                                    <i class="iconfont">&#xe6a7;</i>
                                                    <cite><?php echo ($child["title"]); ?></cite></a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a onclick='xadmin.add_tab("<?php echo ($child["title"]); ?>","/index.php/Admin/<?php echo ($child["controller"]); ?>/<?php echo ($child["action"]); ?>?<?php echo ($child["parm"]); ?>")'>
                                                    <i class="iconfont">&#xe6a7;</i>
                                                    <cite><?php echo ($child["title"]); ?></cite></a>
                                            </li><?php endif; endif; endforeach; endif; ?>
                            </ul>
                        </li><?php endif; endforeach; endif; ?>

                <!--li id="menu_1" class="menu_li menu_1 " style="display:block">
                    <a href="javascript:;" class="active">
                        <i class="iconfont left-nav-li" lay-tips="系统首页"></i>
                        <cite>系统首页</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                </li-->

                <!-- <li id="menu_2" class="menu_li menu_2 " style="display:block">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="用户管理"></i>
                        <cite>用户管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('用户列表','/index.php/Admin/User/user_list')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>用户列表</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.open('添加用户','/index.php/Admin/User/add',600,500)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加用户</cite></a>
                        </li>
                    </ul>
                </li>


                <li  class="menu_li menu_2"  style="display:block">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="角色管理"></i>
                        <cite>角色管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('角色列表','/index.php/Admin/Role/role_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>角色列表</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.open('添加角色','/index.php/Admin/Role/add',600,400)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加角色</cite></a>
                        </li>
                    </ul>
                </li>


                <li  class="menu_li menu_2"  style="display:block">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="部门管理"></i>
                        <cite>部门管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('部门列表','/index.php/Admin/Dept/dept_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>部门列表</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.open('添加部门','/index.php/Admin/Dept/add',600,400)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加部门</cite></a>
                        </li>
                    </ul>
                </li>

                <li class="menu_li menu_2"  style="display:block">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="职位管理"></i>
                        <cite>职位管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('职位列表','/index.php/Admin/Position/position_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>职位列表</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.open('添加职位','/index.php/Admin/Position/add',600,400)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加职位</cite></a>
                        </li>
                    </ul>
                </li>


                <li class="menu_li menu_2"  style="display:block">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="知识管理"></i>
                        <cite>知识管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('知识分类','/index.php/Admin/Knowledge/type_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>知识分类</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.open('添加分类','/index.php/Admin/Knowledge/add_type',600,400)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加分类</cite></a>
                        </li>
                         <li>
                            <a onclick="xadmin.add_tab('知识列表','/index.php/Admin/Knowledge/knowledge_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>知识列表</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.open('添加知识','/index.php/Admin/Knowledge/add_knowledge',800,600)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加知识</cite></a>
                        </li>

                    </ul>
                </li>  


                <li id="menu_3" class="menu_li menu_3">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="服务管理"></i>
                        <cite>服务管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">  
                        <li>
                            <a onclick="xadmin.add_tab('服务列表','/index.php/Admin/Service/service_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>服务列表</cite></a>
                        </li>
                        <li>
                             <a onclick="xadmin.open('新增服务','/index.php/Admin/Service/add_service',600,400)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>新增服务</cite></a>
                        </li>
                    </ul>
                </li>


                <li id="menu_4" class="menu_li menu_4">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="订单管理" id="aaaa"></i>
                        <cite>订单管理</cite>
                        </a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('订单列表','/index.php/Admin/Order/order_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>订单列表</cite></a>
                        </li>

                           <li>
                            <a onclick="xadmin.add_tab('订单列表','/index.php/Admin/Order/create_order')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>订单列表</cite></a>
                        </li>
                    </ul>
                </li>

                <li id="menu_5" class="menu_li menu_5">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="项目管理" id="bbb"></i>
                        <cite>项目管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('我的项目','cate.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>我的项目</cite></a>
                        </li>

                        <li>
                            <a onclick="xadmin.add_tab('所有项目','/index.php/Admin/Project/project_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>所有项目</cite></a>
                        </li>

                    </ul>
                </li>

                <li id="menu_6" class="menu_li menu_6">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="任务管理" id="bbb"></i>
                        <cite>任务管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('我的任务','cate.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>我的任务</cite></a>
                        </li>

                         <li>
                            <a onclick="xadmin.add_tab('所有任务','/index.php/Admin/Task/task_list')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>所有任务</cite></a>
                        </li>
                    </ul>
                </li>

                <li id="menu_7" class="menu_li menu_7">
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="系统统计"></i>
                        <cite>统计报表</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('拆线图','echarts1.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>拆线图</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('拆线图','echarts2.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>拆线图</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('地图','echarts3.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>地图</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('饼图','echarts4.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>饼图</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('雷达图','echarts5.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>雷达图</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('k线图','echarts6.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>k线图</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('热力图','echarts7.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>热力图</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('仪表图','echarts8.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>仪表图</cite></a>
                        </li>
                    </ul>
                </li> -->
                
            </ul>
        </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->

    <!-- 右侧主体开始 -->
    <div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li class="home layui-this">
                <i class="layui-icon">&#xe68e;</i>系统首页
            </li>
        </ul>
        <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
            <dl>
                <dd data-type="this">关闭当前</dd>
                <dd data-type="other">关闭其它</dd>
                <dd data-type="all">关闭全部</dd>
            </dl>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='<?php echo U("Index/welcome");?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
        <div id="tab_show"></div>
    </div>
    </div>  
    <div class="page-content-bg"></div>
    <style id="theme_style"></style>
    <!-- 右侧主体结束 -->

    
    <!-- 中部结束 -->
    <script type="text/javascript">
        layui.use(['form', 'layer', 'element'],function() {
            $ = layui.jquery;
            var form = layui.form,
            layer = layui.layer,
            element = layui.element;

            $(".to-index").click(function(){
                $(".menu_li").hide();
                var menu_index = $(this).attr("menu");
                $("."+menu_index).show();
                $("."+menu_index).eq(0).click();
                if(!$("#"+menu_index).find("a").first().hasClass("active") ){
                    $("#"+menu_index).click();
                }
                if(menu_index == "menu_1"){   
                    $(".layui-tab-title").find("li").removeClass("layui-this");
                    //$(".layui-tab-title").find("li.home").click();
                    //$("#"+menu_index).find("a").first().click();   
                }else{
                    //$("#"+menu_index).find(".sub-menu").find("li").first().find("a").click();   
                }
            });


            // has地址页面
            var parn = window.location.href.split("#")[1];
            $('.auth_id_'+parn).addClass('layui-this')
            $(".menu_li").hide();
            $(".menu_li.menu_"+parn).show();
            if(parn == undefined){
                $('.auth_id_1').addClass('layui-this')
                $(".menu_li.menu_1").show();
                $(".menu_li.menu_1").eq(0).click();
            }

            // console.log(parn);

        });
    </script>

</html>