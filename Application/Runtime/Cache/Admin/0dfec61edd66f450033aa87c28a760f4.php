<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>人员信息采集系</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Public/css/font.css">
    <link rel="stylesheet" href="/Public/css/login.css">
	  <link rel="stylesheet" href="/Public/css/xadmin.css">
    <script type="text/javascript" src="/Public/js/jquery.min.js"></script>
    <script src="/Public/lib/layui/layui.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="/Public/js/html5.min.js"></script>
      <script src="/Public/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">人员信息采集系统</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" >
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form;
              // layer.msg('玩命卖萌中', function(){
              //   //关闭后的操作
              //   });
              //监听提交
              form.on('submit(login)', function(data){
                var url = "<?php echo U('Login/doLogin');?>";
                $.post(url,data.field,function(rs){
                  if(rs.status==1){
                    location.href='/index.php/Admin'
                  }else{
                    layer.msg(rs.msg); 
                  }
                },"json");
                return false;
              });
            });
        })
    </script>
    <!-- 底部结束 -->
</body>
</html>