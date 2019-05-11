//使用layui
layui.use(['layer','element'], function(){
  	var element = layui.element;
  	var layer = layui.layer;
  	layer.photos({
	  photos: '#kCatelog'
	  ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	}); 
});

//目录列表
new katelog({
    contentEl: 'kCatelog',
    catelogEl: 'catelogList',
    linkClass: 'k-catelog-link',
    linkActiveClass: 'k-catelog-link-active',
    supplyTop: 20,
    selector: ['h2', 'h3', 'h4'],
    active: function (el) {
        console.log(el);
    }
});
//代码高亮
$('pre code').each(function(i, block) {
	try{
		hljs.highlightBlock(block);
	}catch(e){

	}
});
//自动加载
$(document).ready(function() {
	$('#post-left').scrollToFixed();
	$('#post-toc').scrollToFixed();
	$("table").addClass("layui-table");
});
//返回顶部按钮
function gotop(){
	$("html,body").animate({scrollTop: '0px'}, 600);
}

//捐赠按钮
function donate(){
	var title = $("title").text();
	title = title.replace(' - 小z博客','');
	layer.open({
	  	type: 2, 
	  	title:'创作不易，用心坚持，请xiaoz喝一怀咖啡吧！',
	  	area: ['680px', '68%'],
	  	content: 'https://www.xiaoz.me/api/pay/'
	}); 
}