<?php
/**
 * 获取语雀的API数据
 *
 * @package Package Name
 * @subpackage Subpackage
 * @category Category
 * @author xiaoz
 * @link https://www.xiaoz.me/
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Get_data {
	//API地址
	protected $api_url;
	//token
	protected $api_token;
	protected $login;

	//构造函数
	public function __construct($params){
		$this->api_url = "https://www.yuque.com/api/v2";
		$this->api_token = $params['api_token'];
		$this->login = $params['login'];
	}

	//获取个人信息
	public function user(){
		$token = $this->api_token;
		$url = $this->api_url."/user";
		$data = $this->curl($token,$url);
		return $data;
	}
	//获取文档列表
	public function repos(){
		$token = $this->api_token;
		$url = $this->api_url."/users/{$this->login}/repos";
		$data = $this->curl($token,$url);
		return $data;
	}
	//获取某个文档的目录列表,需要传入一个slug参数，也就是文档名
	public function toc($name){
		//对传入的参数进行过滤
		$name = trim($name);
		$name = htmlspecialchars($name);
		$token = $this->api_token;
		$url = $this->api_url."/repos/{$this->login}/{$name}/toc";
		$data = $this->curl($token,$url);
		//echo $url;
		//exit;
		return $data;
	}
	//获取某篇文章的详细数据
	public function doc($name,$slug){
		///repos/:namespace/docs/:slug
		$name = trim($name);
		$name = htmlspecialchars($name);
		$name = $this->login.'/'.$name;
		$slug = trim($slug);
		$slug = htmlspecialchars($slug);
		$token = $this->api_token;
		$url = $this->api_url."/repos/{$name}/docs/{$slug}";
		//echo $url;
		//exit;
		$data = $this->curl($token,$url);
		//echo $url;
		//exit;
		return $data;
	}
	//curl
	protected function curl($token,$url){
		$headers = array();
		$headers[] = 'X-Auth-Token: '.$token;
		$curl = curl_init($url);

	    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36");
	    curl_setopt($curl, CURLOPT_FAILONERROR, true);
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	    #设置超时时间，最小为1s（可选）
	    curl_setopt($curl , CURLOPT_TIMEOUT, 1);

	    $html = curl_exec($curl);
	    curl_close($curl);
	    $data = json_decode($html)->data;
		//var_dump($data);
	 //   exit;
	    return $data;
	}
}