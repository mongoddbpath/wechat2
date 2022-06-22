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
                                  <label class="layui-form-label">用户名</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="username" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">姓名</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="real_name" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">是否审核</label>
                                  <div class="layui-input-inline">
                                    <select name="status" lay-verify="">
                                      <option value="">全部</option>
                                      <option value="1">正常</option>
                                      <option value="0">待审核</option>
                                      <option value="2">冻结</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="layui-form-item">
                                <div class="layui-inline">
                                  <label class="layui-form-label">手机</label>
                                  <div class="layui-input-inline">
                                    <input type="text" name="mobile" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                                <div class="layui-inline">
                                  <label class="layui-form-label">角色</label>
                                  <div class="layui-input-inline">
                                    <select name="role" lay-verify="">
                                      <option value="">全部</option>
                                      <?php if(is_array($role)): foreach($role as $key=>$item): ?><option value="<?php echo ($item['role_id']); ?>"><?php echo ($item['role_name']); ?></option><?php endforeach; endif; ?>
                                    </select>
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
                        </div>

                        <script type="text/html" id="toolbarHead">
                          <div class="layui-btn-container">
                            <?php if($user_auth['User']['delete']){ ?> 
                              <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <?php } ?>
                            <?php if($user_auth['User']['edit']){ ?> 
                              <button class="layui-btn layui-bg-blue" onclick="set_role()"><i class="layui-icon layui-icon-set"></i>设置角色</button>
                              <button class="layui-btn layui-bg-blue" onclick="set_item()"><i class="layui-icon layui-icon-set"></i>设置项目</button>
                            <?php } ?>
                          </div>
                        </script>

                        <table class="layui-hide" id="currentTableId" lay-filter="currentTableFilter"></table>

                        <script type="text/html" id="currentTableBar">
                            <?php if($user_auth['User']['edit']){ ?>
                              <a class="layui-btn layui-btn-xs data-count-edit" onclick="xadmin.open('编辑','<?php echo U('User/edit');?>?user_id={{d.user_id}}',800,600)" href="javascript:;">编辑</a>
                            <?php } ?>
                            <?php if($user_auth['User']['delete']){ ?> 
                              <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete" onclick="member_del(this,'{{d.user_id}}')" lay-event="delete">删除</a>
                            <?php } ?>
                        </script>

                        <script type="text/html" id="itemTpl">
                          {{# layui.each(d.item, function(index, item){ }}
                            <span class="tpl_span">{{item.item_name}}</span>
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
            url: '<?php echo U("User/user_list");?>',
            toolbar: '#toolbarHead',
            method: 'post',
            cols: [[
                {type: "checkbox", fixed: "left" , title: '全选'},
                {field: 'username', title: '用户名'},
                {field: 'real_name', title: '姓名'},
                {field: 'mobile', title: '手机'},
                {field: 'item', title: '工程项目', templet: '#itemTpl'},  
                {field: 'role', title: '角色', templet: '#roleTpl'},
                {field: 'status', title: '状态'},
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
          var url = '<?php echo U("User/delete");?>';
          var checkStatus = table.checkStatus('currentTableId'), 
              data = checkStatus.data;
          if(data.length < 1){
            layer.msg('请至少选择一条数据',{icon:3,time:1000});
            return;
          }
          
          //禁用集合
          var ids = new Array();
          $.each(data, function(index,val) {
            ids.push(val.user_id);
          });
    
          layer.confirm('确认要删除吗？',function(index){
              var id = ids.toString();
              $.post(url,{'user_id':id},function(rs){
                if(rs.status == 1){
                  layer.msg(rs.msg,{icon:1,time:1000});
                }else{
                  layer.msg(rs.msg,{icon:2,time:1000});
                }
                table.reload("currentTableId",{});
              },'json');
          });
        }

        window.set_role = function(){

          var checkStatus = table.checkStatus('currentTableId'), 
              data = checkStatus.data;
          if(data.length < 1){
            layer.msg('请至少选择一条数据',{icon:3,time:1000});
            return;
          }
          var user_str = '';
          $.each(data,function(index,value){
            if(value.user_id != undefined){
              user_str += value.user_id + ',';
            }
          });
          window.localStorage.check_user = user_str;
          xadmin.open('设置角色',"<?php echo U('User/set_role');?>?",600,400);
        }


        window.set_item = function(){
          var checkStatus = table.checkStatus('currentTableId'), 
              data = checkStatus.data;
          if(data.length < 1){
            layer.msg('请至少选择一条数据',{icon:3,time:1000});
            return;
          }
          var user_str = '';
          $.each(data,function(index,value){
            if(value.user_id != undefined){
              user_str += value.user_id + ',';
            }
          });
          window.localStorage.check_user = user_str;
          xadmin.open('设置项目',"<?php echo U('User/set_item');?>?",600,400);
        }
      });

      /*用户-删除*/
      function member_del(obj,user_id){
          layer.confirm('确认要删除吗？',function(index){
            var url = '<?php echo U("User/delete");?>';
              $.post(url,{'user_id':user_id},function(rs){
                  debugger ;
                  if(rs.status == 1){
                    $(obj).parents("tr").remove();
                    layer.msg(rs.msg,{icon:1,time:1000});
                  }else{
                    layer.msg(rs.msg,{icon:1,time:1000});
                  }
              });
          });
      }

    </script>

</html>