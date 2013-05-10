<?php 

class Template{
	function show($view, $data = array())
	{
		//Get current CI Instance
		$CI = & get_instance();
		
		//load views of template
		$CI->load->view('template/header', $data);
		$CI->load->view($view, $data);
		$CI->load->view('template/footer', $data);
		
	}
	
	function menu($view)
	{
		$CI = get_instance();
		
		$CI->load->view('template/menu', array('view' => $view));
	}
}
