<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>组织管理 - 活动报名系统</title>
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
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">组织管理</strong> / <small>在这里可以管理组织账号</small></div>
</div>

<div class="am-container">
    <div class="am-container">
        <form class="am-forme" method="post" action="<?php echo U('Org/add');?>"  enctype="multipart/form-data">
            <div class="am-form-group">
                <label for="id">用户名</label>
                <input type="text" class="form-control" id="id" placeholder="用户名" name="username">
            </div>
            <div class="am-form-group">
                <label for="name">组织名</label>
                <input type="text" class="form-control" id="name" placeholder="姓名" name="name">
            </div>
            <div class="am-form-group">
                <label for="major">负责人手机</label>
                <input type="text" class="form-control" id="major" placeholder="手机" name="mobile">
            </div>
            <div class="am-form-group">
                <label for="major">组织简介</label>
                <input type="text" class="form-control" id="major" placeholder="组织简介" name="intro">
            </div>
            <div class="am-form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" placeholder="密码" name="password">
            </div>
            <div class="am-form-group">
                <button type="submit" class="am-btn-default">添加</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>用户名</th>
                <th>组织名</th>
                <th>负责人手机</th>
                <th>组织简介</th>
                <th>管理</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["username"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["mobile"]); ?></td>
                    <td><button class="am-btn am-btn-default am-btn-xs" data-am-modal="{target: '#my-alert'}">查看</button></td>
                    <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
                        <div class="am-modal-dialog">
                            <div class="am-modal-hd">组织简介</div>
                            <div class="am-modal-bd">
                                <?php echo ($vo["intro"]); ?>
                            </div>
                            <div class="am-modal-footer">
                                <span class="am-modal-btn">确定</span>
                            </div>
                        </div>
                    </div>
                    <td><a href="/wxtest/index.php/Admin/Org/edit/id/<?php echo ($vo["id"]); ?>">修改</a> <a href="/wxtest/index.php/Admin/Org/del/id/<?php echo ($vo["id"]); ?>">删除</a></td>
                    <td><?php if($vo["state"] == 1): ?><a href="/wxtest/index.php/Admin/Org/off/id/<?php echo ($vo["id"]); ?>" class="am-btn am-btn-danger am-btn-xs"><span class="am-icon-archive"></span> 关闭账号</a><?php endif; ?>
                        <?php if($vo["state"] == 0): ?><a href="/wxtest/index.php/Admin/Org/on/id/<?php echo ($vo["id"]); ?>" class="am-btn am-btn-default am-btn-xs"><span class="am-icon-archive"></span> 审核账号</a><?php endif; ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div><?php echo ($page); ?></div>
</div>
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