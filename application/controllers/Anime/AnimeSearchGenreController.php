<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeSearchGenreController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
		$this->load->library('user_agent');
		$this->load->helper('date');
		$this->load->library('../controllers/Seo/SructurData');
		$this->load->library('../controllers/Helpers/HelpersController');
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
    }

    public function searchGenre($KeywordGenre = null){
		$KeywordGenre = !empty($KeywordGenre) ? HelpersController::__normalizeString($KeywordGenre) : "" ;
		
		if(!empty($KeywordGenre)){
			$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
			$trendingKeyword = '';
			$tagsKeyword = '';
			$starIndex = 0;
			$searchKey = str_replace('-', ' ', $KeywordGenre);
			$SearchGenreAnime = AnimeSearchGenreController::SearchGenreAnime($searchKey, $starIndex, 20, $LimitRowPegination);
			$StructurDataSeo = AnimeSearchGenreController::StructurDataSeo($searchKey);
			$DataMetaHeader = AnimeSearchGenreController::DataMetaHeader();
			$PTR_API['TrendingKeyword'] = $trendingKeyword;
			$PTR_API['TagsKeyword'] = $tagsKeyword;
			$PTR_API['API_SearchGenreAnime'] = $SearchGenreAnime;
			$PTR_API['LimitRowPegination'] = $LimitRowPegination;
			$PTR_API['KeywordGenre'] = $KeywordGenre;
			$PTR_API['RefreshPage'] = FALSE;
			$PTR_API['SeoStructurData'] = $StructurDataSeo;
			$PTR_API['DataMetaHeader'] = $DataMetaHeader;
			$this->load->view('template_2/nav/header',$PTR_API);
			$this->load->view('template_2/nav/header_anime',$PTR_API);
			$this->load->view('template_2/anime_search_genre');
			$this->load->view('template_2/nav/footer');
		}else{
			redirect('');
		}
		
	}
	
	public function Pages($KeywordGenre = null, $page = null){
		$PageNumber = !empty($page) ? $page : 1 ;
		$KeywordGenre = !empty($KeywordGenre) ? HelpersController::__normalizeString($KeywordGenre) : "" ;
		if(!empty($KeywordGenre)  || !empty($PageNumber) ){
			$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
			$starIndex = 20 * ($PageNumber-1);
			$searchKey = str_replace('-', ' ', $KeywordGenre);
			$SearchGenreAnime = AnimeSearchGenreController::SearchGenreAnime($searchKey,$starIndex, 20, $LimitRowPegination);
			$StructurDataSeo = AnimeSearchGenreController::StructurDataSeo($searchKey);
			$DataMetaHeader = AnimeSearchGenreController::DataMetaHeader();
			$trendingKeyword = '';
			$tagsKeyword = '';
			$PTR_API['TrendingKeyword'] = $trendingKeyword;
			$PTR_API['TagsKeyword'] = $tagsKeyword;
			$PTR_API['API_SearchGenreAnime'] = $SearchGenreAnime;
			$PTR_API['KeywordGenre'] = $KeywordGenre;
			$PTR_API['PageNumberNow'] = $PageNumber;
			$PTR_API['LimitRowPegination'] = $LimitRowPegination;
			$PTR_API['DataMetaHeader'] = $DataMetaHeader;
			$PTR_API['RefreshPage'] = FALSE;
			$PTR_API['SeoStructurData'] = $StructurDataSeo;
			$this->load->view('template_2/nav/header',$PTR_API);
			$this->load->view('template_2/nav/header_anime',$PTR_API);
			$this->load->view('template_2/anime_search_genre');
			$this->load->view('template_2/nav/footer');
		}else{
			redirect('');
		}
	}

	public function DataMetaHeader(){
		$DataMetaHeader = [
			"Description" => '',
			"Title" => '',
			"Image" => '',
			"Url" => ''
		];

		return $DataMetaHeader;
	}

	public function StructurDataSeo($keyword){	
		
		$publishDate = '';
		{#Seo Structur data
				$param = array(
					'main_url' => base_url(),
					'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
                    'url_detail' => base_url().'anime/genre/',
                    'url_page' => base_url().'anime/genre/search/'.$keyword,
					'url_search' => base_url().'anime-search/',
					'Title' => 'Anime Search',
					'date_published' => date(DATE_ISO8601, time()),
					'date_modified' => date(DATE_ISO8601, time()),
					'name_website' => 'Nimeindo',
					'Summary' => "Your Anime Genre Search ".$keyword,
					'description' => 'Kumpulan Anime Terbaru Substitle Indonesia'
				);
				
				$structurDataSeo = array(
                    'Brand' => SructurData::Brand($param,false),
                    'SearchResultsPage' => SructurData::SearchResultsPage($param, false),
					'Webpage' => SructurData::WebPage($param,false),
					
				);
		}
		return $structurDataSeo;
	}

	public function SearchGenreAnime($KeywordGenre, $starIndex,$limitRange, $LimitRowPegination){
		$paramsSearch = [
			'params' => [
				'genre' => $KeywordGenre,
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
			]
		];
		$paramsSearch = json_encode($paramsSearch);
		$SearchGenreAnime = $this->AnimeModel->SearchGenreAnime($paramsSearch);
		return $SearchGenreAnime;
	}

}