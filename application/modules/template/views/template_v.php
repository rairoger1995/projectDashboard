<?php 

	$this->load->view('template/header');
	$this->load->view('template/nav');

	// $this->load->view('template/sidebar');
	
	$this->load->view($content_view);
	
	$this->load->view('template/footer');

?>