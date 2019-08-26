<!--内容部分-->
<div>
	<div class="layui-container">
		<div class="layui-row">
			<div class="layui-col-lg2 layui-hide-xs">
				<!--文章左侧-->
				<div class="post-left" id = "post-left">
					<h3><?php echo $name; ?></h3>
					<div class = "name-toc">
						<ul>
						<?php foreach( $toc as $value )
						{
							//一级文档
							$depth = $value->depth;
						?>
							<li><span class = "depth<?php echo $depth; ?>"><a href="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/<?php echo $value->slug; ?>"><?php echo $value->title; ?></a></span></li>
						<?php } ?>
						</ul>
					</div>
					<hr>
					<h3>其它文档</h3>
					<div class = "name-toc">
						<ul>
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
								<li><a href="<?php echo base_url(); ?>doc-<?php echo $repo->slug; ?>"><?php echo $repo->name; ?></a></li>
							<!--这里写HTML end-->
							<?php	
							}
							?>
						    </dl>
						</ul>
					</div>
					<!-- gg -->
					<div class="gg-post-left">
						<p><a title="CloudCone最新促销，低至$12.95/年" href="https://www.xiaoz.me/archives/11183" target="_blank" rel="nofollow noopener"><img src="https://i.bmp.ovh/imgs/2019/05/57e4a6f0d1c46779.jpg"></a></p>
					</div>
					<!-- ggend -->
				</div>
				<!--文章左侧END-->
			</div>
			<!-- 手机文章左侧 -->
			<div class="layui-col-lg2 layui-hide-lg layui-hide-md">
				<!-- 卡片面板 -->
				<div class="layui-collapse" style = "margin-top:1em;">
					<div class="layui-colla-item">
						<h2 class="layui-colla-title"><?php echo $name; ?></h2>
						<div class="layui-colla-content layui-show">
							<div class = "name-toc">
								<ul>
								<?php foreach( $toc as $value )
								{
									//一级文档
									$depth = $value->depth;
								?>
									<li><span class = "depth<?php echo $depth; ?>"><a href="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/<?php echo $value->slug; ?>"><?php echo $value->title; ?></a></span></li>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- 卡片面板END -->
			</div>
			<!-- 手机文章左侧END -->
			<!--文章详细内容-->
			<div class="layui-col-lg8 post-content">
				<div id = "kCatelog" class="content-html">
					<h1><?php echo $subtitle; ?></h1>
						<p id = "post-info">
							<span>最后更新:<?php echo $content_updated_at; ?></span>
							<span><a href="<?php echo base_url(); ?>del/?uri=<?php echo $this->uri->segment(1) ?>/<?php echo $this->uri->segment(2); ?>" rel = "nofollow" target = "_blank">清除缓存</a>（若页面显示异常，请点此清除缓存）</span>
						</p>
					<hr>
					<?php
						$pic_domain = site_url('').'post/img?path=';
					 	$body_html = str_replace("https://cdn.nlark.com",$pic_domain,$body_html);
					 	echo $body_html;
					?>
					<hr>
					<div class = "donate">
						<center>
							<a href="javascript:;" onclick="donate('<?php echo $donation; ?>')" class="layui-btn layui-btn-danger" style="margin-top:0.5em;"><span class="czs-alipay"></span>  打赏支持</a>
						</center>
					</div>
				</div>
			</div>
			<!--文章详细内容END-->
			<!--文章右侧-->
			<div class="layui-col-lg2 post-toc layui-hide-xs" id = "post-toc">
				<div><h3>目录列表</h3></div>
				<div class="k-catelog-list" id="catelogList"></div>
				<div class="gg-post-right">
					<p>
						<a href="https://dwz.ovh/vultr" target="_blank" rel="nofollow noopener"><img src="https://i.bmp.ovh/imgs/2019/05/018fcf556e29b639.png"></a>
					</p>
				</div>
			</div>
			<!--文章右侧END-->
		</div>
	</div>
</div>
<!--内容部分END-->