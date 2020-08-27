<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeListController extends CI_Controller {

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

    public function animeList($nameIndex = null){
		$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
		$nameIndex = (!empty($nameIndex)) ?  $nameIndex : '';
		$nameIndex = substr(trim($nameIndex), 0, 1);
		$NameIndexVal = !ctype_alpha($nameIndex) ? '' : ucwords($nameIndex);
		if($nameIndex == "0") {
			$NameIndexVal = '';
		}elseif($nameIndex == "1"){
			$NameIndexVal = '#';
		}
		$all = (empty($NameIndexVal)) ? TRUE : FALSE;
		$ListAllAnime = AnimeListController::ListAllAnime($NameIndexVal,$all,$LimitRowPegination,350,0);
		$StructurDataSeo = AnimeListController::StructurDataSeo();
		$DataMetaHeader = AnimeListController::DataMetaHeader();
		$trendingKeyword = '';
		$tagsKeyword = '';
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_ListAllAnime']= $ListAllAnime;
		$PTR_API['NameIndexVal'] = '0';
		$PTR_API['LimitRowPegination'] = $LimitRowPegination;
		$PTR_API['DataMetaHeader'] = $DataMetaHeader;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['SeoStructurData'] = $StructurDataSeo;
        $this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_anime',$PTR_API);
		$this->load->view('template_2/anime_list_txt');
		$this->load->view('template_2/nav/footer');
	}
	

	public function pages($nameIndex, $numberAnime){
		$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
		$nameIndex = (!empty($nameIndex)) ?  $nameIndex : '';
		$nameIndex = substr(trim($nameIndex), 0, 1);
		$NameIndexVal = !ctype_alpha($nameIndex) ? '' : ucwords($nameIndex);
		if($nameIndex == "0") {
			$NameIndexVal = '';
		}elseif($nameIndex == "1"){
			$NameIndexVal = '#';
		} 
		$all = (empty($NameIndexVal)) ? TRUE : FALSE;
		{ //get start index for pages
			$limitRange = 300;
			$numberAnime = (empty($numberAnime) || !is_numeric($numberAnime)) ? 1 : $numberAnime ;  
			$TotalListPageAnime = AnimeListController::ListAllAnime($nameIndex,$all,$LimitRowPegination,300,0);
			$TotalListPageAnimeValue = $TotalListPageAnime->API_TheMovieRs->Body->TotalSearchPage;
			$starIndexAnime = $limitRange * ($numberAnime-1);
		}

		$ListAllAnime = AnimeListController::ListAllAnime($nameIndex,$all,$LimitRowPegination,$limitRange,$starIndexAnime);
		$StructurDataSeo = AnimeListController::StructurDataSeo();
		$DataMetaHeader = AnimeListController::DataMetaHeader();
		$trendingKeyword = '';
		$tagsKeyword = '';
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_ListAllAnime']= $ListAllAnime;
		$PTR_API['LimitRowPegination'] = $LimitRowPegination;
		$PTR_API['DataMetaHeader'] = $DataMetaHeader;
		$PTR_API['NameIndexVal'] = '0';
		$PTR_API['RefreshPage'] = TRUE;
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_anime',$PTR_API);
		$this->load->view('template_2/anime_list_txt');
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
					'url_detail' => base_url().'anime-list/',
					'url_search' => base_url().'anime-search/',
					'Title' => 'Anime List',
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
	

	public function ListAllAnime($nameIndex, $allIndex = FALSE, $LimitRowPegination, $limitRange, $starIndex){
		$params = [
            'params' => [
				'name_index' => $nameIndex,
				'all_index' => $allIndex,
				'min_row_pegination' => $LimitRowPegination,
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
            ]
		];
		$params = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->ListAllAnime($params);
		return $API_TheMovieRs;
	}

}