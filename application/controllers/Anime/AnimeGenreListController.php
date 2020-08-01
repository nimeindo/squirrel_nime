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
		$trendingKeyword = '';
		$tagsKeyword = '';
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_GenreListAllAnime']= $GenreListAnime;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['SeoStructurData'] = $StructurDataSeo;
        $this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_anime',$PTR_API);
		$this->load->view('template_2/anime_genre_list_txt');
		$this->load->view('template_2/nav/footer');
    }
    
    public function StructurDataSeo(){
		{#Seo Structur data
			$param = array(
				'main_url' => base_url(),
				'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
				'name_website' => 'Nimeindo',
				'name_page' => str_replace('-',' ',str_replace('/','',$_SERVER['REQUEST_URI'])).' - ',
				'description' => "Nonton Streaming Anime Sub Indonesia",
				'publish_date' => '2020-04-22T23:40',
				'image_url' => '',
			);
			$structurDataSeo = array(
				'Website' => SructurData::Website($param,false),
				'Webpage' => SructurData::WebPage($param,false,True),
				// 'Organization' => SructurData::Organization(null,True),
				'CollectionPage' => SructurData::CollectionPage($param,false),
			);
		}
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