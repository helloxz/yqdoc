<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller {
	public $token;
	public $login;
	public $title;
	public $keywords;
	public $description;
	public $template;
	public $page_cache;
	public $donation;
	public function __construct(){
		parent::__construct();
		$this->template = $this->config->item('template');
		$this->token = $this->config->item('token');
		$this->login = $this->config->item('login');
		$this->title = $this->config->item('title');
		$this->subtitle = $this->config->item('subtitle');
		$this->keywords = $this->config->item('keywords');
		$this->description = $this->config->item('description');
		$this->page_cache = $this->config->item('cache');
		$this->donation = $this->config->item('donation');
		//加载类库
	 	$params = array(
	 		'api_token' => $this->token,
	 		'login' => $this->login
	 	);
	 	$this->load->library('get_data',$params);
	 	
	}
	//public function _remap($name,$slug) {
 //       $this->doc($name,$slug);
 //   }
	public function doc($name,$slug = ''){
		//当前域名
		$this->load->helper('url');
		$pic_domain = site_url('').'post/img?path=';
		//判断是否开启缓存
		if($this->page_cache === TRUE){
			//文章页面缓存12小时
			$this->output->cache(12 * 60);
		}
		
		//XSS过滤
		$name = $this->security->xss_clean($name);
		$slug = $this->security->xss_clean($slug);
		if( ($slug == '') OR ( ! isset($slug)) ) {
			$toc_tmp = $this->get_data->toc($name);
			$slug = $toc_tmp[0]->slug;
			$url = current_url();
			$url = $url.'/'.$slug;
			header("location: {$url}");
		}
		
		$data = $this->get_data->doc($name,$slug);
		//var_dump($data);
		//获取副标题
		$subtitle = $data->title;
		//获取当前文档列表
		$data->toc = $this->get_data->toc($name);
		
		$data->title = $this->title;
		$data->subtitle = $data->book->name."【{$subtitle}】";
		$data->keywords = $this->keywords.','.$data->book->name;
		//$data->description = $data->subtitle."。".$data->book->description;
		$data->repos = $this->get_data->repos();
		
		$data->name = $data->book->name;
		//捐赠地址
		$data->donation = $this->donation;
		//文档最后更新时间
		$data->content_updated_at = date('Y-m-d H:i',strtotime($data->book->content_updated_at));
		//var_dump($data->toc);
		
		$this->load->view($this->template.'/header',$data);
		$this->load->view($this->template.'/post',$data);
		$this->load->view($this->template.'/footer');
	}
	//获取语雀图片
	public function img(){
		//加载缓存驱动器
		$this->load->driver('cache');
		
		//获得图片路径
		$path = $this->input->get('path',TRUE);
		$key = md5($path);
		//获取缓存
		//var_dump($this->cache->get($key));
		//exit;
		//缓存不存在
		if( ! $this->cache->file->get($key) ){
			
			$url = "https://cdn.nlark.com".$path;
		
			//curl抓取语雀图片
			$curl = curl_init($url);

		    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36");
		    curl_setopt($curl, CURLOPT_FAILONERROR, true);
		    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		    curl_setopt($curl, CURLOPT_REFERER, 'https://www.yuque.com/');
		    #设置超时时间，最小为1s（可选）
		    curl_setopt($curl , CURLOPT_TIMEOUT, 30);

		    $html = curl_exec($curl);
		    curl_close($curl);
		    if($html){
			    //缓存图片24小时
			    $this->cache->file->save($key, $html, 24 * 60 * 60);
			    header('Content-Type:*');
			    echo $html;
		    }
		}
		//缓存存在
		else{
			$imginfo = $this->cache->file->get($key);
			header('Content-Type:*');
			echo $imginfo;
		}
	}
}