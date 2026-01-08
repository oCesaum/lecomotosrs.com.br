<?php

if(!function_exists('cloudimage')){

	/* function to potentially wrap image in a CDN service */
	function cloudimage($url,$command,$size='n',$modifiers='n'){
		return $url;
		if(preg_match('/\.cloudimage\./',$url)) return $url;
		return "https://cloudimg.carrosnovale.com.br/$command/$size/$modifiers/$url";
	}

}

if(!function_exists('site_url')){
	function site_url($filename,$versioned = false){

		if((!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO']=='https') || isset($_SERVER['HTTPS'])){
			$url = secure_url('/');
		} else {
			$url = url('/');
		}
		$url .= '/'.$filename;

		if($versioned && $_SERVER['HTTP_HOST']!='localhost'){
			$url .= '?v='.filemtime(public_path().'/'.$filename);
		}
		return $url;
	}
}



if(!function_exists('versioned_file')){
	function versioned_file($filename){
		$url = secure_asset('/').$filename;
		if($_SERVER['HTTP_HOST']!='localhost') $url .= '?v='.filemtime(public_path().'/'.$filename);
		return $url;
	}
}