<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MangaController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->model('MangaModel');
		$this->load->model('AnimeModel');
		$this->load->library('../controllers/Seo/SructurData');
	}
	// dev
	public function index()
	{	
		$trendingKeyword = '';
		$tagsKeyword ='';
		$LimitRowPegination = 4;
        $structurDataSeo = MangaController::StructurDataSeo();
		$API_LastUpdateManga = MangaController::LastUpdateManga(12,0);
		$SearchGenreManga = MangaController::SearchGenreManga(6,0);
		$RecomendationManga = MangaController::RecomendationManga(12,0);
		$ListMangaOng = MangaController::SearchManga("","Ong",12,0, $LimitRowPegination);
		$SliderAnime = MangaController::SliderAnime(5);


		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $tagsKeyword;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['API_GenreManga'] = $SearchGenreManga;
		$PTR_API['API_RecomendationManga'] = $RecomendationManga;
		$PTR_API['API_ListMangaOng'] = $ListMangaOng;
		$PTR_API['API_LastUpdateManga'] = $API_LastUpdateManga;
		$PTR_API['API_SliderAnime'] = $SliderAnime;
		$PTR_API['SeoStructurData'] = $structurDataSeo;
		
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_manga',$PTR_API);
		$this->load->view('template_2/nav/slider_header',$PTR_API);
		$this->load->view('template_2/manga',$PTR_API);
		$this->load->view('template_2/nav/footer');
		
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

    public function LastUpdateManga($limitRange,$starIndex){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API= $this->MangaModel->lastUpdateManga($params);
		return $API;
	}

    public function StructurDataSeo(){
		{#Seo Structur data
			$param = array(
				'main_url' => base_url(),
				'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
				'name_website' => 'Nimeindo',
				'description' => "Baca Manga Indonesia",
				'publish_date' => '2020-04-22T23:40',
				'image_url' => '',
				'name_page' => 'Search Anime - '
			);
			$structurDataSeo = array(
				'Website' => SructurData::Website($param,false),
				'Webpage' => SructurData::WebPage($param,false,True),
				// 'Organization' => SructurData::Organization(null,True),
				'CollectionPage' => SructurData::CollectionPage($param,false),
			);
		}

		return $structurDataSeo;
	}

    public function SearchManga($Keyword, $Status ,$limitRange, $startIndex, $LimitRowPegination){
        $paramsSearch = [
            'params' => [
                'keyword' => $Keyword,
                'status' => $Status,
                'limit_range' => $limitRange,
                'star_index' => $startIndex,
                'min_row_pegination' => $LimitRowPegination,
                'is_updated' => TRUE
            ]
        ];
        $paramsSearch = json_encode($paramsSearch);
        $SearchManga = $this->MangaModel->SearchManga($paramsSearch);
        return $SearchManga;
    }

	public function SearchGenreManga($limitRange,$starIndex){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'genre' => 'romance',
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_MangaRs = $this->MangaModel->SearchGenreManga($params);
		return $API_MangaRs;
	}

	public function RecomendationManga($limitRange,$starIndex){
		$LimitRowPegination = 2;
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_MangaRs = $this->MangaModel->RecomendationManga($params);
		return $API_MangaRs;
	}
}