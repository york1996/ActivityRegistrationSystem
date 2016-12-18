<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>注册 - 活动报名系统</title>
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
<header class="am-topbar  am-topbar-inverse">
    <h1 class="am-topbar-brand">
        <a href="<?php echo U('Index/index');?>">活动报名系统</a>
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
        </ul>



        <div class="am-topbar-right">
            <ul class="am-nav am-nav-pills am-topbar-nav">

                <?php if($_SESSION['type'] == 1): ?><li class="am-dropdown" data-am-dropdown>
                        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                            <span class="am-icon-users"></span> <?php echo ($_SESSION['name']); ?> <span class="am-icon-caret-down"></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li><a href="<?php echo U('./User/Index');?>"><span class="am-icon-bars"></span> 个人中心</a></li>
                            <li><a href="<?php echo U('Public/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                        </ul>
                    </li>
                    <?php elseif($_SESSION['type'] == 2): ?>
                        <li class="am-dropdown" data-am-dropdown>
                            <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                                <span class="am-icon-users"></span> <?php echo ($_SESSION['name']); ?> <span class="am-icon-caret-down"></span>
                            </a>
                            <ul class="am-dropdown-content">
                                <li><a href="<?php echo U('./Org/Index');?>"><span class="am-icon-bars"></span> 组织控制台</a></li>
                                <li><a href="<?php echo U('Public/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                            </ul>
                        </li>
                        <?php elseif($_SESSION['type'] == 3): ?>
                            <li class="am-dropdown" data-am-dropdown>
                                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                                    <span class="am-icon-users"></span> <?php echo ($_SESSION['name']); ?> <span class="am-icon-caret-down"></span>
                                </a>
                                <ul class="am-dropdown-content">
                                    <li><a href="<?php echo U('./Admin/Index');?>"><span class="am-icon-bars"></span> 管理后台</a></li>
                                    <li><a href="<?php echo U('Public/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                                </ul>
                            </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Public/Reg');?>">注册</a></li>
                    <li><a href="<?php echo U('Public/Login');?>">登陆</a></li><?php endif; ?>

            </ul>
        </div>
    </div>
</header>

<style>
    .header {
        text-align: center;
    }
    .header h1 {
        font-size: 200%;
        color: #333;
        margin-top: 30px;
    }
    .header p {
        font-size: 14px;
    }
</style>
<div class="header">
    <div class="am-g">
        <h1>注册</h1>
        <p>个人/组织注册页面,组织注册需审核后才给予开通<br/>请填写下面的信息</p>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-tabs am-u-lg-6 am-u-md-8 am-u-sm-centered" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
            <li class="am-active"><a href="#tab1">个人</a></li>
            <li><a href="#tab2">组织</a></li>
        </ul>

        <div class="am-tabs-bd">
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                <div class="am-u-sm-centered">
                    <form action="<?php echo U('Public/Reg1');?>" method="post" class="am-form" data-am-validator>
                        <fieldset>
                            <div class="am-form-group">
                                <label for="doc-vld-name-2">用户名：</label>
                                <input type="text" name="username" id="doc-vld-name-2" placeholder="输入用户名" required/>
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-passwd-2">密码：</label>
                                <input type="password" name="password" id="doc-vld-passwd-2" placeholder="输入密码" required/>
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-passwd-2">确定密码：</label>
                                <input type="password" name="repassword" id="doc-vld-passwd-2" placeholder="确定密码" required/>
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-1">真实姓名：</label>
                                <input type="text" name="name" id="doc-vld-1" placeholder="请输入真实姓名" required/>
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-3">手机：</label>
                                <input type="text" name="mobile" id="doc-vld-3" placeholder="请输入手机号">
                            </div>

                            <div class="am-cf">
                                <input type="submit" name="" value="注 册" class="am-btn am-btn-primary am-btn-sm am-fl">
                            </div>


                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="am-tab-panel am-fade" id="tab2">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                    <div class="am-u-sm-centered">
                        <form action="<?php echo U('Public/Reg2');?>" method="post" class="am-form" data-am-validator>
                            <fieldset>
                                <div class="am-form-group">
                                    <label for="doc-vld-name-2">用户名：</label>
                                    <input type="text" name="username" id="doc-vld-name-2" placeholder="输入用户名" required/>
                                </div>

                                <div class="am-form-group">
                                    <label for="doc-vld-passwd-2">密码：</label>
                                    <input type="password" name="password" id="doc-vld-passwd-2" placeholder="输入密码" required/>
                                </div>

                                <div class="am-form-group">
                                    <label for="doc-vld-passwd-2">确定密码：</label>
                                    <input type="password" name="repassword" id="doc-vld-passwd-2" placeholder="确定密码" required/>
                                </div>

                                <div class="am-form-group">
                                    <label for="doc-vld-passwd-2">组织名：</label>
                                    <input type="text" name="name" id="doc-vld-passwd-2" placeholder="请输入真实姓名" required/>
                                </div>

                                <div class="am-form-group">
                                    <label for="doc-ta-1">组织简介</label>
                                    <textarea class="" rows="5" id="doc-ta-1" name="intro"></textarea>
                                </div>

                                <div class="am-form-group">
                                    <label for="doc-vld-passwd-2">联系人手机：</label>
                                    <input type="text" name="mobile" id="doc-vld-passwd-2" placeholder="请输入手机号" required/>
                                </div>

                                <input type="hidden" value="0" name="state">

                                <div class="am-cf">
                                    <input type="submit" name="" value="注 册" class="am-btn am-btn-primary am-btn-sm am-fl">
                                </div>


                            </fieldset>
                        </form>
                    </div>
            </div>

        </div>
    </div>
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
            <p>活动报名系统</p>
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