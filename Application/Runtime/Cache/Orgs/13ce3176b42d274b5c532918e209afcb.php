<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>新增活动 - 活动报名系统</title>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="/wxtest/Public/css/bootstrap.css">
    <!-- jQuery文件 -->
    <script src="/wxtest/Public/js/jquery.js"></script>
    <!-- Bootstrap javaScript 文件 -->
    <script src="/wxtest/Public/js/bootstrap.js"></script>
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/wxtest/Public/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/wxtest/Public/css/admin.css">
</head>
<body>

<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong>活动报名系统<span class="sr-only">(current)</span></strong> <small>管理后台</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="<?php echo U('./Home/Index');?>" target="_blank">网站首页</a>
                <?php if($_SESSION['name']): ?><li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> <?php echo ($_SESSION['name']); ?> <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo U('./Home/Public/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li><?php endif; ?>

        </ul>
    </div>
</header>
<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="<?php echo U('Index/Index');?>"><span class="am-icon-home"></span> 首页</a></li>
                <li><a href="<?php echo U('Active/Index');?>"><span class="am-icon-plus"></span> 活动管理</a></li>
                <li><a href="<?php echo U('Signup/Index');?>"><span class="am-icon-list"></span> 报名管理</a></li>
                <li><a href="<?php echo U('User/Index');?>"><span class="am-icon-th"></span> 个人用户管理</a></li>
                <li><a href="<?php echo U('Org/Index');?>"><span class="am-icon-anchor"></span> 组织管理</a></li>
                <li><a href="<?php echo U('Admin/Index');?>"><span class="am-icon-user"></span> 管理员管理</a></li>
                <!--<li><a href="<?php echo U('Announce/Index');?>"><span class="am-icon-arrows"></span> 公告发布</a></li>-->
                <!--<li><a href="<?php echo U('News/Index');?>"><span class="am-icon-archive"></span> 文章管理</a></li>-->
                <li><a href="<?php echo U('Message/Index');?>"><span class="am-icon-hdd-o"></span> 短信发送</a></li>
                <!--<li><a href="<?php echo U('Tc/Index');?>"><span class="am-icon-pencil-square-o"></span> 志愿时长录入</a></li>-->
                <li><a href="<?php echo U('./Home/Public/logout');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 介绍</p>
                    <p>一个方便活动报名信息管理的活动报名系统</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->
    <div class="admin-content">

<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加活动</strong> / <small>新增活动项目</small></div>
</div>

<div class="am-container">
    <form class="am-form" method="post" action="/wxtest/index.php/Orgs/Active/add" enctype="multipart/form-data" data-am-validator>
        <div class="am-form-group">
            <label for="title">标题</label>
            <div>
                <input type="text" id="title" name="title" placeholder="标题" required>
            </div>
        </div>
        <!--<div class="am-form-group">-->
            <!--<label>组织</label>-->
            <!--<div>-->
                <!--<input type="text" name="org" placeholder="组织" required value="<?php echo ($_SESSION['name']); ?>">-->
            <!--</div>-->
        <!--</div>-->
        <div class="am-form-group">
            <label for="container">说明</label>
            <div>
                <script id="container" name="content" type="text/plain">
                </script>
            </div>
        </div>
        <div class="am-form-group">
            <label for="time">报名截止时间</label>
            <div>
                <input id="time" name="time" type="text" class="am-form-field" placeholder="日历" data-am-datepicker readonly required />
            </div>
        </div>
        <div class="am-form-group">
            <di>
                <button type="submit" class="am-btn-default">添加</button>
            </di>
        </div>
    </form>
</div>

<script type="text/javascript" src="/wxtest/Public/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="/wxtest/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/wxtest/Public/ueditor/ueditor.all.js"></script>
<script>
    $(function(){
        var ue = UE.getEditor('container',{
                    serverUrl :'<?php echo U('Admin/Index/ueditor');?>'
    });
    })
</script>

</div>
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<footer>
    <hr>
    <footer data-am-widget="footer"
            class="am-footer am-footer-default"
            data-am-footer="{  }">
        <div class="am-footer-miscs ">
            <p>由 YorkZhang
                提供技术支持</p>
            <p>CopyRight©2016  YorkZhang.</p>
        </div>
    </footer>
    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="/wxtest/Public/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="/wxtest/Public/js/jquery.js"></script>
    <!--<![endif]-->
    <script src="/wxtest/Public/js/amazeui.min.js"></script>
    <script src="/wxtest/Public/js/app.js"></script>

    </body>
    </html>