<?php
/**
 * config file
 *
 * @package 站点配置文件，请根据提示配置
 * @subpackage Subpackage
 * @category Category
 * @author xiaoz
 * @link https://www.xiaoz.me/
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
下方为必填选线，否则站点会有异常
*/

//站点域名，注意后面有个斜杠(/)
$config['base_url'] = 'http://yq.xiaoz.me/';
//语雀唯一别名，在https://www.yuque.com/settings/account 【个人路径】进行获取
$config['login'] = 'helloz';
//语雀token，在https://www.yuque.com/settings/tokens 进行创建
$config['token'] = 'xxxx';
//站点目录路径，位于application/views，一般保持默认不用修改
$config['template'] = 'default';
/*
以下为选填
*/

//是否开启缓存，默认关闭，正式环境建议开启。FALSE:关闭 ， TRUE: 开启
$config['cache'] = FALSE;
//网站标题
$config['title'] = 'Zdoc';
//副标题
$config['subtitle'] = '基于语雀API开发的文档系统';
//首页关键词
$config['keywords'] = 'yqdoc,zdoc,小z博客,文档系统,markdown';
//首页描述
$config['description'] = '站点描述';
//个人社交信息
$config['site'] = 'https://www.xiaoz.me/';
$config['weibo'] = 'http://weibo.com/337003006';
$config['github'] = 'https://github.com/helloxz';
$config['qq'] = 'http://wpa.qq.com/msgrd?v=3&amp;uin=337003006&amp;site=qq&amp;menu=yes';
//捐赠地址
$config['donation'] = 'https://www.xiaoz.me/api/pay/';