<?php 

$module_name = "FacebookAPI";
$mod = $modules->get($module_name);

if(isset($_REQUEST['code'])) {
	if($token = $mod->exchangeToken($_REQUEST['code']))	
		$cache->save($mod::token, $token, WireCache::expireNever);	
}

// URL is hard coded, i know, it's a bit shitty wayt, but neither does PW provide module edit URL from API level!!!
$session->redirect($config->urls->root . "admin/module/edit?name=$module_name&collapse_info=1");

return $this->halt();
