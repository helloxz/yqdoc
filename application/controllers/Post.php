<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller {
	public $token;
	public $login;
	public function __construct(){
		parent::__construct();
		$this->token = $this->config->item('token');
		$this->login = $this->config->item('login');
		//加载类库
	 	$params = array(
	 		'api_token' => $this->token,
	 		'login' => $this->login
	 	);
	 	$this->load->library('get_data',$params);
	 	
	}
	public function doc($name,$slug){
		$data = $this->get_data->doc($name,$slug);
		$data->toc = $this->get_data->toc($name);
		//var_dump($data->toc);
		
		$this->load->view('default/header',$data);
		$this->load->view('default/post',$data);
		$this->load->view('default/footer');
	}
}