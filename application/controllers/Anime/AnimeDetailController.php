<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeDetailController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
		$this->load->library('../controllers/Seo/SructurData');
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
    }

    public function detailAnime($slug = null){
		$IdDetailAnime = strtok($slug, '-');
		if(!empty($slug)){
			$trendingKeyword = '';
			$tagsKeyword = '';
			$API_DetailAnime = AnimeDetailController::ApiDetailAnime($slug);
			$structurDataSeo = AnimeDetailController::StructurDataSeo($slug);
			$PTR_API['TrendingKeyword'] = $trendingKeyword;
			$PTR_API['TagsKeyword'] = $tagsKeyword;
			$PTR_API['API_DetailAnime'] = $API_DetailAnime;
			$PTR_API['RefreshPage'] = TRUE;
			$PTR_API['SeoStructurData'] = $structurDataSeo;
			$this->load->view('template_2/nav/header',$PTR_API);
			$this->load->view('template_2/nav/header_anime',$PTR_API);
			$this->load->view('template_2/anime_des');
			$this->load->view('template_2/nav/footer');
		}else{
			redirect('/Home');
		}	
	}
	
	public function StructurDataSeo($slug){	
		$ApiDetailAnime = AnimeDetailController::ApiDetailAnime($slug);
		$description = '';
		$imageUrl = '';
		$publishDate = '';
		if($ApiDetailAnime->API_TheMovieRs->Status == "Not Complete"){ 
		}else{
			foreach($ApiDetailAnime->API_TheMovieRs->Body->SingleListAnime as $SingleListAnime){
				$imageUrl = $SingleListAnime->Image;
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
					'name_website' => 'Nimeindo',
					'name_page' => str_replace('-',' ',str_replace('/','',$_SERVER['REQUEST_URI'])).' - ',
					'publish_date' => !empty($publishDate) ? $publishDate : '2020-04-22T23:40',
					'image_url' => $imageUrl,
					'description' => $description,
				);
				
				$structurDataSeo = array(
					'Website' => SructurData::Website($param,false),
					'Webpage' => SructurData::WebPage($param,false),
					// 'Organization' => SructurData::Organization(null,True),
					'CollectionPage' => SructurData::CollectionPage($param,false),
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