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
	<script src = 'https://libs.xiaoz.top/jquery/2.2.4/jquery.min.js'></script>
	<script src="https://cdn.bootcss.com/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js"></script>
	<script src="<?php echo base_url(); ?>/static/layui/layui.js"></script>
	<script src = 'https://libs.xiaoz.top/highlight.js/9.12.0/highlight.min.js'></script>
	<script src="<?php echo base_url(); ?>/static/katelog/katelog.min.js"></script>
	<script src="<?php echo base_url(); ?>/static/embed.js"></script>
	<script>
		new katelog({
		    contentEl: 'kCatelog',
		    catelogEl: 'catelogList',
		    linkClass: 'k-catelog-link',
		    linkActiveClass: 'k-catelog-link-active',
		    supplyTop: 20,
		    selector: ['h1', 'h2', 'h3', 'h4'],
		    active: function (el) {
		        console.log(el);
		    }
		});
		$('pre code').each(function(i, block) {
			try{
				hljs.highlightBlock(block);
			}catch(e){

			}
		});
		$(document).ready(function() {
			$('#post-left').scrollToFixed();
			$('#post-toc').scrollToFixed();
		});
	</script>
</body>
</html>