<?php

return array (
  'name' => '我的网站',
  'beian' => '',
  'cdnurl' => '',
  'version' => '1.0.7',
  'timezone' => 'Asia/Shanghai',
  'forbiddenip' => '',
  'languages' => 
  array (
    'backend' => 'zh-cn',
    'frontend' => 'zh-cn',
  ),
  'fixedpage' => 'dashboard',
  'categorytype' => 
  array (
    'default' => '默认',
    'page' => '单页',
    'article' => '文章',
    'test' => 'Test',
  ),
  'configgroup' => 
  array (
    'basic' => '基础配置',
    'email' => '邮件配置',
    'dictionary' => '字典配置',
  ),
  'mail_type' => '1',
  'mail_smtp_host' => 'smtp.qq.com',
  'mail_smtp_port' => '465',
  'mail_smtp_user' => '10000',
  'mail_smtp_pass' => 'password',
  'mail_verify_type' => '2',
  'mail_from' => '10000@qq.com',
  'attachmentcategory' => 
  array (
    'category1' => '分类一',
    'category2' => '分类二',
    'custom' => '自定义',
  ),
  'script_code' => '<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,\'script\',
\'https://connect.facebook.net/en_US/fbevents.js\');
fbq(\'init\', \'1320924302152690\');
fbq(\'track\', \'PageView\');
</script>
<noscript>< img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1320924302152690&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->',
);
