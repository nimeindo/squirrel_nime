<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeSearchController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
        $this->load->library('user_agent');
        $this->load->helper('date');
		$this->load->model('AnimeModel');
		$this->load->library('../controllers/Seo/SructurData');
		
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
	}
	// dev
	public function search()
	{	
        $Keyword = (($this->input->get('KeyW') != null)) ? $this->input->get('KeyW') : "" ;   
        if(!empty($Keyword)){
            $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
            $SearchAnime = AnimeSearchController::SearchAnime($Keyword,'',12,0, $LimitRowPegination);
            $structurDataSeo = AnimeSearchController::StructurDataSeo($Keyword);
            $DataMetaHeader = AnimeSearchController::DataMetaHeader();
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['Status'] = 'anime';
            $PTR_API['RefreshPage'] = TRUE;
            $PTR_API['KeywordSearch'] = $Keyword;
            $PTR_API['TitleHeadLine'] = "Search Anime ".$Keyword;
            $PTR_API['API_SearchAnime'] = $SearchAnime;
            $PTR_API['LimitRowPegination'] = $LimitRowPegination;
            $PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_anime',$PTR_API);
            $this->load->view('template_2/anime_search',$PTR_API);
            $this->load->view('template_2/nav/footer');
        }else{
			redirect('');
		}
    }
    public function searchOngoing()
	{	
        $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
        $status = 'Ong';
        $SearchAnime = AnimeSearchController::SearchAnime("",$status,12,0, $LimitRowPegination);
        $structurDataSeo = AnimeSearchController::StructurDataSeo("");
        $DataMetaHeader = AnimeSearchController::DataMetaHeader();
        $PTR_API['TrendingKeyword'] = '';
        $PTR_API['TagsKeyword'] = '';
        $PTR_API['RefreshPage'] = TRUE;
        $PTR_API['KeywordSearch'] = $status;
        $PTR_API['TitleHeadLine'] = "Anime Terbaru";
        $PTR_API['Status'] = $status;
        $PTR_API['API_SearchAnime'] = $SearchAnime;
        $PTR_API['LimitRowPegination'] = $LimitRowPegination;
        $PTR_API['SeoStructurData'] = $structurDataSeo;
        $PTR_API['DataMetaHeader'] = $DataMetaHeader;
        $this->load->view('template_2/nav/header',$PTR_API);
        $this->load->view('template_2/nav/header_anime',$PTR_API);
        $this->load->view('template_2/anime_search',$PTR_API);
        $this->load->view('template_2/nav/footer');
    }

    public function Pages($keyword = null,$status = null, $numberAnime = null){
        $Keyword = !empty($keyword) ? $keyword : "" ; 
        $numberAnime = (empty($numberAnime) || !is_numeric($numberAnime)) ? 1 : $numberAnime ;  
        if(!empty($Keyword)){
            $status = ($status == 'Ong') ? 'Ong' : '';
            $Keyword = ($Keyword == 'Ong') ? '' : $Keyword;
            $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
            // ============================== APi Anime ================================
                $TotalSearchPageAnime = AnimeSearchController::SearchAnime($Keyword,$status,12,0, $LimitRowPegination);
                $TotalSearchPageAnimeValue = $TotalSearchPageAnime->API_TheMovieRs->Body->TotalSearchPage;
                if($numberAnime > $TotalSearchPageAnimeValue){
                    $SearchAnime = AnimeSearchController::SearchAnime($Keyword,$status,12,0, $LimitRowPegination);
                }else{
                    $starIndexAnime = 12 * ($numberAnime-1);
                    $SearchAnime = AnimeSearchController::SearchAnime($Keyword,$status,12,$starIndexAnime, $LimitRowPegination);
                }
            // ============================== End APi Anime ================================
            
            $structurDataSeo = AnimeSearchController::StructurDataSeo($Keyword);
            $DataMetaHeader = AnimeSearchController::DataMetaHeader();
            $TitleHeadLine = ($status == 'Ong') ? 'Anime Terbaru' : "Search Anime ".$Keyword;;
            $status = (empty($status)) ? 'anime' : $status;
            $Keyword = (empty($Keyword)) ? 'Ong' : $Keyword;
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['RefreshPage'] = TRUE;
            $PTR_API['KeywordSearch'] = $Keyword;
            $PTR_API['TitleHeadLine'] = $TitleHeadLine;
            $PTR_API['Status'] = $status;
            $PTR_API['API_SearchAnime'] = $SearchAnime;
            $PTR_API['LimitRowPegination'] = $LimitRowPegination;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_anime',$PTR_API);
            $this->load->view('template_2/anime_search',$PTR_API);
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
    public function SearchAnime($Keyword, $Status,$limitRange, $startIndex, $LimitRowPegination){
        $paramsSearch = [
            'params' => [
                'keyword' => $Keyword,
                "status" => $Status,
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
 
    public function StructurDataSeo($keyword){	
		
		$publishDate = '';
		{#Seo Structur data
				$param = array(
					'main_url' => base_url(),
					'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
                    'url_detail' => base_url().'anime-search/',
                    'url_page' => base_url().'anime-search/?KeyW='.$keyword,
					'url_search' => base_url().'anime-search/',
					'Title' => 'Anime Search',
					'date_published' => date(DATE_ISO8601, time()),
					'date_modified' => date(DATE_ISO8601, time()),
					'name_website' => 'Nimeindo',
					'Summary' => "Your Anime Search ".$keyword,
					'description' => 'Kumpulan Anime Terbaru Substitle Indonesia'
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