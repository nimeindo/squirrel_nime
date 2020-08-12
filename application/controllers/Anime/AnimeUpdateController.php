<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeUpdateController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
		$this->load->library('user_agent');
		$this->load->helper('date');
		$this->load->library('../controllers/Seo/SructurData');
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
    }
    public function index(){
		$LimitRowPegination =  ($this->agent->is_mobile()) ? 2 : 4;
		$structurDataSeo = AnimeUpdateController::StructurDataSeo();
		$API_LastUpdateAnime = AnimeUpdateController::LastUpdateAnime(18,0,$LimitRowPegination);
        $PTR_API['TrendingKeyword'] = '';
		$PTR_API['TagsKeyword'] = '';
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['API_LastUpdateAnime'] = $API_LastUpdateAnime;
		$PTR_API['LimitRowPegination'] = $LimitRowPegination;
		$PTR_API['SeoStructurData'] = $structurDataSeo;
		
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_anime',$PTR_API);
		$this->load->view('template_2/anime_update',$PTR_API);
		$this->load->view('template_2/nav/footer');
	}
	
	
	
	public function Pages($PageNumber = null){
		$PageNumber = !empty($PageNumber) ? $PageNumber : "" ; 
		
		if(!empty($PageNumber)){
			$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
			$TotalSearchPage = AnimeUpdateController::LastUpdateAnime(18,0, $LimitRowPegination);
			$TotalSearchPageValue = $TotalSearchPage->API_TheMovieRs->Body->TotalSearchPage;
			if($PageNumber > $TotalSearchPageValue){
				$API_LastUpdateAnime = AnimeUpdateController::LastUpdateAnime(18,0, $$LimitRowPegination);
			}else{
				$starIndex = 18 * ($PageNumber-1);
				$API_LastUpdateAnime = AnimeUpdateController::LastUpdateAnime(18,$starIndex, $LimitRowPegination);
			}
			$structurDataSeo = AnimeUpdateController::StructurDataSeo();
			$trendingKeyword = '';
			$tagsKeyword = '';
			
			
			$PTR_API['TrendingKeyword'] = $trendingKeyword;
			$PTR_API['TagsKeyword'] = $tagsKeyword;
            $PTR_API['API_LastUpdateAnime'] = $API_LastUpdateAnime;
			$PTR_API['PageNumberNow'] = $PageNumber;
			$PTR_API['RefreshPage'] = FALSE;
			$PTR_API['LimitRowPegination'] = $LimitRowPegination;
			$PTR_API['SeoStructurData'] = $structurDataSeo;
			$this->load->view('template_2/nav/header',$PTR_API);
			$this->load->view('template_2/nav/header_anime',$PTR_API);
			$this->load->view('template_2/anime_update',$PTR_API);
			$this->load->view('template_2/nav/footer');
		}else{
			redirect('');
		}
		
	}

	public function LastUpdateAnime($limitRange,$starIndex,$LimitRowPegination){
		$params = [
            'params' => [
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
				'min_row_pegination' => $LimitRowPegination,
				'is_updated' => TRUE
            ]
		];
		
		$params = json_encode($params);
		$API_TheMovieRs = $this->AnimeModel->lastUpdateAnime($params);
		return $API_TheMovieRs;
	}

    public function StructurDataSeo(){	
		
		$publishDate = '';
		{#Seo Structur data
				$param = array(
					'main_url' => base_url(),
					'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
					'url_detail' => base_url().'anime-update/',
					'url_search' => base_url().'anime-search/',
					'Title' => 'Anime Update',
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
}