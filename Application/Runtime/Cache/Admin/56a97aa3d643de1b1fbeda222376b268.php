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
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                      
                        <div class="layui-card-body layui-table-body layui-table-main">

                          <fieldset class="layui-elem-field">
                            <legend>搜索</legend>
                            <form class="layui-form layui-col-space5">
                              <div class="layui-form-item">
                                <div class="layui-inline">
                                  <label class="layui-form-label">名称</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="mod_name" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline"  style="width: 120px;text-align: center;">
                                  <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="data-search-btn"><i class="layui-icon">&#xe615;</i>搜索</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </fieldset>

                          <script type="text/html" id="toolbarHead">
                            <div class="layui-btn-container">
                              <?php if($user_auth['Item']['delete']){ ?> 
                                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                              <?php } ?>
                            </div>
                          </script>

                          <table class="layui-hide" id="currentTableId" lay-filter="currentTableFilter"></table>

                          <script type="text/html" id="currentTableBar">
                            <?php if($user_auth['Item']['edit']){ ?>
                              <a class="layui-btn layui-btn-xs data-count-edit" onclick="xadmin.open('编辑工程项目','<?php echo U('Mod/edit');?>?mod_id={{d.mod_id}}',800,600)" href="javascript:;">编辑</a>
                            <?php } ?>
                            <?php if($user_auth['Item']['delete']){ ?> 
                              <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete" onclick="item_del(this,'{{d.mod_id}}')" lay-event="delete">删除</a>
                            <?php } ?>
                          </script>

                        
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      layui.use(['laydate','form','table'], function(){
        var laydate = layui.laydate,
            table = layui.table,
            form = layui.form;

        //数据表格
        table.render({
            elem: '#currentTableId',
            url: '<?php echo U("Mod/mod_list");?>',
            toolbar: '#toolbarHead',
            method: 'post',
            cols: [[
                {type: "checkbox", fixed: "left" , title: '全选'},
                {field: 'mod_id', title: '基础模块ID'},
                {field: 'mod_name', title: '基础模块名称'},
                {title: '操作', toolbar: '#currentTableBar', fixed: "right", align: "center"}
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
          var url = '<?php echo U("Mod/delete");?>';
          var checkStatus = table.checkStatus('currentTableId'), 
              data = checkStatus.data;
          if(data.length < 1){
            layer.msg('请至少选择一条数据',{icon:3,time:1000});
            return;
          }
          //禁用集合
          var ids = new Array();
          $.each(data, function(index,val) {
            ids.push(val.mod_id);
          });
    
          layer.confirm('确认要删除吗？',function(index){
              var id = ids.toString();
              $.post(url,{'mod_id':id},function(rs){
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

      /*部门-删除*/
      function item_del(obj,id){
          var url = '<?php echo U("Mod/delete");?>';
          layer.confirm('确认要删除吗？',function(index){
            $.post(url,{'mod_id':id},function(rs){
                if(rs.status == 1){
                  $(obj).parents("tr").remove();
                  layer.msg(rs.msg,{icon:1,time:1000});
                }else{
                  layer.msg(rs.msg,{icon:1,time:1000});
                }
            },'json');
              //发异步删除数据
              //$(obj).parents("tr").remove();
              //layer.msg('已删除!',{icon:1,time:1000});
          });
      }

    </script>

</html>