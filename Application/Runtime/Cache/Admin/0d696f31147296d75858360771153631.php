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
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <!-- 测试树形结构吖 -->
          <div class="layui-form-item">
            <label for="item_nameok" class="layui-form-label">
              <span class="x-red">*</span>工程项目
            </label>
            <div class="layui-input-inline">
              <div
                id="demo3"
                name="item_nameok"
                class="xm-select-demo"
                style="width: 300px"
              ></div>
            </div>
          </div>

          <!-- 测试树形结构吖 -->

          <div class="layui-form-item" style="display: none">
            <label for="item_name" class="layui-form-label">
              <span class="x-red">*</span>工程项目
            </label>
            <div class="layui-input-inline">
              <input
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

          <div class="layui-form-item" style="display: none;">
            <label for="item_no" class="layui-form-label">
              <span class="x-red">*</span>工程编号
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
            <label for="job_no" class="layui-form-label">
              <span class="x-red">*</span>工号
            </label>
            <div class="layui-input-inline">
              <input
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
            <label for="idstype" class="layui-form-label" id="idstype">
              <span class="x-red">*</span>证件类型
            </label>
            <div class="layui-input-inline" style="width: 300px">
              <select name="idstype" lay-verify="" lay-search>
                <option value="居民身份证"
                <?php if($row[0]['idstype']=='居民身份证'){ ?> 
                  selected
                <?php } ?>
                >居民身份证</option>
                <option value="中国护照"
                <?php if($row[0]['idstype']=='中国护照'){ ?> 
                  selected
                <?php } ?>>中国护照</option>
                <option value="港澳居民来往内地通行证"
                <?php if($row[0]['idstype']=='港澳居民来往内地通行证'){ ?> 
                  selected
                <?php } ?>>港澳居民来往内地通行证</option>
                <option value="中华人民共和国港澳居民居住证"
                <?php if($row[0]['idstype']=='中华人民共和国港澳居民居住证'){ ?> 
                  selected
                <?php } ?>>中华人民共和国港澳居民居住证</option>
                <option value="台湾居民来往大陆通行证"
                <?php if($row[0]['idstype']=='台湾居民来往大陆通行证'){ ?> 
                  selected
                <?php } ?>>台湾居民来往大陆通行证</option>
                <option value="中华人民共和国台湾居民居住证"
                <?php if($row[0]['idstype']=='中华人民共和国台湾居民居住证'){ ?> 
                  selected
                <?php } ?>>中华人民共和国台湾居民居住证</option>
                <option value="外国人永久居留身份证"
                <?php if($row[0]['idstype']=='外国人永久居留身份证'){ ?> 
                  selected
                <?php } ?>>外国人永久居留身份证</option>
                <option value="中华人民共和国外国人工作许可证（A类）"
                <?php if($row[0]['idstype']=='中华人民共和国外国人工作许可证（A类）'){ ?> 
                  selected
                <?php } ?>>中华人民共和国外国人工作许可证（A类）</option>
                <option value="中华人民共和国外国人工作许可证（B类）"
                <?php if($row[0]['idstype']=='中华人民共和国外国人工作许可证（B类）'){ ?> 
                  selected
                <?php } ?>>中华人民共和国外国人工作许可证（B类）</option>
                <option value="中华人民共和国外国人工作许可证（C类）"
                <?php if($row[0]['idstype']=='中华人民共和国外国人工作许可证（C类）'){ ?> 
                  selected
                <?php } ?>>中华人民共和国外国人工作许可证（C类）</option>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label for="idsnum" class="layui-form-label">
              <span class="x-red">*</span>证件号码
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="idsnum"
                name="idsnum"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["idsnum"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="phone" class="layui-form-label">
              <span class="x-red">*</span>手机号码
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="phone"
                name="phone"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["phone"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="country" class="layui-form-label">
              <span class="x-red">*</span>国籍(地区)
            </label>
            <div class="layui-input-inline" style="width: 300px">
              <select
                id="country"
                name="country"
                lay-verify=""
                lay-search
              >
              <?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["attr_name"]); ?>" <?php if(($vo["attr_name"]) == $row[0]['country']): ?>selected<?php endif; ?>  ><?php echo ($vo["attr_name"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label for="sex" class="layui-form-label">
              <span class="x-red">*</span>性别
            </label>
            <div class="layui-input-inline">
              <input
                type="radio"
                name="sex"
                value="男"
                title="男"
                <?php if($row[0]['sex']=='男'){ ?> 
                checked
                <?php } ?>
              />
              <input type="radio" name="sex" value="女" title="女"
              <?php if($row[0]['sex']=='女'){ ?>
              checked
              <?php } ?>
              >
            </div>
          </div>
          <div class="layui-form-item">
            <label for="birthday" class="layui-form-label">
              <span class="x-red">*</span>出生日期
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="birthday"
                name="birthday"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["birthday"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="status" class="layui-form-label">
              <span class="x-red">*</span>人员状态
            </label>
            <div class="layui-input-inline">
              <input
                type="radio"
                name="status"
                value="正常"
                title="正常"
                <?php if($row[0]['status']=='正常'){ ?> 
                checked
                <?php } ?>
              />
              <input type="radio" name="status" value="非正常" title="非正常"
              <?php if($row[0]['status']=='非正常'){ ?>
              checked
              <?php } ?>
              >
            </div>
          </div>

          <div class="layui-form-item">
            <label for="work_type" class="layui-form-label">
              <span class="x-red">*</span>任职受雇从业类型
            </label>
            <div class="layui-input-inline" style="width: 300px">
              <input
                type="text"
                id="work_type"
                name="work_type"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["work_type"]); ?>"
                disabled
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="job_type" class="layui-form-label">
              <span class="x-red">*</span>入职年度就业情形
            </label>
            <div class="layui-input-inline" style="width: 300px">
              <select name="job_type" lay-verify="required" lay-search>
                <option value="当年首次入职学生"
                <?php if($row[0]['job_type']=='当年首次入职学生'){ ?> 
                  selected
                  <?php } ?>
                >当年首次入职学生</option>
                <option value="当年首次入职其他人员"
                <?php if($row[0]['job_type']=='当年首次入职其他人员'){ ?> 
                  selected
                <?php } ?>
                >当年首次入职其他人员</option>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label for="work_date" class="layui-form-label">
              <span class="x-red">*</span>任职受雇从业日期
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="work_date"
                name="work_date"
                lay-verify="required"
                autocomplete="off"
                value="<?php echo ($row[0]["work_date"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="note" class="layui-form-label"> 备注 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="note"
                name="note"
                autocomplete="off"
                value="<?php echo ($row[0]["note"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item" style="display: none;">
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
    <script src="/Public/mods/xm-select.js" type="text/javascript"></script>
    <script>
      $(function () {
        $.get("<?php echo U('/Front/Item/item_list');?>", '', function (res) {
          window.demo3 = xmSelect.render({
            el: '#demo3',
            filterable: true,
            model: { label: { type: 'text' } },
            radio: true,
            clickClose: true,
            tree: {
              show: true,
              strict: false,
              expandedKeys: [-1],
            },
            height: 'auto',
            data: res.data,
          })
          demo3.setValue([
            { name: $('#item_name').val(), value: $('#item_no').val() },
          ])
        })
      })
    </script>

<script>
  layui.use(['form', 'layer'], function () {
    $ = layui.jquery
    var form = layui.form,
    layer = layui.layer

    //监听提交
    form.on('submit(edit)', function (data) {
      // debugger;
      var url = "<?php echo U('First/save');?>"
      var url2 = "<?php echo U('First/checksave');?>"
      // console.log('data.field:' + data.field.typename)
      data.field.item_no = window.demo3.getValue('valueStr');
      data.field.item_name = window.demo3.getValue('nameStr');
      window.item_nofirst = $('#item_no').val();
      console.log('data.field:')
      console.dir(data.field, {
					depth: null
				})

      if(window.item_nofirst != data.field.item_no){
      $.post(url2,data.field,function (res) {
          if (res.status == 1) {
            $.post(url,data.field,function (res) {
          if (res.status == 1) {
            layer.alert(res.msg,{icon: 6,},function () {
                //关闭当前frame
                xadmin.close()
                // 可以对父窗口进行刷新
                xadmin.father_reload()
              })
            } else {layer.msg(res.msg)}},'json')
            } else {layer.msg(res.msg)}},'json')

          }else{
            $.post(url,data.field,function (res) {
          if (res.status == 1) {
            layer.alert(res.msg,{icon: 6,},function () {
                //关闭当前frame
                xadmin.close()
                // 可以对父窗口进行刷新
                xadmin.father_reload()
              })
            } else {layer.msg(res.msg)}},'json')
          }





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