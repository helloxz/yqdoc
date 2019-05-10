<!DOCTYPE html>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>yqdoc</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="generator" content="EverEdit" />
	<meta name="author" content="xiaoz" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="/static/layui/css/layui.css">
	<link rel="stylesheet" href="/static/caomei/style.css">
	<link rel="stylesheet" href="/static/style.css">
</head>
<body>
	<!--导航菜单-->
	<div id="header">
        <div class="layui-container">
            <div class="layui-row">
                <div class="layui-col-lg12">
                    <div class="layui-hide-xs menu">
                        <ul class="layui-nav" lay-filter="">
                            <li class="layui-nav-item"><a href="/home/multiple"><i class="layui-icon layui-icon-upload"></i> 多图上传</a></li>
                            <li class="layui-nav-item"><a href="/found"><i class="layui-icon layui-icon-search"></i> 探索发现</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--导航菜单END-->
    <!--内容部分-->
	<div class="content">
		<div class="layui-container">
			<div class="layui-row layui-col-space30">
				<div class="layui-col-lg4 ">
					<div class="home-left">
						<!--头像-->
						<div class="avatar_url"><img src="<?php echo $user->avatar_url; ?>" alt=""></div>
						<!--名字-->
						<div class="name"><?php echo $user->name; ?></div>
						<!--个人描述-->
						<div class="description"><?php echo $user->description; ?></div>
						<hr>
						<!--社交信息-->
						<div class="contact">
							<a href="<?php echo $site; ?>" rel = "nofollow" target = "_blank"><span class="czs-network-l"> </span></a>
							<a href="<?php echo $weibo; ?>" rel = "nofollow" target = "_blank"><span class="czs-weibo"> </span></a>
							<a href="<?php echo $github; ?>" rel = "nofollow" target = "_blank"><span class="czs-github-logo"> </span></a>
							<a href="<?php echo $qq; ?>" rel = "nofollow" target = "_blank"><span class="czs-qq"> </span></a>
						</div>
						<!--社交信息END-->
					</div>
				</div>
				<div class="layui-col-lg8">
					<div class="home-right">
						<?php foreach( $repos as $repo )
						{
							//格式化时间
							$date = strtotime($repo->updated_at);
							$date = date('Y-m-d',$date);
						?>
						<!--这里写HTML-->
							<div class="doc">
								<p><a href="/<?php echo $repo->slug; ?>"><h2><span class = "czs-doc-file-l"> </span><?php echo $repo->name; ?></h2></a></p>
								<p><?php echo $repo->description; ?></p>
								<p><span class = "czs-time-l"> </span><?php echo $date; ?></p>
							</div>
							<hr>
						<!--这里写HTML end-->
						<?php	
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--页脚部分-->
	<div id="footer">
		<div class="layui-container">
			<div class="layui-row">
				<div class="layui-col-lg12">
					Copyright .&copy; 2019 
					蜀ICP备14021561号 | 川公网安备 51010602000097号
					Powered by <a href="">YQDOC</a>
				</div>
			</div>
		</div>
	</div>
	<!--页脚部分END-->
    <!--内容部分END-->
	<script src="/static/layui/layui.js"></script>
</body>
</html>
