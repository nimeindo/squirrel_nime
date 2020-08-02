<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$row = ($this->agent->is_mobile()) ? 16 : 15;
		$API_LastUpdateAnime = Home::LastUpdateAnime($row);
		$API_LastUpdateManga = Home::LastUpdateManga($row);
		$SearchGenreManga = Home::SearchGenreManga($row);
		$structurDataSeo = Home::StructurDataSeo();
		$RecomendationManga = Home::RecomendationManga(5);
		$RecomendationAnime = Home::RecomendationAnime(5);
		$TopManga = Home::TopManga(5);
		$TopAnime = Home::TopAnime(5);
		$SliderAnime = Home::SliderAnime(5);
		
		$trendingKeyword = '';
		$tagsKeyword ='';
		
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $tagsKeyword;
		$PTR_API['API_LastUpdateAnime'] = $API_LastUpdateAnime;
		$PTR_API['API_GenreManga'] = $SearchGenreManga;
		$PTR_API['API_LastUpdateManga'] = $API_LastUpdateManga;
		$PTR_API['API_RecomendationManga'] = $RecomendationManga;
		$PTR_API['API_RecomendationAnime'] = $RecomendationAnime;
		$PTR_API['API_TopManga'] = $TopManga;
		$PTR_API['API_TopAnime'] = $TopAnime;
		$PTR_API['API_SliderAnime'] = $SliderAnime;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['SeoStructurData'] = $structurDataSeo;
		
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_main',$PTR_API);
		$this->load->view('template_2/nav/slider_header',$PTR_API);
		$this->load->view('template_2/home',$PTR_API);
		$this->load->view('template_2/nav/footer');
		
	} 
	
	public function LastUpdateAnime($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => '',
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->lastUpdateAnime($params);
		return $API_TheMovieRs;
	}

	public function LastUpdateManga($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => '',
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_MangaRs = $this->MangaModel->LastUpdateManga($params);
		return $API_MangaRs;
	}

	public function StructurDataSeo(){
		{#Seo Structur data
			$param = array(
				'main_url' => base_url(),
				'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
				'name_website' => 'Nimeindo',
			);
			$structurDataSeo = array(
				'Website' => SructurData::Website($param,false),
				'Webpage' => SructurData::WebPage(null,True),
				// 'Organization' => SructurData::Organization(null,True),
				'CollectionPage' => SructurData::CollectionPage($param,false),
			);
		}

		return $structurDataSeo;
	}

	public function SearchGenreManga($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'genre' => 'romance',
				'limit_range' => $limitRange,
				'star_index' => '',
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_MangaRs = $this->MangaModel->SearchGenreManga($params);
		return $API_MangaRs;
	}

	public function RecomendationManga($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => '',
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_MangaRs = $this->MangaModel->RecomendationManga($params);
		return $API_MangaRs;
	}

	public function RecomendationAnime($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => '',
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->RecomendationAnime($params);
		return $API_TheMovieRs;
	}

	public function TopAnime($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => '',
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->TopAnime($params);
		return $API_TheMovieRs;
	}

	public function TopManga($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => '',
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_MangaRs = $this->MangaModel->TopManga($params);
		return $API_MangaRs;
	}
	public function SliderAnime($limitRange){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => '',
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->SliderAnime($params);
		return $API_TheMovieRs;
	}

	public function containsDecimal( $value ) {
		if ( strpos( $value, "." ) !== false ) {
			return True;
		}
		return FALSE;
	}
}
