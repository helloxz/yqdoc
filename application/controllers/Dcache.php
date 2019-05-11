<?php
/**
 * Delate Cache Class
 *
 * @package Package Name
 * @subpackage Subpackage
 * @category Category
 * @author xiaoz
 * @link https://www.xiaoz.me
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dcache extends CI_Controller{
	//删除缓存方法
	public function index(){
		$uri = $this->input->get('uri',TRUE);
		if( ($uri == '') OR (!isset($uri))){
			exit('参数不能为空！');
			exit;
		}
		if($uri == '*'){
			$this->output->delete_cache();
			echo '已清理所有缓存！';
		}
		else{
			$this->output->delete_cache($uri);
			echo $uri.'缓存已清理！';
		}
	}
}