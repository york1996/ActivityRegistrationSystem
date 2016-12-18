<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>活动报名系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="/wxtest/Public/css/amazeui.min.css"/>
    <style>
        .get {
            background: #1E5B94;
            color: #fff;
            text-align: center;
            padding: 200px 0;
        }

        .get-title {
            font-size: 200%;
            border: 2px solid #fff;
            padding: 20px;
            display: inline-block;
        }


        .footer p {
            color: #7f8c8d;
            margin: 0;
            padding: 15px 0;
            text-align: center;
            background: #2d3e50;
        }
    </style>
</head>
<body>
<header class="am-topbar am-topbar-fixed-top">
    <div class="am-container">
        <h1 class="am-topbar-brand">
            <a>活动报名系统</a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li class="am-active"><a href="#">首页</a></li>
            </ul>
            <?php if($_SESSION['name']): ?><div class="am-topbar-right"><a href="<?php echo U('Public/Login');?>" class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span> 控制台</a></div>
            <?php else: ?>
                <div class="am-topbar-right">
                <a href="<?php echo U('Public/Reg');?>" class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span> 注册</a>
            </div>

            <div class="am-topbar-right">
                <a href="<?php echo U('Public/Login');?>" class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> 登录</a>
            </div><?php endif; ?>
        </div>
    </div>
</header>

<div class="get">
    <div class="am-g">
        <div class="am-u-lg-12">
            <h1 class="get-title">活动报名系统 - 一个方便活动报名信息管理的活动报名系统</h1>

            <p>
                北京师范大学珠海分校信息技术学院IT节作品
            </p>

        </div>
    </div>
</div>


<footer class="footer">
    <p>活动报名系统 CopyRight©2016  YorkZhang.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/wxtest/Public/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/wxtest/Public/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/wxtest/Public/js/amazeui.min.js"></script>
</body>
</html>