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
                type="text"
                id="username"
                name="username"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["username"]); ?>"
                disabled
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
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["item_name"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="item_no" class="layui-form-label">
              <span class="x-red">*</span>工程编号
            </label>
            <div class="layui-input-inline">
              <input
                disabled
                type="text"
                id="item_no"
                name="item_no"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["item_no"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="job_no" class="layui-form-label">
              <span class="x-red">*</span>工号
            </label>
            <div class="layui-input-inline">
              <input
                disabled
                type="text"
                id="job_no"
                name="job_no"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["job_no"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="allmoney" class="layui-form-label">
              <span class="x-red">*</span>本期收入
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="allmoney"
                name="allmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["allmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="getmoney" class="layui-form-label">
              <span class="x-red">*</span>本期免税收入
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="getmoney"
                name="getmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["getmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="eip" class="layui-form-label">
              <span class="x-red">*</span>基本养老保险费
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="eip"
                name="eip"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["eip"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="mip" class="layui-form-label">
              <span class="x-red">*</span>基本医疗保险费
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="mip"
                name="mip"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["mip"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="pmoney" class="layui-form-label">
              <span class="x-red">*</span>失业保险费
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="pmoney"
                name="pmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["pmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="zfmoney" class="layui-form-label">
              <span class="x-red">*</span>住房公积金
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="zfmoney"
                name="zfmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["zfmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="jzmoney" class="layui-form-label">
              <span class="x-red">*</span>累计子女教育
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="jzmoney"
                name="jzmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["jzmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="jzmoney2" class="layui-form-label">
              <span class="x-red">*</span>累计继续教育
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="jzmoney2"
                name="jzmoney2"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["jzmoney2"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="interest" class="layui-form-label">
              <span class="x-red">*</span>累计住房贷款利息
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="interest"
                name="interest"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["interest"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="homemoney" class="layui-form-label">
              <span class="x-red">*</span>累计住房租金
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="homemoney"
                name="homemoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["homemoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="oldmoney" class="layui-form-label">
              <span class="x-red">*</span>累计赡养老人
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="oldmoney"
                name="oldmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["oldmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="bmoney" class="layui-form-label">
              <span class="x-red">*</span>企业(职业)年金
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="bmoney"
                name="bmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["bmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="hmoney" class="layui-form-label">
              <span class="x-red">*</span>商业健康保险
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="hmoney"
                name="hmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["hmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="symoney" class="layui-form-label">
              <span class="x-red">*</span>税延养老保险
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="symoney"
                name="symoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["symoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="othermonry" class="layui-form-label">
              <span class="x-red">*</span>其他
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="othermonry"
                name="othermonry"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["othermonry"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="jzemoney" class="layui-form-label">
              <span class="x-red">*</span>准予扣除的捐赠额
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="jzemoney"
                name="jzemoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["jzemoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="jmsmoney" class="layui-form-label">
              <span class="x-red">*</span>减免税额
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="jmsmoney"
                name="jmsmoney"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["jmsmoney"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="note" class="layui-form-label">
              <span class="x-red">*</span>备注
            </label>
            <div class="layui-input-inline">
            <textarea id="note" name="note" class="layui-input"
            style="width: 300px;height: 128px;" class="layui-textarea"><?php echo ($row[0]["note"]); ?></textarea>
            </div>
          </div>

          <div class="layui-form-item" style="display: none;">
            <label for="id" class="layui-form-label">
              <span class="x-red">*</span>id
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="id"
                name="id"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["id"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item" style="display: none;">
            <label for="uid" class="layui-form-label">
              <span class="x-red">*</span>uid
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="uid"
                name="uid"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["uid"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item" style="display: none;">
            <label for="item_no" class="layui-form-label">
              <span class="x-red">*</span>item_no
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="item_no"
                name="item_no"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["item_no"]); ?>"
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
    <script>
      layui.use(['form', 'layer'], function () {
        $ = layui.jquery
        var form = layui.form,
          layer = layui.layer

        // //自定义验证规则
        // form.verify({
        //     username:function(value){
        //       if(value.length < 1){
        //         return '用户帐号不能为空';
        //       }
        //     },
        //     //password: [/(.+){6,12}$/, '密码必须6到12位'],
        //     cpassword: function(value) {
        //         if ($('#password').val() != $('#cpassword').val()) {
        //             return '两次密码不一致';
        //         }
        //     }
        // });

        //监听提交
        form.on('submit(edit)', function (data) {
          // debugger;
          var editurl = "<?php echo U('Salary/save');?>"
          console.dir(data.field, {
					depth: null
				});
          // console.log('data.field:' + data.field)
          $.post(
            editurl,
            data.field,
            function (rs) {
              if (rs.status == 1) {
                //发异步，把数据提交给php
                layer.alert(
                  rs.msg,
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
              } else {
                layer.msg(rs.msg)
              }
            },
            'json'
          )
          return false

          console.log(data)
          //发异步，把数据提交给php
          layer.alert(
            '增加成功',
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
      layui.use(['layer', 'form', 'layarea'], function () {
        var layer = layui.layer,
          form = layui.form,
          layarea = layui.layarea

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
      layui.use(['layer', 'form', 'layarea'], function () {
        var layer = layui.layer,
          form = layui.form,
          layarea = layui.layarea

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
      layui.use(['layer', 'form', 'layarea'], function () {
        var layer = layui.layer,
          form = layui.form,
          layarea = layui.layarea

        layarea.render({
          elem: '#lxarea-picker',
          change: function (res) {
            //选择结果
            console.log(res)
          },
        })
      })
    </script>
    <script>
      // 增加表单里部门下拉框的赋值
      $(function () {
        $.ajax({
          type: 'GET',
          url: '<?php echo U("First/bank_list");?>', //从数据库查询返回的是个list
          dataType: 'json',
          success: function (data) {
            console.dir('data')
            console.dir(data, {
              depth: null,
            })

            $.each(data, function (index, item) {
              $('#bank').append(new Option(item.attr_name, item.attr_name)) //往下拉菜单里添加元素
            })
            layui.form.render('select')
          },
          error: function () {
            alert('查询失败！')
          },
        })
      })
    </script>
    <script>
      // 增加表单里部门下拉框的赋值
      $(function () {
        $.ajax({
          type: 'GET',
          url: '<?php echo U("First/get_country");?>', //从数据库查询返回的是个list
          dataType: 'json',
          success: function (data) {
            console.dir('data')
            console.dir(data, {
              depth: null,
            })

            $.each(data, function (index, item) {
              $('#country').append(new Option(item.attr_name, item.attr_name)) //往下拉菜单里添加元素
            })
            layui.form.render('select')
          },
          error: function () {
            alert('查询失败！')
          },
        })
      })
    </script>
  </body>

</html>