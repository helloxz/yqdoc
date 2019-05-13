<!DOCTYPE html>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title><?php echo $subtitle; ?> - <?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="generator" content="EverEdit" />
	<meta name="author" content="xiaoz" />
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<meta name="description" content="<?php echo $description; ?>" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/layui/css/layui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/caomei/style.css">
	<!--<link rel="stylesheet" href="/static/katelog/style.css">-->
	<link rel='stylesheet' href='https://libs.xiaoz.top/highlight.js/9.12.0/styles/github.min.css'>
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/style.css?v=0.92">
	<!-- 统计代码 -->
	<script src="<?php echo base_url(); ?>static/tj.js"></script>
	<!-- 统计代码END -->
</head>
<body>
	<!--返回顶部按钮-->
	<div id="top"></div>
	<div class="top"><a href="javascript:;" title="返回顶部" onclick="gotop()"><i class="layui-icon" style="font-size: 50px; color: #1E9FFF;"></i> </a></div>
	<!--返回顶部END-->
	<!--导航菜单-->
	<div id="header">
        <div class="layui-container">
            <div class="layui-row">
                <div class="layui-col-lg12">
                    <div class="menu">
	                    <div id="logo">
		                    <!--<img src="https://gw.alipayobjects.com/zos/rmsportal/XuVpGqBFxXplzvLjJBZB.svg" alt="">-->
			                <a href="<?php echo base_url(); ?>"><h1 style = "display: inline;" title = "<?php echo $subtitle; ?>"><?php echo $title; ?></h1></a>
	                    </div>
                        <div style = "float:left;" class = "layui-hide-xs">
	                        <ul class="layui-nav" lay-filter="">
	                        <li class="layui-nav-item">
						    <a href="javascript:;"><i class="layui-icon layui-icon-read"></i> 我的文档</a>
						    <dl class="layui-nav-child"> <!-- 二级菜单 -->
						    <?php foreach( $repos as $repo )
							{
								//不显示隐私文档
								if($repo->public === 0){
									continue;
								}
								//格式化时间
								$date = strtotime($repo->updated_at);
								$date = date('Y-m-d',$date);
							?>
							<!--这里写HTML-->
								<dd><a href="<?php echo base_url(); ?>doc-<?php echo $repo->slug; ?>"><?php echo $repo->name; ?></a></dd>
							<!--这里写HTML end-->
							<?php	
							}
							?>
						    </dl>
						  </li>
                            <li class="layui-nav-item"><a href="https://www.xiaoz.me/"><i class="layui-icon layui-icon-website"></i> Blog</a></li>
                            <li class="layui-nav-item"><a href="https://imgurl.org/" rel = "nofollow" target = "_blank" title = "免费图片外链工具"><i class="layui-icon layui-icon-picture-fine"></i> 免费图床</a></li>
                            <li class="layui-nav-item"><a href="https://github.com/helloxz/yqdoc" rel = "nofollow" target = "_blank" title = "下载YQdoc源码"><i class="layui-icon layui-icon-fonts-code"></i> 源码下载</a></li>
                        	</ul>
                        </div>
                        <!--搜索框暂时还没开发，哈哈哈-->
						
                        <!--搜索框END-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--导航菜单END-->