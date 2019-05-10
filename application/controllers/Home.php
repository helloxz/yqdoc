<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $token;
	public $login;
	public function __construct(){
		parent::__construct();
		$this->token = $this->config->item('token');
		$this->login = $this->config->item('login');
	}
	//默认首页
	public function index() {
		$token = $this->config->item('token');

		
	 	//加载类库
	 	$params = array(
	 		'api_token' => $token,
	 		'login' => $this->config->item('login')
	 	);
	 	$this->load->library('get_data',$params);
	 	//调用类方法
	 	$data['user'] = $this->get_data->user();
	 	
	 	$data['repos'] = $this->get_data->repos();
	 	
	    //站点信息
	    $data['site'] = $this->config->item('site');
	    //微博
	    $data['weibo'] = $this->config->item('weibo');
	    //github
	    $data['github'] = $this->config->item('github');
	    //qq
		$data['qq'] = $this->config->item('qq');
	    //var_dump($data);
		//加载视图
		$this->load->view('default/header',$data);
		$this->load->view('default/home',$data);
		$this->load->view('default/footer',$data);
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