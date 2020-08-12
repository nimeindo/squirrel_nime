<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MangaDetailController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->model('MangaModel');
		$this->load->helper('date');
		$this->load->library('../controllers/Seo/SructurData');
	}
	// dev
	public function description($slugDetail)
	{	$trendingKeyword = '';
        $tagsKeyword ='';
        $DetailManga = MangaDetailController::DetailManga($slugDetail);
        
        $structurDataSeo = MangaDetailController::StructurDataSeo($slugDetail,'des');
        $PTR_API['SeoStructurData'] = $structurDataSeo;
        $PTR_API['TrendingKeyword'] = $trendingKeyword;
        $PTR_API['API_DetailManga'] = $DetailManga;
		$PTR_API['TagsKeyword'] = $tagsKeyword;
		$PTR_API['RefreshPage'] = TRUE;
        $this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_manga',$PTR_API);
		$this->load->view('template_2/manga_des',$PTR_API);
		$this->load->view('template_2/nav/footer');
    }

    public function listChapter($slugDetail){	
        $trendingKeyword = '';
        $tagsKeyword ='';
        $DetailManga = MangaDetailController::DetailManga($slugDetail);
        $structurDataSeo = MangaDetailController::StructurDataSeo($slugDetail,'chap');
        $PTR_API['SeoStructurData'] = $structurDataSeo;
        $PTR_API['TrendingKeyword'] = $trendingKeyword;
        $PTR_API['API_DetailManga'] = $DetailManga;
        $PTR_API['TagsKeyword'] = $tagsKeyword;
        $PTR_API['RefreshPage'] = TRUE;
        $this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_manga',$PTR_API);
		$this->load->view('template_2/manga_chap',$PTR_API);
		$this->load->view('template_2/nav/footer');
    }

    public function DetailManga($slugDetail){
        $LimitRowPegination = 2;
		$params = [
            'params' => [
				'slug_detail' => $slugDetail,
				'star_index_related' => 0,
				'limit_range_related' => 6,
            ]
		];
		$params = json_encode($params);
		$API_MangaRs = $this->MangaModel->DetailManga($params);
		return $API_MangaRs;
    }
    public function StructurDataSeo($slug,$rootDetail){	
		$API_DetailManga = MangaDetailController::DetailManga($slug);
		$description = '';
		$imageUrl = '';
		$Title = "";
		$publishDate = '';
		if($API_DetailManga->API_MangaRs->Status == "Not Complete"){ 
		 }else{
			foreach($API_DetailManga->API_MangaRs->Body->SingleListManga as $key => $API_DetailMangaV){ 
				$Title = $API_DetailMangaV->Title;
				$imageUrl = $API_DetailMangaV->Image;
				$publishDate = $API_DetailMangaV->PublishDate;
				foreach($API_DetailMangaV->ListDetail as $ListV){
					$description = $ListV->Synopsis;
				}
			}
		}

		{#Seo Structur data
			$param = array(
				'main_url' => base_url(),
				'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
				'url_detail' => base_url().'manga-detail/'.$rootDetail.'/'.$slug,
				'url_search' => base_url().'manga-search/',
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
    
    
}