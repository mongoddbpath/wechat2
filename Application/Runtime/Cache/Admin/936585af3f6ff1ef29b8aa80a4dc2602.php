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
        <style>
            .user_box{
                width: 100%;
                padding-left:10%;
            }
            .user_box .user_item{
                display: inline-block;
                width: 20%;
                margin: 10px;
                text-align: left;
                overflow: hidden;
            }
        </style>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    
                    <fieldset class="layui-elem-field layui-field-title" style="background-color:#fff">
                        <legend>操作用户</legend>
                        <div class="layui-field-box">
                            <div class="user_box"></div>
                        </div>
                    </fieldset>

                    <div class="layui-form-item">
                        <label class="layui-form-label">角色</label>
                        <div class="layui-input-block">
                            <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?><input type="checkbox" value="<?php echo ($role["role_id"]); ?>" name="role[]" lay-skin="primary" title="<?php echo ($role["role_name"]); ?>" <?php echo ($role["checked"]); ?>><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">部门</label>
                        <div class="layui-input-block">
                            <?php if(is_array($dept)): $i = 0; $__LIST__ = $dept;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dept): $mod = ($i % 2 );++$i;?><input type="checkbox" value="<?php echo ($dept["dept_id"]); ?>" name="dept[]" lay-skin="primary" title="<?php echo ($dept["dept_name"]); ?>"  <?php echo ($dept["checked"]); ?> > 
                                <br><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                 
                    <div class="layui-form-item">
                        <label class="layui-form-label">职位</label>
                        <div class="layui-input-block">
                            <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$position): $mod = ($i % 2 );++$i;?><input type="checkbox" value="<?php echo ($position["position_id"]); ?>" name="position[]" lay-skin="primary" title="<?php echo ($position["name"]); ?>" <?php echo ($position["checked"]); ?> /> 
                                <br><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="edit" lay-submit="">
                          保存设置
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

                var check_user = window.localStorage.check_user;
                $.ajax({
                    url: "<?php echo U('User/getUserName');?>",
                    type: 'POST',
                    dataType: 'json',
                    data: {'check_user':check_user},
                    success:function(res){
                        $.each(res.data,function(index,val){
                            if(val.username == ''){
                                $('.user_box').append(`
                                    <div class="user_item" data-userid = '${val.user_id}'>${val.user_id}</div>
                                `);
                            }else{
                                $('.user_box').append(`
                                    <div class="user_item" data-userid = '${val.user_id}'>${val.username}</div>
                                `);
                            }
                        });
                    }
                });
        
                //监听提交
                form.on('submit(edit)',
                function(data) {
                    // debugger;
                    var url = "<?php echo U('User/all_set');?>";
                    data.field.check_user = check_user;
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