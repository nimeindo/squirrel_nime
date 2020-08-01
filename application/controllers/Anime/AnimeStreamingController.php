<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeStreamingController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
		$this->load->library('../controllers/Seo/SructurData');
		
    }

    public function Streaming($slug = null){
        $slug = (!empty($slug)) ?  $slug : '';
        if(!empty($slug)){
            $Streaming = AnimeStreamingController::StreamAnime($slug);
            // echo json_encode($Streaming); exit;
            $structurDataSeo = AnimeStreamingController::StructurDataSeo();
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['API_Streaming'] = $Streaming;
            $PTR_API['RefreshPage'] = FALSE;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_anime',$PTR_API);
            $this->load->view('template_2/anime_streaming');
            $this->load->view('template_2/nav/footer');
        }else{

        }
        

    }


    public function StreamAnime($slug){
        $params = [
            'params' => [
                'slug_eps' => $slug,
            ]
        ];
        $StreamAnime = $this->AnimeModel->StreamAnime(json_encode($params));
        return $StreamAnime;
    }

    public function StructurDataSeo(){
        {#Seo Structur data
			$param = array(
				'main_url' => base_url(),
				'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
				'name_website' => 'Nimeindo',
				'name_page' => str_replace('-',' ',str_replace('/','',$_SERVER['REQUEST_URI'])).' - ',
				'publish_date' => !empty($publishDate) ? $publishDate : '2020-04-22T23:40',
				'image_url' => '',
				'description' => '',
			);
			
			$structurDataSeo = array(
				'Website' => SructurData::Website($param,false),
				'Webpage' => SructurData::WebPage($param,false),
				// 'Article' => SructurData::Article($param,false),
				// 'Organization' => SructurData::Organization(null,True),
				'CollectionPage' => SructurData::CollectionPage($param,false),
			);
		}
    }
}