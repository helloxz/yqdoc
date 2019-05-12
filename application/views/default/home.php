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
					<div class="gg-home">
						<p><a href="https://e.aiguobit.com/?from=xiaoz" target="_blank" rel="nofollow noopener"><img class="alignnone size-full wp-image-6279" src="https://www.xiaoz.me/wp-content/uploads/2019/04/wljs.jpg"></a></p>
					</div>
				</div>
				<div class="layui-col-lg8">
					<div class="home-right">
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
							<div class="doc">
								<p><a href="<?php echo base_url(); ?>doc-<?php echo $repo->slug; ?>"><h2><span class = "czs-doc-file-l"> </span><?php echo $repo->name; ?></h2></a></p>
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
	<!--内容部分END-->