<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->model('AnimeModel');
		$this->load->library('../controllers/Seo/SructurData');
	}
	// dev
	public function index()
	{	
		$trendingKeyword = '';
		$tagsKeyword ='';
		$LimitRowPegination = 4;
        $structurDataSeo = AnimeController::StructurDataSeo();
		$API_LastUpdateAnime = self::LastUpdateAnime(12,0);
		$SearchGenreAnime = AnimeController::SearchGenreAnime(6,0);
		$RecomendationAnime = AnimeController::RecomendationAnime(12,0);
		$ListAnimeOng = AnimeController::SearchAnime("","Ong",12,0, $LimitRowPegination);
		$SliderAnime = AnimeController::SliderAnime(5);


		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $tagsKeyword;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['API_GenreAnime'] = $SearchGenreAnime;
		$PTR_API['API_RecomendationAnime'] = $RecomendationAnime;
		$PTR_API['API_ListAnimeOng'] = $ListAnimeOng;
		$PTR_API['API_LastUpdateAnime'] = $API_LastUpdateAnime;
		$PTR_API['API_SliderAnime'] = $SliderAnime;
		$PTR_API['SeoStructurData'] = $structurDataSeo;
		
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_anime',$PTR_API);
		$this->load->view('template_2/nav/slider_header',$PTR_API);
		$this->load->view('template_2/anime',$PTR_API);
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

    public function LastUpdateAnime($limitRange,$starIndex){
		$LimitRowPegination = 2;
		$param = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
        $param = json_encode($param);
        
		$API_TheMovieRs = $this->AnimeModel->lastUpdateAnime($param);
		return $API_TheMovieRs;
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

	public function SearchAnime($Keyword, $Status,$limitRange, $startIndex, $LimitRowPegination){
        $paramsSearch = [
            'params' => [
                'keyword' => $Keyword,
                "status" => $Status,
                'limit_range' => $limitRange,
                'star_index' => $startIndex,
                'min_row_pegination' => $LimitRowPegination,
                'is_updated' => TRUE
            ]
        ];
        $paramsSearch = json_encode($paramsSearch);
        $SearchAnime = $this->AnimeModel->SearchAnime($paramsSearch);
        return $SearchAnime;
    }


	public function SearchGenreAnime($limitRange,$starIndex){
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
		$API_TheMovieRs = $this->AnimeModel->SearchGenreAnime($params);
		return $API_TheMovieRs;
	}

	public function RecomendationAnime($limitRange,$starIndex){
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
		$API_TheMovieRs = $this->AnimeModel->RecomendationAnime($params);
		return $API_TheMovieRs;
	}
}