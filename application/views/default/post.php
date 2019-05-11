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
				</div>
				<!--文章左侧END-->
			</div>
			<!--文章详细内容-->
			<div class="layui-col-lg8 post-content">
				<div id = "kCatelog" class="content-html">
					<h1><?php echo $subtitle; ?></h1>
					<hr>
					<?php echo $body_html; ?>
					<hr>
					<div class = "donate">
						<center><a href="javascript:;" onclick="donate()" class="layui-btn layui-btn-danger" style="margin-top:0.5em;"><i class="fa fa-paypal"></i> 打赏支持</a></center>
					</div>
				</div>
			</div>
			<!--文章详细内容END-->
			<!--文章右侧-->
			<div class="layui-col-lg2 post-toc layui-hide-xs" id = "post-toc">
				<div><h3>目录列表</h3></div>
				<div class="k-catelog-list" id="catelogList"></div>
			</div>
			<!--文章右侧END-->
		</div>
	</div>
</div>
<!--内容部分END-->