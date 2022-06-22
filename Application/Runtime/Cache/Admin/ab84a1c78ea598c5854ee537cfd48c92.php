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
                      <label for="role_name" class="layui-form-label">
                          <span class="x-red">*</span>角色名称
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="role_name"  lay-verify="role_name"
                          autocomplete="off" class="layui-input" value="<?php echo ($row["role_name"]); ?>">
                      </div>
                  </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">权限</label>
                        <div class="layui-input-block">
                            <div id="auth_tree"></div>
                        </div>
                    </div>
                  <div class="layui-form-item">
                      <label class="layui-form-label"><span class="x-red">*</span>状态</label>
                      <div class="layui-input-block">
                         <input type="radio" name="status" value="1" title="正常" checked >
                         <input type="radio" name="status" value="0" title="停用" <?php if(($row["status"]) == "0"): ?>checked<?php endif; ?>    >
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
        layui.use(['form', 'layer','tree'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer,
                tree = layui.tree;

                //开启遮罩
                var loading = layer.load(2,{shade: [0.1, '#393D49']});
                //获取系统菜单权限
                $.ajax({
                    url: "<?php echo U('Role/getSystemAuth');?>",
                    type: 'POST',
                    dataType: 'json',
                    success:function(res){
                        //渲染
                        var inst1 = tree.render({
                            elem: '#auth_tree'    //绑定元素
                            ,data: res.data.allAuto
                            ,showCheckbox:true
                            ,id: 'treeAuth' //定义索引
                            ,none: '无数据' //数据为空时的提示文本
                        });
                        
                        //关闭遮罩
                        layer.close(loading);
                    },
                    error:function(){
                        //提示
                        layer.msg('服务器错误',{icon:2,shadeClose:true,shade:[0.3, '#393D49']});
                    }
                });


                //自定义验证规则
                form.verify({
                    role_name:function(value){
                      if(value.length < 1){
                        return '角色名不能为空';
                      }
                    }
                });

                //监听提交
                form.on('submit(add)',
                function(data) {

                    //获得选中的节点
                    var checkData = tree.getChecked('treeAuth');
                    data.field.id_str = getCheckedId(checkData);

                    var url = "<?php echo U('Role/add');?>";
                    $.post(url,data.field,function(rs){
                      if(rs.status==1){
                          //发异步，把数据提交给php
                          layer.alert(rs.msg, {
                              icon: 6
                          },
                          function() {
                              //关闭当前frame
                              xadmin.close();
                              xadmin.father_reload();
                          });
                      }else{
                        layer.msg(rs.msg); 
                      }
                    },"json");
                    return false;
                });

                //递归子节点
                function getCheckedId(jsonObj) {
                    var id = "";
                    $.each(jsonObj, function (index, item) {
                        if (id != "") {
                            id = id + "," + item.id;
                        }
                        else {
                            id = item.id;
                        }
                        var i = getCheckedId(item.children);
                        if (i != "") {
                            id = id + "," + i;
                        }
                    });
                    return id;
                }

            });
      </script>
    </body>

</html>