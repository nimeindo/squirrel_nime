<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeDetailController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
		$this->load->library('../controllers/Seo/SructurData');
		$this->load->library('../controllers/Helpers/HelpersController');
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
    }

    public function detailAnime($slug = null){
		$IdDetailAnime = strtok($slug, '-');
		if(!empty($slug)){
			$trendingKeyword = '';
			$tagsKeyword = '';
			$API_DetailAnime = AnimeDetailController::ApiDetailAnime($slug);
			$structurDataSeo = AnimeDetailController::StructurDataSeo($slug);
			$DataMetaHeader = AnimeDetailController::DataMetaHeader($API_DetailAnime);
			$PTR_API['TrendingKeyword'] = $trendingKeyword;
			$PTR_API['TagsKeyword'] = $tagsKeyword;
			$PTR_API['API_DetailAnime'] = $API_DetailAnime;
			$PTR_API['RefreshPage'] = TRUE;
			$PTR_API['SeoStructurData'] = $structurDataSeo;
			$PTR_API['DataMetaHeader'] = $DataMetaHeader;
			$this->load->view('template_2/nav/header',$PTR_API);
			$this->load->view('template_2/nav/header_anime',$PTR_API);
			$this->load->view('template_2/anime_des');
			$this->load->view('template_2/nav/footer');
		}else{
			redirect('/Home');
		}	
	}

	public function DataMetaHeader($API_DetailAnime){
		if($API_DetailAnime->API_TheMovieRs->Status == "Not Complete"){ 
			$DataMetaHeader = [
				"Description" => '',
				"Title" => '',
				"Image" => '',
				"Url" => ''
			];
		}else{
			foreach($API_DetailAnime->API_TheMovieRs->Body->SingleListAnime as $SingleListAnime){ 
				$slugDetail = $SingleListAnime->SlugDetail;
				foreach($SingleListAnime->ListDetail as $ListDetail){ 
					$DataMetaHeader = [
						"Description" => HelpersController::__normalizeString($ListDetail->Synopsis),
						"Title" => $SingleListAnime->Image,
						"Image" => $SingleListAnime->Image,
						"Url" => base_url().'anime-detail/des/'.$slugDetail
					];
				}
			}
		}
		

		return $DataMetaHeader;
	}
	
	public function StructurDataSeo($slug){	
		$ApiDetailAnime = AnimeDetailController::ApiDetailAnime($slug);
		$description = '';
		$imageUrl = '';
		$Title = "";
		$publishDate = '';
		if($ApiDetailAnime->API_TheMovieRs->Status == "Not Complete"){ 
		}else{
			foreach($ApiDetailAnime->API_TheMovieRs->Body->SingleListAnime as $SingleListAnime){
				$imageUrl = $SingleListAnime->Image;
				$Title = $SingleListAnime->Title;
				$publishDate = $SingleListAnime->PublishDate;
				foreach($SingleListAnime->ListDetail as $ListDetail){
					$description = $ListDetail->Synopsis;
				}
			
			}
		}
		{#Seo Structur data
				$param = array(
					'main_url' => base_url(),
					'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
					'url_detail' => base_url().'anime-detail/des/'.$slug,
					'url_search' => base_url().'anime-search/',
					'url_image_detail' => $imageUrl,
					'Title' => $Title,
					'date_published' => date(DATE_ISO8601, time()),
					'date_modified' => date(DATE_ISO8601, time()),
					'name_website' => 'Nimeindo',
					'Summary' => "Nimeindo - Nonton Streaming Anime Subtitle Indonesia Dan Baca Manga Indonesia",
					'description' => $description
				);
				
				$structurDataSeo = array(
					'Brand' => SructurData::Brand($param,false),
					'Webpage' => SructurData::WebPageDetail($param,false),
					
				);
			}
		return $structurDataSeo;
	}
	
	public function ApiDetailAnime($slug){
		$params = [
			'params' => [
				'id_detail' => '',
				'slug_detail' => $slug,
				'star_index_related' => 0,
				'limit_range_related' => 4,
			]
		];
		$paramsDetail = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->DetailAnime($paramsDetail);
		return $API_TheMovieRs;
	}

}