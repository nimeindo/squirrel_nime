<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteMap extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
	}
 
    public function sitemap(){
		// phpinfo();exit;
		{// List Anime
			$paramsList = [
				'params' => [
					'all_index' => TRUE
				]
			];
			$paramsList = json_encode($paramsList);
			$API_ListAnime = $this->AnimeModel->ListAllAnime($paramsList);
			$PTR_API['API_ListAnime'] = $API_ListAnime;
		}
		
		{//last update anime
			$params = [
				'params' => [
					'limit_range' => 100,
					'star_index' => '',
					'min_row_pegination' => 5,
					'is_updated' => TRUE
				]
			];
			$params = json_encode($params);
			$API_LastUpdate = $this->AnimeModel->lastUpdateAnime($params);
			$PTR_API['API_LastUpdate'] = $API_LastUpdate;
		}
		
		{// anime ongoing
			$paramsOngoing = [
				'params' => [
					'status' => 'Ong',
					'limit_range' => 20,
					'star_index' => '',
					'min_row_pegination' => 5,
					'is_updated' => TRUE
				]
			];
			$paramsOngoing = json_encode($paramsOngoing);
			$API_Ongoing = $this->AnimeModel->SearchAnime($paramsOngoing);
			$PTR_API['API_Ongoing'] = $API_Ongoing;
		}
		
		{
			$paramsGenre = [
				'params' => [
					'all_index' => TRUE
				]
			];
			$paramsGenre = json_encode($paramsGenre);
			$API_Genre = $this->AnimeModel->genreListAnime($paramsGenre);
			$PTR_API['API_Genre'] = $API_Genre;
		}
		
        $this->load->view('seo/view_sitemap',$PTR_API);
	}
	
	public function sitemapLastUpdate($PageNumber = null){
		$LimitRowPegination = 2;
		$starIndex = 100 * ($PageNumber-1);
		{//last update anime
			$params = [
				'params' => [
					'limit_range' => 100,
					'star_index' => $starIndex,
					'min_row_pegination' => $LimitRowPegination,
					'is_updated' => TRUE
				]
			];
			$params = json_encode($params);
			$API_LastUpdate = $this->AnimeModel->lastUpdateAnime($params);
			
			$PTR_API['API_LastUpdate'] = $API_LastUpdate;
			$this->load->view('seo/sitemap_lastupdate',$PTR_API);
		}
	}
	public function sitemapMenu(){
		$this->load->view('seo/sitemap_menu');
	}

	public function sitemapDetailAnime($index = null){
		$index = ($index == '0') ? '#' : $index;
		{// List Anime
			$paramsList = [
				'params' => [
					'name_index' => $index
				]
			];
			$paramsList = json_encode($paramsList);
			$API_ListAnime = $this->AnimeModel->ListAllAnime($paramsList);
			$PTR_API['API_ListAnime'] = $API_ListAnime;
		}
		
		$this->load->view('seo/sitemap_detail',$PTR_API);
	}
}
 
