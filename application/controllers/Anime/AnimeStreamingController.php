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
        $this->load->helper('date');
		$this->load->library('../controllers/Seo/SructurData');
		
    }

    public function Streaming($slug = null){
        $slug = (!empty($slug)) ?  $slug : '';
        if(!empty($slug)){
            $Streaming = AnimeStreamingController::StreamAnime($slug);
			$structurDataSeo = AnimeStreamingController::StructurDataSeo($slug);
			$DataMetaHeader = AnimeStreamingController::DataMetaHeader($Streaming);
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['API_Streaming'] = $Streaming;
            $PTR_API['RefreshPage'] = FALSE;
			$PTR_API['SeoStructurData'] = $structurDataSeo;
			$PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_anime',$PTR_API);
            $this->load->view('template_2/anime_streaming');
            $this->load->view('template_2/nav/footer');
        }else{

        }
        

    }
	public function DataMetaHeader($API_Streaming){
		if($API_Streaming->API_TheMovieRs->Status == "Not Complete"){ 
			$DataMetaHeader = [
				"Description" => '',
				"Title" => '',
				"Image" => '',
				"Url" => ''
			];
		}else{
			foreach($API_Streaming->API_TheMovieRs->Body->StreamAnime as $StreamAnime){ 
				$SlugEpNow = $StreamAnime->SlugEp;
				foreach($StreamAnime->ListDetail as $ListDetail){
					$DataMetaHeader = [
						"Description" => str_replace('nanime.org', 'nimeindo.net',$ListDetail->Synopsis),
						"Title" => $StreamAnime->Title,
						"Image" => $StreamAnime->Image,
						"Url" => base_url().'anime/streaming/'.$SlugEpNow
					];
				}
				
			}
		}
		return $DataMetaHeader;
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

    public function StructurDataSeo($slug){	
		$Streaming = AnimeStreamingController::StreamAnime($slug);
		$description = '';
		$imageUrl = '';
		$Title = "";
		$publishDate = '';
		if($Streaming->API_TheMovieRs->Status == "Not Complete"){ 
		}else{
			foreach($Streaming->API_TheMovieRs->Body->StreamAnime as $StreamAnime){
				$Title = $StreamAnime->Title;
                $imageUrl = $StreamAnime->Image; 
				foreach($StreamAnime->ListDetail as $ListDetail){
                    $description = str_replace('nanime.org', 'nimeindo.net',$ListDetail->Synopsis);
                    
				}
			
			}
		}
		{#Seo Structur data
				$param = array(
					'main_url' => base_url(),
					'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
					'url_detail' => base_url().'anime-streaming/'.$slug,
					'url_search' => base_url().'anime-search/',
					'url_image_detail' => $imageUrl,
                    'title_episode' => $Title,
                    'Title' => $Title,
                    'name_author' => $Title,
					'date_published' => date(DATE_ISO8601, time()),
					'date_modified' => date(DATE_ISO8601, time()),
					'name_website' => 'Nimeindo',
					'Summary' => "Nimeindo - Nonton Streaming Anime Subtitle Indonesia Dan Baca Manga Indonesia",
					'description' => $description
				);
				
				$structurDataSeo = array(
					'Brand' => SructurData::Brand($param,false),
					'Webpage' => SructurData::Webpage($param,false),
					'Article' => SructurData::Article($param,false),
				);
			}
		return $structurDataSeo;
	}
}