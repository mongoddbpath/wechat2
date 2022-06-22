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
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Getimgs</title>
        <script src='/Public/js/jquery.min.js'></script>
        <script src="/Public/mods/zoom.js"></script>
        <style>
            body{background: #f5f5f5}
            .smallimg {width: 666px;}
            .bigimg{width:600px;position: fixed;left: 0;top: 0; right: 0;bottom: 0;margin:auto;display: none;z-index:9999;border: 10px solid #fff;}
            .mask{position: fixed;left: 0;top: 0; right: 0;bottom: 0;background-color: #000;opacity:0.5;filter: Alpha(opacity=50);z-index: 98;transition:all 1s;display: none}
            .bigbox{width:840px;background: #fff;border:1px solid #ededed;margin:0 auto;border-radius: 10px;overflow: hidden;padding:10px;}
            .bigbox>.imgbox{font-size:28px;width:400px;float: left;border-radius: 5px;overflow: hidden;margin: 0 10px 10px 10px;}
            .bigbox>.imgbox>img{width:100%; height: 250px !important;}
            .imgbox:hover{cursor:zoom-in}
            .mask:hover{cursor:zoom-out}
            .bigimg:hover{cursor: move}
            .mask>img{position: fixed;right:10px;top: 10px;width: 60px;}
            .mask>img:hover{cursor:pointer}
        </style>
        <script>
            $(function(){
                /*
                 smallimg   // 小图
                 bigimg  //点击放大的图片
                 mask   //黑色遮罩
                 */
                var obj = new zoom('mask', 'bigimg','smallimg');
                obj.init();
            })
        </script>
    </head>
    <body>
      <div class="layui-fluid">
        <div class="layui-row">
          <form class="layui-form">
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
      </form>
    </div>
  </div>
        <div class="bigbox">
            <div class="imgbox" style="width: 100%;" id="check">
              姓名：<?php echo ($row[0]["username"]); ?><br>
              工程项目：<?php echo ($row[0]["item_name"]); ?><br>
              工程编号：<?php echo ($row[0]["item_no"]); ?><br>
              在场证明图片
            </div>
            <div class="zcimgs" id="zcimgs"></div>
        </div>
        <div class="bigbox">
            <div class="imgbox" style="width: 100%;">
              身份证图片
            </div>
            <div class="zjimgs" id="zjimgs"></div>
        </div>
        <div class="bigbox">
            <div class="imgbox" style="width: 100%;">
              银行卡图片
            </div>
            <div class="bankimgs" id="bankimgs"></div>
        </div>
        <img src="" class="bigimg">
        <div class="mask">
            <img src="">
        </div>
    <script>
      function imgsurlok(imgs) {
				var imgsurlarr = imgs.split('-')
				imgsurlarr.splice(imgsurlarr.length - 1, 1)
				var getimgs = []
				for (var i = 0; i < imgsurlarr.length; i++) {
					imgsurlarr[i] = {
						url: imgsurlarr[i]
					}
				}
				return imgsurlarr
			}
      //监听提交
      (function(){
          var imgurl1 = "<?php echo U('First/getimg1');?>";
          var imgurl2 = "<?php echo U('First/getimg2');?>";
          var getid = $("#id").val();
          // console.log($("#id").val());
          $.get(imgurl1, {id:getid}, function (res) {
                var zcimg = imgsurlok(res[0].imgsurl);
                var zjimg = imgsurlok(res[0].zjimgsurl);
                for(var a=0;a<zcimg.length;a++){
                  $("#zcimgs").append("<div class=imgbox><img class=smallimg src=" + zcimg[a].url +"></div>");
                }
                for(var a=0;a<zcimg.length;a++){
                  $("#zjimgs").append("<div class=imgbox><img class=smallimg src=" + zjimg[a].url +"></div>");
                }
          })
          $.get(imgurl2, {id:getid}, function (res) {
                var bankimg = imgsurlok(res[0].imgsurl);
                for(var a1=0;a1<bankimg.length;a1++){
                  $("#bankimgs").append("<div class=imgbox><img class=smallimg src=" + bankimg[a1].url +"></div>");
                }
          })
      })();

        //监听提交
    </script>
    <!-- 新增 -->
  </body>

</html>