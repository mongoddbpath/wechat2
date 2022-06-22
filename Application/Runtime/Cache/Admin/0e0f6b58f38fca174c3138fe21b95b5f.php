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
              <span class="x-red">*</span>姓名
            </label>
            <div class="layui-input-inline">
              <input
                disabled
                type="text"
                id="username"
                name="username"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["username"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="item_name" class="layui-form-label">
              <span class="x-red">*</span>工程项目
            </label>
            <div class="layui-input-inline">
              <input
                disabled
                type="text"
                id="item_name"
                name="item_name"
                autocomplete="off"
                value="<?php echo ($row[0]["item_name"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="bank" class="layui-form-label">
              <span class="x-red">*</span>开户银行
            </label>
            <div class="layui-input-inline" style="width: 300px">
              <select id="bank" name="bank" lay-verify="" lay-search>
                <?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["attr_name"]); ?>" <?php if(($vo["attr_name"]) == $row[0]['bank']): ?>selected<?php endif; ?>  ><?php echo ($vo["attr_name"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label for="bankcard" class="layui-form-label">
              <span class="x-red">*</span>银行卡账号
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="bankcard"
                name="bankcard"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["bankcard"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="area" class="layui-form-label">
              <span class="x-red">*</span>开户行省份
            </label>
            <div class="layui-input-inline" style="width: 300px">
              <select
                id="area"
                name="area"
                lay-verify=""
                lay-search
              >
              <?php if(is_array($item2)): $i = 0; $__LIST__ = $item2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["region_name"]); ?>" <?php if(($vo["region_name"]) == $row[0]['area']): ?>selected<?php endif; ?>  ><?php echo ($vo["region_name"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </div>
          </div>

          <div class="layui-form-2" style="display: none;">
            <label for="id" class="layui-form-label"> id </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="id"
                name="id"
                autocomplete="off"
                value="<?php echo ($row[0]["id"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item" style="display: none;">
            <label for="uid" class="layui-form-label"> uid </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="uid"
                name="uid"
                autocomplete="off"
                value="<?php echo ($row[0]["uid"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"> </label>
            <button class="layui-btn" lay-filter="edit" lay-submit="">
              编辑
            </button>
          </div>
        </form>
      </div>
    </div>
    <script src="/Public/js/jquery.min.js"></script>
    <!-- 新增 -->
    <script>
      layui.use('laydate', function () {
        //执行一个laydate实例
        layui.laydate.render({
          elem: '#birthday', //指定元素
        })
      })
    </script>
    <script>
      layui.use('laydate', function () {
        //执行一个laydate实例
        layui.laydate.render({
          elem: '#work_date', //指定元素
        })
      })
    </script>
    <script>
      layui.use('laydate', function () {
        //执行一个laydate实例
        layui.laydate.render({
          elem: '#freedate', //指定元素
        })
      })
    </script>
    <script>
      layui.use('laydate', function () {
        //执行一个laydate实例
        layui.laydate.render({
          elem: '#entrydate', //指定元素
        })
      })
    </script>
    <script>
      layui.use('laydate', function () {
        //执行一个laydate实例
        layui.laydate.render({
          elem: '#leavedate', //指定元素
        })
      })
    </script>
    <script>
      //配置插件目录
      layui.config({
        base: '/Public/mods/',
        version: '1.0',
      })
      //一般直接写在一个js文件中
      layui.use(['layarea'], function () {
        var layarea = layui.layarea

        layarea.render({
          elem: '#hjarea-picker',
          change: function (res) {
            //选择结果
            console.log(res)
          },
        })
      })
    </script>
    <script>
      //配置插件目录
      layui.config({
        base: '/Public/mods/',
        version: '1.0',
      })
      //一般直接写在一个js文件中
      layui.use(['layarea'], function () {
        var layarea = layui.layarea

        layarea.render({
          elem: '#czarea-picker',
          change: function (res) {
            //选择结果
            console.log(res)
          },
        })
      })
    </script>
    <script>
      //配置插件目录
      layui.config({
        base: '/Public/mods/',
        version: '1.0',
      })
      //一般直接写在一个js文件中
      layui.use(['layarea'], function () {
        var layarea = layui.layarea

        layarea.render({
          elem: '#lxarea-picker',
          change: function (res) {
            //选择结果
            console.log(res)
          },
        })
      })
    </script>
    <!-- 测试 -->
<script>
  layui.use(['form', 'layer'], function () {
    $ = layui.jquery
    var form = layui.form,
    layer = layui.layer

    //监听提交
    form.on('submit(edit)', function (data) {
      // debugger;
      var url = "<?php echo U('First/bankcardsave');?>"
            $.post(url,data.field,function (res) {
          if (res.status == 1) {
            layer.alert(res.msg,{icon: 6,},function () {
                //关闭当前frame
                xadmin.close()
                // 可以对父窗口进行刷新
                xadmin.father_reload()
              })
            } else {layer.msg(res.msg)}},'json')
      return false

      console.log(data)
      //发异步，把数据提交给php
      layer.alert(
        '编辑成功',
        {
          icon: 6,
        },
        function () {
          //关闭当前frame
          xadmin.close()
          // 可以对父窗口进行刷新
          xadmin.father_reload()
        }
      )
      return false
    })
  })
</script>
  </body>

</html>