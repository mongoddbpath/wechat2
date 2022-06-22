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
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">  
                  <div class="layui-form-item">
                      <label class="layui-form-label"><span class="x-red">*</span>所属模块</label>
                      <div class="layui-input-block" >
                        <select name="mod_id" lay-verify=""  lay-filter="mod_id">
                          <?php if(is_array($mod)): $i = 0; $__LIST__ = $mod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["mod_id"]); ?>"  > <?php echo ($vo["mod_name"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                      </div>
                  </div>

                  <div class="layui-form-item">
                      <input type="hidden" value="<?php echo ($row["item_id"]); ?>" name="item_id"/>
                      <label for="role_name" class="layui-form-label">
                          <span class="x-red">*</span>属性名称
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="attr_name" name="attr_name"  lay-verify="attr_name"
                          autocomplete="off" class="layui-input" value="<?php echo ($row["attr_name"]); ?>">
                      </div>
                  </div>

                  <div class="layui-form-item">
                      <label class="layui-form-label"><span class="x-red">*</span>状态</label>
                      <div class="layui-input-block">
                         <input type="radio" name="status" value="1" title="正常" checked >
                         <input type="radio" name="status" value="0" title="禁用" <?php if(($row["status"]) == "0"): ?>checked<?php endif; ?>    >
                      
                      </div>
                  </div>

                  <input type="hidden" value="save" name="action"/>
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="add" lay-submit="">
                          提交
                      </button>
                  </div>
              </form>
            </div>
        </div>
        <script>
        layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
                //自定义验证规则
                form.verify({
                    attr_name:function(value){
                      if(value.length < 1){
                        return '属性名称不能为空';
                      }
                    }
                });
                //监听提交
                form.on('submit(add)',
                function(data) {
                    var url = "<?php echo U('Mod/add_mod_attr');?>";
                    $.post(url,data.field,function(rs){
                      debugger;
                      if(rs.status==1){
                          //发异步，把数据提交给php
                          layer.alert(rs.msg, {
                              icon: 6
                          },
                          function() {
                              //关闭当前frame
                              xadmin.close();
                              // 可以对父窗口进行刷新 
                              xadmin.father_reload(); 
                          });
                      }else{
                        layer.msg(rs.msg); 
                      }
                    },"json");
                    return false;
                });
            });
      </script>
    </body>

</html>