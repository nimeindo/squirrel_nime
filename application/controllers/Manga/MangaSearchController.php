<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MangaSearchController extends CI_Controller {

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
		
		// header('Cache-Control: no-cache,must-revalidate,max-age=0');
	}
	// dev
	public function search()
	{	
        $Keyword = (($this->input->get('KeyW') != null)) ? $this->input->get('KeyW') : "" ;   
        if(!empty($Keyword) ){
            $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
            $SearchManga = MangaSearchController::SearchManga($Keyword,'',12,0, $LimitRowPegination);
            $structurDataSeo = MangaSearchController::StructurDataSeo($Keyword);
            $DataMetaHeader = MangaSearchController::DataMetaHeader();
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['RefreshPage'] = TRUE;
            $PTR_API['KeywordSearch'] = $Keyword;
            $PTR_API['TitleHeadLine'] = "Search Manga ".$Keyword;
            $PTR_API['Status'] = 'manga';
            $PTR_API['API_SearchManga'] = $SearchManga;
            $PTR_API['LimitRowPegination'] = $LimitRowPegination;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_manga',$PTR_API);
            $this->load->view('template_2/manga_search',$PTR_API);
            $this->load->view('template_2/nav/footer');
            
        }else{
			redirect('');
		}
    }
    public function searchOngoing(){
            $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
            $status = 'Ong';
            $SearchManga = MangaSearchController::SearchManga("",$status,12,0, $LimitRowPegination);
            $structurDataSeo = MangaSearchController::StructurDataSeo("");
            $DataMetaHeader = MangaSearchController::DataMetaHeader();
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['RefreshPage'] = TRUE;
            $PTR_API['KeywordSearch'] = $status;
            $PTR_API['TitleHeadLine'] = "Manga Terbaru";
            $PTR_API['Status'] = $status;
            $PTR_API['API_SearchManga'] = $SearchManga;
            $PTR_API['LimitRowPegination'] = $LimitRowPegination;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_manga',$PTR_API);
            $this->load->view('template_2/manga_search',$PTR_API);
            $this->load->view('template_2/nav/footer');
    }

    public function Pages($keyword =null,$status = null,$numberManga){
        $Keyword = !empty($keyword) ? $keyword : "" ; 
        $numberAnime = (empty($numberAnime) || !is_numeric($numberAnime)) ? 1 : $numberAnime ;  
        if(!empty($Keyword) ){
            $status = ($status == 'Ong') ? 'Ong' : '';
            $Keyword = ($Keyword == 'Ong') ? '' : $Keyword;
            
            $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
            // ============================== APi Manga ================================
                $TotalSearchPageManga = MangaSearchController::SearchManga($Keyword,$status,12,0, $LimitRowPegination);
                $TotalSearchPageMangaValue = $TotalSearchPageManga->API_MangaRs->Body->TotalSearchPage;
                
                if($numberManga > $TotalSearchPageMangaValue){
                    $SearchManga = MangaSearchController::SearchManga($Keyword,$status,12,0, $LimitRowPegination);
                }else{
                    $starIndexManga = 12 * ($numberManga-1);
                    $SearchManga = MangaSearchController::SearchManga($Keyword,$status,12,$starIndexManga, $LimitRowPegination);
                    
                }
                
            // ==============================End APi Manga ================================
            $structurDataSeo = MangaSearchController::StructurDataSeo($Keyword);
            $DataMetaHeader = MangaSearchController::DataMetaHeader();
            $status = (empty($status)) ? 'manga' : $status;
            $Keyword = (empty($Keyword)) ? 'Ong' : $Keyword;
            $TitleHeadLine = ($status == 'Ong') ? 'Anime Terbaru' : "Search Anime ".$Keyword;;
            $PTR_API['TrendingKeyword'] = '';
            $PTR_API['TagsKeyword'] = '';
            $PTR_API['RefreshPage'] = TRUE;
            $PTR_API['KeywordSearch'] = $Keyword;
            $PTR_API['TitleHeadLine'] = $TitleHeadLine;
            $PTR_API['Status'] = $status;
            $PTR_API['API_SearchManga'] = $SearchManga;
            $PTR_API['LimitRowPegination'] = $LimitRowPegination;
            $PTR_API['SeoStructurData'] = $structurDataSeo;
            $PTR_API['DataMetaHeader'] = $DataMetaHeader;
            $this->load->view('template_2/nav/header',$PTR_API);
            $this->load->view('template_2/nav/header_manga',$PTR_API);
            $this->load->view('template_2/manga_search',$PTR_API);
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

    public function SearchManga($Keyword, $Status ,$limitRange, $startIndex, $LimitRowPegination){
        $paramsSearch = [
            'params' => [
                'keyword' => $Keyword,
                'status' => $Status,
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
					'url_detail' => base_url().'manga-search/',
                    'url_page' => base_url().'manga-search/?KeyW='.$keyword,
                    'url_search' => base_url().'manga-search/',
					'Title' => 'Manga Search',
					'date_published' => date(DATE_ISO8601, time()),
					'date_modified' => date(DATE_ISO8601, time()),
					'name_website' => 'Nimeindo',
					'Summary' => "Your Manga Search ".$keyword,
					'description' => 'Kumpulan Manga Terbaru Substitle Indonesia'
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