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
		$this->load->library('../controllers/Seo/SructurData');
	}
	// dev
	public function description($slugDetail)
	{	$trendingKeyword = '';
        $tagsKeyword ='';
        $DetailManga = MangaDetailController::DetailManga($slugDetail);
        
        $structurDataSeo = MangaDetailController::StructurDataSeo();
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
        $structurDataSeo = MangaDetailController::StructurDataSeo();
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
    
    
}