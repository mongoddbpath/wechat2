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
            <label for="freedate" class="layui-form-label"> 离职日期 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="freedate"
                name="freedate"
                autocomplete="off"
                value="<?php echo ($row[0]["freedate"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="is_disabled" class="layui-form-label"> 是否残疾 </label>
            <div class="layui-input-inline">
              <input
                type="radio"
                name="is_disabled"
                value="否"
                title="否"
                <?php if($row[0]['is_disabled']=='否'){ ?> 
                checked
                <?php } ?>
              />
              <input type="radio" name="is_disabled" value="是" title="是"
              <?php if($row[0]['is_disabled']=='是'){ ?>
              checked
              <?php } ?>
              >
            </div>
          </div>

          <div class="layui-form-item">
            <label for="is_ls" class="layui-form-label"> 是否烈属 </label>
            <div class="layui-input-inline">
              <input
                type="radio"
                name="is_ls"
                value="否"
                title="否"
                <?php if($row[0]['is_ls']=='否'){ ?> 
                checked
                <?php } ?>
              />
              <input type="radio" name="is_ls" value="是" title="是"
              <?php if($row[0]['is_ls']=='是'){ ?>
              checked
              <?php } ?>
              >
            </div>
          </div>

          <div class="layui-form-item">
            <label for="is_alone" class="layui-form-label"> 是否孤老 </label>
            <div class="layui-input-inline">
              <input
                type="radio"
                name="is_alone"
                value="否"
                title="否"
                <?php if($row[0]['is_alone']=='否'){ ?> 
                checked
                <?php } ?>
              />
              <input type="radio" name="is_alone" value="是" title="是"
              <?php if($row[0]['is_alone']=='是'){ ?>
              checked
              <?php } ?>
              >
            </div>
          </div>

          <div class="layui-form-item">
            <label for="disablednum" class="layui-form-label"> 残疾证号 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="disablednum"
                name="disablednum"
                autocomplete="off"
                value="<?php echo ($row[0]["disablednum"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="lsnum" class="layui-form-label"> 烈属证号 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="lsnum"
                name="lsnum"
                autocomplete="off"
                value="<?php echo ($row[0]["lsnum"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="is_deduct" class="layui-form-label">
              是否扣除减除费用
            </label>
            <div class="layui-input-inline">
              <input
                type="radio"
                name="is_deduct"
                value="否"
                title="否"
                <?php if($row[0]['is_deduct']=='否'){ ?> 
                checked
                <?php } ?>
              />
              <input type="radio" name="is_deduct" value="是" title="是"
              <?php if($row[0]['is_deduct']=='是'){ ?>
              checked
              <?php } ?>
              >
            </div>
          </div>

          <div class="layui-form-item">
            <label for="investment" class="layui-form-label">
              个人投资额
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="investment"
                name="investment"
                autocomplete="off"
                value="<?php echo ($row[0]["investment"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="proportion" class="layui-form-label">
              个人投资比例(%)
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="proportion"
                name="proportion"
                autocomplete="off"
                value="<?php echo ($row[0]["proportion"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="cname" class="layui-form-label"> 中文名 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="cname"
                name="cname"
                autocomplete="off"
                value="<?php echo ($row[0]["cname"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="matter" class="layui-form-label"> 涉税事由 </label>
            <div class="layui-input-inline" style="width: 300px">
              <select name="matter" lay-search>
                <option value="任职受雇"
                <?php if($row[0]['matter']=='任职受雇'){ ?> 
                  selected
                  <?php } ?>
                >任职受雇</option>
                <option value="提供临时劳务"
                <?php if($row[0]['matter']=='提供临时劳务'){ ?> 
                  selected
                <?php } ?>
                >提供临时劳务</option>
                <option value="转让财产"
                <?php if($row[0]['matter']=='转让财产'){ ?>
                  selected
                  <?php } ?>>转让财产</option>
                <option value="从事投资和经营活动"
                <?php if($row[0]['matter']=='从事投资和经营活动'){ ?> 
                  selected
                  <?php } ?>>从事投资和经营活动</option>
                <option value="其他"
                <?php if($row[0]['matter']=='其他'){ ?> 
                  selected
                  <?php } ?>>其他</option>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label for="country2" class="layui-form-label">
              出生国家(地区)
            </label>
            <div class="layui-input-inline" style="width: 300px">
              <select
                id="country2"
                name="country2"
                lay-verify=""
                lay-search
                style="width: 300px"
              >
              <?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["attr_name"]); ?>" <?php if(($vo["attr_name"]) == $row[0]['country2']): ?>selected<?php endif; ?>  ><?php echo ($vo["attr_name"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label for="entrydate" class="layui-form-label">
              首次入境时间
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="entrydate"
                name="entrydate"
                autocomplete="off"
                value="<?php echo ($row[0]["entrydate"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="leavedate" class="layui-form-label">
              预计离境时间
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="leavedate"
                name="leavedate"
                autocomplete="off"
                value="<?php echo ($row[0]["leavedate"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="other_type" class="layui-form-label">
              其他证件类型
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="other_type"
                name="other_type"
                autocomplete="off"
                value="<?php echo ($row[0]["other_type"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="other_type_name" class="layui-form-label">
              其他证件号码
            </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="other_type_name"
                name="other_type_name"
                autocomplete="off"
                value="<?php echo ($row[0]["other_type_name"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <!-- 户籍地址 -->
          <div class="layui-form-item" id="hjarea-picker">
            <div class="layui-form-label">户籍地址（详细地址）</div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="hjaddress1"
                class="province-selector"
                data-value="<?php echo ($row[0]["hjaddress1"]); ?>"
                lay-filter="province-1"
              >
                <option value="">请选择省</option>
              </select>
            </div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="hjaddress2"
                class="city-selector"
                data-value="<?php echo ($row[0]["hjaddress2"]); ?>"
                lay-filter="city-1"
              >
                <option value="">请选择市</option>
              </select>
            </div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="hjaddress3"
                class="county-selector"
                data-value="<?php echo ($row[0]["hjaddress3"]); ?>"
                lay-filter="county-1"
              >
                <option value="">请选择区</option>
              </select>
            </div>
          </div>
          <!-- 户籍地址 -->

          <!-- 常住地址 -->
          <div class="layui-form-item" id="czarea-picker">
            <div class="layui-form-label">常住地址（详细地址）</div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="czaddress1"
                class="province-selector"
                data-value="<?php echo ($row[0]["czaddress1"]); ?>"
                lay-filter="province-2"
              >
                <option value="">请选择省</option>
              </select>
            </div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="czaddress2"
                class="city-selector"
                data-value="<?php echo ($row[0]["czaddress2"]); ?>"
                lay-filter="city-2"
              >
                <option value="">请选择市</option>
              </select>
            </div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="czaddress3"
                class="county-selector"
                data-value="<?php echo ($row[0]["czaddress3"]); ?>"
                lay-filter="county-2"
              >
                <option value="">请选择区</option>
              </select>
            </div>
          </div>
          <!-- 常住地址 -->

          <!-- 联系地址 -->
          <div class="layui-form-item" id="lxarea-picker">
            <div class="layui-form-label">联系地址（详细地址）</div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="lxaddress1"
                class="province-selector"
                data-value="<?php echo ($row[0]["lxaddress1"]); ?>"
                lay-filter="province-3"
              >
                <option value="">请选择省</option>
              </select>
            </div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="lxaddress2"
                class="city-selector"
                data-value="<?php echo ($row[0]["lxaddress2"]); ?>"
                lay-filter="city-3"
              >
                <option value="">请选择市</option>
              </select>
            </div>
            <div class="layui-input-inline" style="width: 200px">
              <select
                name="lxaddress3"
                class="county-selector"
                data-value="<?php echo ($row[0]["lxaddress3"]); ?>"
                lay-filter="county-3"
              >
                <option value="">请选择区</option>
              </select>
            </div>
          </div>
          <!-- 联系地址 -->

          <div class="layui-form-item">
            <label for="email" class="layui-form-label"> 电子邮箱 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="email"
                name="email"
                autocomplete="off"
                value="<?php echo ($row[0]["email"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="education" class="layui-form-label"> 学历 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="education"
                name="education"
                autocomplete="off"
                value="<?php echo ($row[0]["education"]); ?>"
                class="layui-input"
                style="width: 300px"
              />
            </div>
          </div>

          <div class="layui-form-item">
            <label for="job_type2" class="layui-form-label"> 职务 </label>
            <div class="layui-input-inline" style="width: 300px">
              <select name="job_type2" lay-search>
                <option value="高层"
                <?php if($row[0]['job_type2']=='高层'){ ?> 
                  selected
                  <?php } ?>>高层</option>
                <option value="普通"
                <?php if($row[0]['job_type2']=='普通'){ ?> 
                  selected
                  <?php } ?>
                >普通</option>
              </select>
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
            <label for="note2" class="layui-form-label"> 备注 </label>
            <div class="layui-input-inline">
              <input
                type="text"
                id="note2"
                name="note2"
                autocomplete="off"
                value="<?php echo ($row[0]["note2"]); ?>"
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
      var url = "<?php echo U('First/otherinfosave');?>"
      // console.log('data.field:' + data.field.typename)
      data.field.hjaddress =
        data.field.hjaddress1 +
        '-' +
        data.field.hjaddress2 +
        '-' +
        data.field.hjaddress3
      data.field.czaddress =
        data.field.czaddress1 +
        '-' +
        data.field.czaddress2 +
        '-' +
        data.field.czaddress3
      data.field.lxaddress =
        data.field.lxaddress1 +
        '-' +
        data.field.lxaddress2 +
        '-' +
        data.field.lxaddress3
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