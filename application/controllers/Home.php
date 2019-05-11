<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $token;
	public $login;
	public $template;
	public function __construct(){
		parent::__construct();
		$this->token = $this->config->item('token');
		$this->login = $this->config->item('login');
		$this->template = $this->config->item('template');
	}
	//默认首页
	public function index() {
		//首页缓存15分钟
		$this->output->cache(15);
		$token = $this->config->item('token');
	 	//加载类库
	 	$params = array(
	 		'api_token' => $token,
	 		'login' => $this->config->item('login')
	 	);
	 	$this->load->library('get_data',$params);
	 	//调用类方法
		$data = array(
			"title"			=>	$this->config->item('title'),
			"subtitle"		=>	$this->config->item('subtitle'),
			"keywords"		=>	$this->config->item('keywords'),
			"description"	=>	$this->config->item('description'),
			"user"			=>	$data['user'] = $this->get_data->user(),
			"repos"			=>	$this->get_data->repos(),
			"site"			=>	$this->config->item('site'),
			"weibo"			=>	$this->config->item('weibo'),
			"github"		=>	$this->config->item('github'),
			"qq"			=>	$this->config->item('qq')
		);
	    //var_dump($data);
		//加载视图
		$this->load->view($this->template.'/header',$data);
		$this->load->view($this->template.'/home',$data);
		$this->load->view($this->template.'/footer',$data);
	}
	public function toc($slug){
		$params = array(
	 		'api_token' => $this->token,
	 		'login' => $this->config->item('login')
	 	);
		$this->load->library('get_data',$params);
		$data = $this->get_data->toc($slug);
		var_dump($data);
	}
}