<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchHomeController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->model('AnimeModel');
		$this->load->model('MangaModel');
		$this->load->library('../controllers/Seo/SructurData');
		
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
	}
	// dev
	public function search()
	{	
        $Keyword = (($this->input->get('KeyW') != null)) ? $this->input->get('KeyW') : "" ;   
        if(!empty($Keyword)){
            $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
            
            $SearchAnime = SearchHomeController::SearchAnime($Keyword,12,0, $LimitRowPegination);
            $SearchManga = SearchHomeController::SearchManga($Keyword,12,0, $LimitRowPegination);
            $structurDataSeo = SearchHomeController::StructurDataSeo($Keyword);
            $DataMetaHeader = SearchHomeController::DataMetaHeader();
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['RefreshPage'] = TRUE;
            $PTR_API['KeywordSearch'] = $Keyword;
            $PTR_API['API_SearchAnime'] = $SearchAnime;
            $PTR_API['API_SearchManga'] = $SearchManga;
            $PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $PTR_API['LimitRowPegination'] = $LimitRowPegination;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_main',$PTR_API);
            $this->load->view('template_2/home_search',$PTR_API);
            $this->load->view('template_2/nav/footer');
            
        }else{
			redirect('');
		}
    }

    public function Pages($keyword,$numberManga,$numberAnime){
        $Keyword = !empty($keyword) ? $keyword : "" ; 
        $numberAnime = (empty($numberAnime) || !is_numeric($numberAnime)) ? 1 : $numberAnime ;  
        $numberManga = (empty($numberManga) || !is_numeric($numberManga)) ? 1 : $numberManga ; 
        if(!empty($Keyword)){
            $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
            // ============================== APi Manga ================================
                $TotalSearchPageManga = SearchHomeController::SearchManga($Keyword,12,0, $LimitRowPegination);
                $TotalSearchPageMangaValue = $TotalSearchPageManga->API_MangaRs->Body->TotalSearchPage;
                
                if($numberManga > $TotalSearchPageMangaValue){
                    $SearchManga = SearchHomeController::SearchManga($Keyword,12,0, $LimitRowPegination);
                }else{
                    $starIndexManga = 12 * ($numberManga-1);
                    $SearchManga = SearchHomeController::SearchManga($Keyword,12,$starIndexManga, $LimitRowPegination);
                }
            // ==============================End APi Manga ================================

            // ============================== APi Anime ================================
                $TotalSearchPageAnime = SearchHomeController::SearchAnime($Keyword,12,0, $LimitRowPegination);
                $TotalSearchPageAnimeValue = $TotalSearchPageAnime->API_TheMovieRs->Body->TotalSearchPage;
                if($numberAnime > $TotalSearchPageAnimeValue){
                    $SearchAnime = SearchHomeController::SearchAnime($Keyword,12,0, $LimitRowPegination);
                }else{
                    $starIndexAnime = 12 * ($numberAnime-1);
                    $SearchAnime = SearchHomeController::SearchAnime($Keyword,12,$starIndexAnime, $LimitRowPegination);
                }
            // ============================== End APi Anime ================================
            
            $structurDataSeo = SearchHomeController::StructurDataSeo($Keyword);
            $DataMetaHeader = SearchHomeController::DataMetaHeader();
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['RefreshPage'] = TRUE;
            $PTR_API['KeywordSearch'] = $Keyword;
            $PTR_API['API_SearchAnime'] = $SearchAnime;
            $PTR_API['API_SearchManga'] = $SearchManga;
            $PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $PTR_API['LimitRowPegination'] = $LimitRowPegination;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_main',$PTR_API);
            $this->load->view('template_2/home_search',$PTR_API);
            $this->load->view('template_2/nav/footer');
        }
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

    public function SearchAnime($Keyword, $limitRange, $startIndex, $LimitRowPegination){
        $paramsSearch = [
            'params' => [
                'keyword' => $Keyword,
                'limit_range' => $limitRange,
                'star_index' => $startIndex,
                'min_row_pegination' => $LimitRowPegination,
                'is_updated' => TRUE
            ]
        ];
        $paramsSearch = json_encode($paramsSearch);
        $SearchAnime = $this->AnimeModel->SearchAnime($paramsSearch);
        return $SearchAnime;
    }

    public function SearchManga($Keyword, $limitRange, $startIndex, $LimitRowPegination){
        $paramsSearch = [
            'params' => [
                'keyword' => $Keyword,
                'limit_range' => $limitRange,
                'star_index' => $startIndex,
                'min_row_pegination' => $LimitRowPegination,
                'is_updated' => TRUE
            ]
        ];
        $paramsSearch = json_encode($paramsSearch);
        $SearchManga = $this->MangaModel->SearchManga($paramsSearch);
        return $SearchManga;
    }
 
    public function StructurDataSeo($keyword){	
		
		$publishDate = '';
		{#Seo Structur data
				$param = array(
					'main_url' => base_url(),
					'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
					'url_detail' => base_url().'search/',
                    'url_page' => base_url().'search/?KeyW='.$keyword,
                    'url_search' => base_url().'search/',
					'Title' => 'Manga And Anime Search',
					'date_published' => date(DATE_ISO8601, time()),
					'date_modified' => date(DATE_ISO8601, time()),
					'name_website' => 'Nimeindo',
					'Summary' => "Your Manga And Anime Search ".$keyword,
					'description' => 'Kumpulan Manga dan Anime Terbaru Substitle Indonesia'
				);
				
				$structurDataSeo = array(
					'Brand' => SructurData::Brand($param,false),
                    'SearchResultsPage' => SructurData::SearchResultsPage($param, false),
					'Webpage' => SructurData::WebPage($param,false),
					
				);
		}
		return $structurDataSeo;
	}
}