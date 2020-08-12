<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MangaReaderController extends CI_Controller {

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

    public function MangaRead($slug){
		$slug = !empty($slug) ? $slug : "" ; 
		if(!empty($slug) ||  isset($slug)){
			$ApiChapterManga = MangaReaderController::ApiChapterManga($slug);
			// echo json_encode($ApiChapterManga);exit;
			$structurDataSeo = MangaReaderController::StructurDataSeo();
			$PTR_API['SeoStructurData'] = $structurDataSeo;
			$PTR_API['TrendingKeyword'] = '';
			$PTR_API['TagsKeyword'] = '';
			$PTR_API['RefreshPage'] = TRUE;
			$PTR_API['Api_ChapterManga'] = $ApiChapterManga;
			$this->load->view('template_2/nav/header',$PTR_API);
			$this->load->view('template_2/nav/header_reader',$PTR_API);
			$this->load->view('template_2/manga_read',$PTR_API);
			$this->load->view('template_2/nav/footer_reader');
		}else{
			redirect("");
		}
		
    }

    public function  ApiChapterManga($slug){
        $paramsSearch = [
            'params' => [
                'slug_chapter' => $slug,
            ]
        ];
        $paramsSearch = json_encode($paramsSearch);
        $ChapterManga = $this->MangaModel->ChapterManga($paramsSearch);
        return $ChapterManga;
    }

    public function StructurDataSeo(){
		{#Seo Structur data
			$param = array(
				'main_url' => base_url(),
				'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
				'name_website' => 'Nimeindo',
				'Summary' => "Nimeindo - Nonton Streaming Anime Subtitle Indonesia Dan Baca Manga Indonesia",
				'description' => "NimeIndo adalah website dimana kalian bisa nonton anime subtitle indonesia dan baca manga terlengkap dan terupdate dengan koleksi dari berbagai genre."
			);
			$structurDataSeo = [
				'Brand' => SructurData::Brand($param,false),
				'CollectionPage' => SructurData::CollectionPage($param,false),
				'WebPage' => SructurData::WebPage($param,false),
			];
		}

		return $structurDataSeo;
	}

}
