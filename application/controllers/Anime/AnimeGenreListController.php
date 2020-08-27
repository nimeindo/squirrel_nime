<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeGenreListController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
		$this->load->helper('date');
		$this->load->library('user_agent');
		$this->load->library('../controllers/Seo/SructurData');
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
    }

    public function genreList($nameIndex = null){
		$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
		$nameIndex = (!empty($nameIndex)) ?  $nameIndex : '';
		$nameIndex = substr(trim($nameIndex), 0, 1);
		$NameIndexVal = !ctype_alpha($nameIndex) ? '' : ucwords($nameIndex);
		if($nameIndex == "0") {
			$NameIndexVal = '';
		}
		$all = (empty($NameIndexVal)) ? TRUE : FALSE;
		$GenreListAnime = AnimeGenreListController::genreListAnime($NameIndexVal,$all);
		$StructurDataSeo = AnimeGenreListController::StructurDataSeo();
		$DataMetaHeader = AnimeGenreListController::DataMetaHeader();
		$trendingKeyword = '';
		$tagsKeyword = '';
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_GenreListAllAnime']= $GenreListAnime;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['SeoStructurData'] = $StructurDataSeo;
		$PTR_API['DataMetaHeader'] = $DataMetaHeader;
        $this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_anime',$PTR_API);
		$this->load->view('template_2/anime_genre_list_txt');
		$this->load->view('template_2/nav/footer');
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
    
    public function StructurDataSeo(){	
		
		$publishDate = '';
		{#Seo Structur data
				$param = array(
					'main_url' => base_url(),
					'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
					'url_detail' => base_url().'anime/genre',
					'url_search' => base_url().'anime-search/',
					'Title' => 'Anime Genre',
					'date_published' => date(DATE_ISO8601, time()),
					'date_modified' => date(DATE_ISO8601, time()),
					'name_website' => 'Nimeindo',
					'Summary' => "Nimeindo - Nonton Streaming Anime Subtitle Indonesia Dan Baca Manga Indonesia",
					'description' => 'Kumpulan Anime Terbaru Substitle Indonesia'
				);
				
				$structurDataSeo = array(
					'Brand' => SructurData::Brand($param,false),
					'Webpage' => SructurData::WebPage2($param,false),
					
				);
		}
		return $structurDataSeo;
	}

	public function genreListAnime($nameIndex, $allIndex = FALSE){
		$params = [
            'params' => [
				'name_index' => $nameIndex,
				'all_index' => $allIndex,
            ]
		];
		$params = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->genreListAnime($params);
		return $API_TheMovieRs;
	}
}