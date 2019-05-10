<!--内容部分-->
<div>
	<div class="layui-container">
		<div class="layui-row">
			<div class="layui-col-lg2">
				<!--文章左侧-->
				<div class="post-left">
					<div class = "name-toc">
						<ul>
						<?php foreach( $toc as $value )
						{
							# code...
						?>
							<li><a href="<?php echo $value->slug; ?>"><?php echo $value->title; ?></a></li>
						<?php } ?>
						</ul>
					</div>
				</div>
				<!--文章左侧END-->
			</div>
			<!--文章详细内容-->
			<div class="layui-col-lg8 post-content">
				<div id = "kCatelog" class="content-html">
					<?php echo $body_html; ?>
				</div>
			</div>
			<!--文章详细内容END-->
			<!--文章右侧-->
			<div class="layui-col-lg2 post-toc">
				<div><h3>目录列表</h3></div>
				<div class="k-catelog-list" id="catelogList"></div>
			</div>
			<!--文章右侧END-->
		</div>
	</div>
</div>
<!--内容部分END-->