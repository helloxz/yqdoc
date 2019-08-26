<?php
/**
 * yqdoc首页
 *
 * @package Package Name
 * @subpackage Subpackage
 * @category Category
 * @author xiaoz
 * @link https://www.xiaoz.me/
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $token;
	public $login;
	public $template;
	public $cache;
	public function __construct(){
		parent::__construct();
		//获取site_config.php信息
		$this->token = $this->config->item('token');
		$this->login = $this->config->item('login');
		$this->template = $this->config->item('template');
		$this->cache = $this->config->item('cache');
	}
	//默认首页
	public function index() {
		//获取图片域名
		$this->load->helper('url');
		$pic_domain = site_url('').'post/img?path=';
		//判断是否开启缓存
		if($this->cache == TRUE){
			//首页缓存15分钟
			$this->output->cache(15);
		}
		$token = $this->config->item('token');
	 	//加载类库
	 	$params = array(
	 		'api_token' => $token,
	 		'login' => $this->config->item('login')
	 	);
	 	$this->load->library('get_data',$params);
	 	//获取用户信息
	 	$user = $this->get_data->user();
	 	//如果执行不成功，再次执行
	 	if( ! $user) {
		 	$user = $this->get_data->user();
	 	}
	 	//获取repos仓库列表
	 	$repos = $this->get_data->repos();
	 	//如果执行不成功，再次执行
	 	if( ! $repos) {
		 	$repos = $this->get_data->repos();
	 	}
	 	//调用类方法
		$data = array(
			"title"			=>	$this->config->item('title'),
			"subtitle"		=>	$this->config->item('subtitle'),
			"keywords"		=>	$this->config->item('keywords'),
			"description"	=>	$this->config->item('description'),
			"user"			=>	$user,
			"repos"			=>	$repos,
			"site"			=>	$this->config->item('site'),
			"weibo"			=>	$this->config->item('weibo'),
			"github"		=>	$this->config->item('github'),
			"qq"			=>	$this->config->item('qq'),
			'pic_doamin'	=>	$pic_domain
		);
		//var_dump($data['repos']);
	    //var_dump($data);
		//加载视图
		$this->load->view($this->template.'/header',$data);
		$this->load->view($this->template.'/home',$data);
		$this->load->view($this->template.'/footer',$data);
	}
}