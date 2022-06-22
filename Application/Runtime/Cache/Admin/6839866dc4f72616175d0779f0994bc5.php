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
      .tpl_span{
        display: inline-block;
        margin: 0 2px;
      }
    </style>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                          <fieldset class="layui-elem-field">
                            <legend>搜索</legend>
                            
                            <form class="layui-form layui-col-space5">

                              <div class="layui-form-item">
                                <div class="layui-inline">
                                  <label class="layui-form-label">工程编号</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="item_no" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">工号</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="job_no" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">姓名</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="username" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">证件类型</label>
                                  <div class="layui-input-inline">
                                    <select name="idstype" lay-verify="">
                                      <option value="居民身份证">居民身份证</option>
                                      <option value="中国护照">中国护照</option>
                                      <option value="港澳居民来往内地通行证">港澳居民来往内地通行证</option>
                                      <option value="中华人民共和国港澳居民居住证">中华人民共和国港澳居民居住证</option>
                                      <option value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>
                                      <option value="中华人民共和国台湾居民居住证">中华人民共和国台湾居民居住证</option>
                                      <option value="外国人永久居留身份证">外国人永久居留身份证</option>
                                      <option value="中华人民共和国外国人工作许可证（A类）">中华人民共和国外国人工作许可证（A类）</option>
                                      <option value="中华人民共和国外国人工作许可证（B类）">中华人民共和国外国人工作许可证（B类）</option>
                                      <option value="中华人民共和国外国人工作许可证（C类）">中华人民共和国外国人工作许可证（C类）</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">证件号码</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="idsnum" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">工程项目</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="item_name" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">手机号码</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="phone" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">性别</label>
                                  <div class="layui-input-inline">
                                    <input type="radio" name="sex" value="男" title="男" checked>
                                    <input type="radio" name="sex" value="女" title="女">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">人员状态</label>
                                  <div class="layui-input-inline">
                                    <input type="radio" name="status" value="正常" title="正常" checked>
                                    <input type="radio" name="status" value="非正常" title="非正常">
                                  </div>
                                </div>

                                <div class="layui-inline"  style="width: 120px;text-align: center;">
                                  <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="data-search-btn"><i class="layui-icon">&#xe615;</i>搜索</button>
                                  </div>
                                </div>
                                <div class="layui-inline"  style="width: 120px;text-align: center;">
                                  <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="data-searchok"><i class="layui-icon">&#xe615;</i>恢复搜索</button>
                                  </div>
                                  
                                </div>
                                <br/>
                                <div class="layui-inline"  style="width: 120px;text-align: center; margin-left: 40px;">
                                  <div class="layui-inline layui-show-xs-block">
                                   <button class="layui-btn"  lay-submit="" lay-filter="data-export-base-btn"><i class="layui-icon">&#xe615;</i>导出人员信息</button>
                                  </div>
                                </div>

                                 <div class="layui-inline"  style="width: 120px;text-align: center;">
                                  <div class="layui-inline layui-show-xs-block">
                                   <button class="layui-btn"  lay-submit="" lay-filter="data-export-xinzi-btn"><i class="layui-icon">&#xe615;</i>导出正常薪资</button>
                                  </div>
                                </div>


                              </div>
                            </form>
                          </fieldset>
                        </div>

                        <script type="text/html" id="toolbarHead">
                          <div class="layui-btn-container">
                              <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
      
                          </div>
                        </script>

                        <table class="layui-hide" id="currentTableId" lay-filter="currentTableFilter"></table>

                        <script type="text/html" id="currentTableBar">
                              <a class="layui-btn layui-btn-xs data-count-edit" onclick="xadmin.open('查看人员信息','<?php echo U('First/edit');?>?id={{d.id}}',800,600)" href="javascript:;">查看人员信息</a>
                              <a class="layui-btn layui-btn-xs data-count-edit" onclick="xadmin.open('查看银行卡信息','<?php echo U('First/bankcardedit');?>?id={{d.id}}',800,600)" href="javascript:;">查看银行卡信息</a>
                              <a class="layui-btn layui-btn-xs data-count-edit" onclick="xadmin.open('查看正常薪资','<?php echo U('First/salaryedit');?>?id={{d.id}}',800,600)" href="javascript:;">查看正常薪资</a>
                              <a class="layui-btn layui-btn-xs data-count-edit" onclick="xadmin.open('查看其他信息','<?php echo U('First/otherinfoedit');?>?id={{d.id}}',800,600)" href="javascript:;">查看其他信息</a>
                              <a class="layui-btn layui-btn-xs data-count-edit" onclick="xadmin.open('查看上传图片','<?php echo U('First/getimg');?>?id={{d.id}}',1000,800)" href="javascript:;">查看上传图片</a>
                              <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete" onclick="member_del(this,'{{d.id}}')" lay-event="delete">删除</a>
                        </script>

                        <script type="text/html" id="deptTpl">
                          {{# layui.each(d.dept, function(index, item){ }}
                            <span class="tpl_span">{{item.dept_name}}</span>
                          {{# }); }}
                        </script>

                        <script type="text/html" id="positionTpl">
                          {{# layui.each(d.position, function(index, item){ }}
                            <span class="tpl_span">{{item.name}}</span>
                          {{# }); }}
                        </script>

                        <script type="text/html" id="roleTpl">
                          {{# layui.each(d.role, function(index, item){ }}
                            <span class="tpl_span">{{item.role_name}}</span>
                          {{# }); }}
                        </script>

                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      layui.use(['laydate','form','table','laytpl'], function(){
        var laydate = layui.laydate;
        var  form = layui.form,
        table = layui.table,
        laytpl = layui.laytpl;
  
        //数据表格
        table.render({
            elem: '#currentTableId',
            url: '<?php echo U("First/user_list");?>',
            toolbar: '#toolbarHead',
            method: 'post',
            cols: [[
                {type: "checkbox", fixed: "left" , title: '全选'},
                {field: 'item_no', title: '工程编号'},
                {field: 'item_name', title: '工程项目'},
                {field: 'job_no', title: '工号'},
                {field: 'username', title: '姓名'},
                {field: 'idsnum', title: '证件号码'},
                {field: 'sex', title: '性别'},
                {field: 'status', title: '人员状态'},
                {field: 'phone', title: '手机号码'},
                {title: '操作', toolbar: '#currentTableBar', fixed: "right", align: "center",width:620}
            ]],
            limits: [10, 15, 20, 25, 50, 100],
            limit: 20,
            page: true,
            done: function(res, curr, count){
                //如果是异步请求数据方式，res即为你接口返回的信息。curr 当前页码 count数据总量
                //如果是直接赋值的方式，res即为：{data: [], count: 99} data为当前页数据、count为数据总长度
                console.log(res);
            }
        });

        // 监听搜索操作
        form.on('submit(data-search-btn)', function (data) {
          //执行搜索重载
          table.reload('currentTableId', {
              page: {
                  curr: 1
              }
              , where: {
                  searchParams: data.field
              }
          }, 'data');

          return false;
        });

         //导出人员操作
        form.on('submit(data-export-base-btn)', function (data) {
          var url = '<?php echo U("First/user_list");?>?action=export_base';
          window.location.href=url;
          return false;
        });

        //导出薪资操作
        form.on('submit(data-export-xinzi-btn)', function (data) {
          var url = '<?php echo U("First/user_list");?>?action=export_xinzi';
          window.location.href=url;
          return false;
        });

        


        



        // 恢复结果操作
        form.on('submit(data-searchok)', function () {
          //执行搜索重载
          window.location.href='<?php echo U("First/user_list");?>';
        });

        //显示列头tips
        var th_tips;
        $('.layui-table th').hover(function(){
            th_tips = layer.tips($(this).find('span').text(), this, {
              tips: [1, "#009688"],
              anim: -1
            });
        },function(){
            layer.close(th_tips);
        });

        // 监听全选
        form.on('checkbox(checkall)', function(data){
          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        
        //全选删除
        window.delAll = function(argument) {
          var url = '<?php echo U("First/delete");?>';
          var checkStatus = table.checkStatus('currentTableId'), 
              data = checkStatus.data;
          if(data.length < 1){
            layer.msg('请至少选择一条数据',{icon:3,time:1000});
            return;
          }
          
          //禁用集合
          var ids = new Array();
          $.each(data, function(index,val) {
            ids.push(val.id);
          });
    
          layer.confirm('确认要删除吗？',function(index){
              var id = ids.toString();
              $.post(url,{'id':id},function(rs){
                if(rs.status == 1){
                  layer.msg(rs.msg,{icon:1,time:1000});
                }else{
                  layer.msg(rs.msg,{icon:2,time:1000});
                }
                table.reload("currentTableId",{});
              },'json');
          });
        }

      });

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
            var url = '<?php echo U("First/delete");?>';
              $.post(url,{'id':id},function(rs){  
                  if(rs.status == 1){
                    $(obj).parents("tr").remove();
                    layer.msg(rs.msg,{icon:1,time:1000});
                  }else{
                    layer.msg(rs.msg,{icon:1,time:1000});
                  }
              });
          });
      }

      /*导出Excel*/
      function getexcel(){
        var url = "<?php echo U('First/getdata');?>";
         $.get(url,'',function(res){
          var getname = ['工号','姓名','证件类型','证件号码','国籍(地区)','性别','出生日期','人员状态',
        '任职受雇从业类型','入职年度就业情形',
        '手机号码','任职受雇从业日期',
        '离职日期','是否残疾','是否烈属','是否孤老','残疾证号','烈属证号',
        '是否扣除减除费用','个人投资额','个人投资比例(%)',
        '备注','中文名','涉税事由','出生国家(地区)',
        '首次入境时间','预计离境时间','其他证件类型','其他证件号码',
        '户籍所在地（省）','户籍所在地（市）','户籍所在地（区县）','户籍所在地（详细地址）',
        '经常居住地（省）','经常居住地（市）','经常居住地（区县）','经常居住地（详细地址）',
        '联系地址（省）','联系地址（市）','联系地址（区县）','联系地址（详细地址）',
        '电子邮箱','学历','开户银行','银行账号',
        '开户行省份','职务'];
          var arr = [];
          console.dir('res');
          console.dir(res, {depth:null});
          var arrok = [];
          for(var a=0;a<res.length;a++){
            arrok.push(res[a].job_no);
            arrok.push(res[a].username);
            arrok.push(res[a].idstype);
            arrok.push(res[a].idsnum);
            arrok.push(res[a].country);
            arrok.push(res[a].sex);
            arrok.push(res[a].birthday);
            arrok.push(res[a].status);
            arrok.push(res[a].work_type);
            arrok.push(res[a].job_type);
            arrok.push(res[a].phone);
            arrok.push(res[a].work_date);
            arrok.push(res[a].freedate);
            arrok.push(res[a].is_disabled);
            arrok.push(res[a].is_ls);
            arrok.push(res[a].is_alone);
            arrok.push(res[a].disablednum);
            arrok.push(res[a].lsnum);
            arrok.push(res[a].is_deduct);
            arrok.push(res[a].investment);
            arrok.push(res[a].proportion);
            arrok.push(res[a].note);
            arrok.push(res[a].cname);
            arrok.push(res[a].matter);
            arrok.push(res[a].country2);
            arrok.push(res[a].entrydate);
            arrok.push(res[a].leavedate);
            arrok.push(res[a].other_type);
            arrok.push(res[a].other_type_name);
            arrok.push(res[a].hjaddress1);
            arrok.push(res[a].hjaddress2);
            arrok.push(res[a].hjaddress3);
            arrok.push(res[a].hjaddress);
            arrok.push(res[a].czaddress1);
            arrok.push(res[a].czaddress2);
            arrok.push(res[a].czaddress3);
            arrok.push(res[a].czaddress);
            arrok.push(res[a].lxaddress1);
            arrok.push(res[a].lxaddress2);
            arrok.push(res[a].lxaddress3);
            arrok.push(res[a].lxaddress);
            arrok.push(res[a].email);
            arrok.push(res[a].education);
            arrok.push(res[a].bank);
            arrok.push(res[a].bankcard);
            arrok.push(res[a].area);
            arrok.push(res[a].job_type);
            arr.push(arrok);
            arrok = [];
          }
          layui.table.exportFile(getname,arr,'xls');
                    });
          
      }

      /*导出正常薪资Excel*/
    function getsalaryexcel() {
      var url = "<?php echo U('Salary/getdata');?>"
      $.get(url, '', function (res) {
        var getname = [
          '工号',
          '姓名',
          '证件类型',
          '证件号码',
          '本期收入',
          '本期免税收入',
          '基本养老保险费',
          '基本医疗保险费',
          '失业保险费',
          '住房公积金',
          '累计子女教育',
          '累计继续教育',
          '累计住房贷款利息',
          '累计住房租金',
          '累计赡养老人',
          '企业(职业)年金',
          '商业健康保险',
          '税延养老保险',
          '其他',
          '准予扣除的捐赠额',
          '减免税额',
          '备注',
        ]
        var arr = []
        console.dir('res')
        console.dir(res, { depth: null })
        var arrok = []
        for (var a = 0; a < res.length; a++) {
          arrok.push(res[a].job_no)
          arrok.push(res[a].username)
          arrok.push(res[a].idstype)
          arrok.push(res[a].idsnum)
          arrok.push(res[a].allmoney)
          arrok.push(res[a].getmoney)
          arrok.push(res[a].eip)
          arrok.push(res[a].mip)
          arrok.push(res[a].pmoney)
          arrok.push(res[a].zfmoney)
          arrok.push(res[a].jzmoney)
          arrok.push(res[a].jzmoney2)
          arrok.push(res[a].interest)
          arrok.push(res[a].homemoney)
          arrok.push(res[a].oldmoney)
          arrok.push(res[a].bmoney)
          arrok.push(res[a].hmoney)
          arrok.push(res[a].symoney)
          arrok.push(res[a].othermonry)
          arrok.push(res[a].jzemoney)
          arrok.push(res[a].jmsmoney)
          arrok.push(res[a].note)
          arr.push(arrok)
          arrok = []
        }
        console.dir('1')
        console.dir(getname, { depth: null })
        console.dir(arr, { depth: null })
        layui.table.exportFile(getname, arr, 'xls')
      })
    }
    </script>

</html>