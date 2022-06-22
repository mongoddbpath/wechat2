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
                      <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>用户帐号
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username"  lay-verify="username"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>

                    <div class="layui-form-item">
                        <label for="real_name" class="layui-form-label">
                            真实姓名
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="real_name" name="real_name"  lay-verify="real_name"
                            autocomplete="off" value="<?php echo ($row["real_name"]); ?>" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="mobile" class="layui-form-label">
                            手机号码
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="mobile" name="mobile"  lay-verify="mobile"
                            autocomplete="off" value="<?php echo ($row["mobile"]); ?>" class="layui-input">
                        </div>
                    </div>

                  <div class="layui-form-item">
                      <label for="password" class="layui-form-label">
                          <span class="x-red">*</span>密码
                      </label>
                      <div class="layui-input-inline">
                          <input type="password" id="password" name="password"  lay-verify="password"
                          autocomplete="off" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          6到16个字符
                      </div>
                  </div>

                  <div class="layui-form-item">
                      <label for="cpassword" class="layui-form-label">
                          <span class="x-red">*</span>确认密码
                      </label>
                      <div class="layui-input-inline">
                          <input type="password" id="cpassword" name="cpassword" lay-verify="cpassword"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>


                  <div class="layui-form-item">
                      <label class="layui-form-label"><span class="x-red">*</span>状态</label>
                      <div class="layui-input-block">
                         <input type="radio" name="status" value="1" title="正常" checked >
                         <input type="radio" name="status" value="0" title="待审核" <?php if(($row["status"]) == "0"): ?>checked<?php endif; ?>    >
                         <input type="radio" name="status" value="2" title="冻结" <?php if(($row["status"]) == "2"): ?>checked<?php endif; ?>    >
                      </div>
                  </div>
   
          
                
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
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                form.verify({
                    username:function(value){
                      if(value.length < 1){
                        return '用户帐号不能为空';
                      }
                    },
                    password: [/(.+){6,12}$/, '密码必须6到12位'],
                    cpassword: function(value) {
                        if ($('#password').val() != $('#cpassword').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    //debugger;
                    var url = "<?php echo U('User/save');?>";
                    $.post(url,data.field,function(rs){

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

                    console.log(data);
                    //发异步，把数据提交给php
                    layer.alert("增加成功", {
                        icon: 6
                    },
                    function() {
                        //关闭当前frame
                        xadmin.close();
                        // 可以对父窗口进行刷新 
                        xadmin.father_reload();
                    });
                    return false;
                });

            });
      </script>
    </body>

</html>