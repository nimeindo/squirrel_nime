<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller404 extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->model('AnimeModel');
		$this->load->model('MangaModel');
		$this->load->library('../controllers/Seo/SructurData');
		
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
	}
	// dev
	public function index()
	{	
		$PTR_API['TrendingKeyword'] = '';
		$PTR_API['TagsKeyword'] = '';
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['SeoStructurData'] = '';
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_main',$PTR_API);
		$this->load->view('errors/custom_v1/404');
		$this->load->view('template_2/nav/footer');
    }
}