<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MangaListController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('MangaModel');
		$this->load->library('user_agent');
		$this->load->library('../controllers/Seo/SructurData');
		header('Cache-Control: no-cache,must-revalidate,max-age=0');
    }

    public function mangaListTxt($nameIndex = null){
		$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
		$nameIndex = (!empty($nameIndex)) ?  $nameIndex : 0;
		$nameIndex = substr(trim($nameIndex), 0, 1);
		$NameIndexVal = !ctype_alpha($nameIndex) ? '' : ucwords($nameIndex);
		if($nameIndex == "0") {
			$NameIndexVal = '';
		}elseif($nameIndex == "1"){
			$NameIndexVal = '#';
		}
		$all = (empty($NameIndexVal)) ? TRUE : FALSE;
		
		$ListManga = MangaListController::ListManga($NameIndexVal,$all,$LimitRowPegination,350,0);
		$StructurDataSeo = MangaListController::StructurDataSeo();
		$trendingKeyword = '';
		$tagsKeyword = '';
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_ListManga']= $ListManga;
		$PTR_API['NameIndexVal'] = $nameIndex;
		$PTR_API['LimitRowPegination'] = $LimitRowPegination;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['SeoStructurData'] = $StructurDataSeo;
        $this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_manga',$PTR_API);
		$this->load->view('template_2/manga_list_txt');
		$this->load->view('template_2/nav/footer');
    }

    public function pagesTxt($nameIndex, $numberManga){
		$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
		$nameIndex = (!empty($nameIndex)) ?  $nameIndex : 0;
		$nameIndex = substr(trim($nameIndex), 0, 1);
		$NameIndexVal = !ctype_alpha($nameIndex) ? '' : ucwords($nameIndex);
		if($nameIndex == "0") {
			$NameIndexVal = '';
		}elseif($nameIndex == "1"){
			$NameIndexVal = '#';
		}
		$all = (empty($NameIndexVal)) ? TRUE : FALSE;
		{ //get start index for pages
			$limitRange = 300;
			$numberManga = (empty($numberManga) || !is_numeric($numberManga)) ? 1 : $numberManga ;  
			$TotalListPage = MangaListController::ListManga($nameIndex,$all,$LimitRowPegination,300,0);
			$TotalListPageValue = $TotalListPage->API_MangaRs->Body->TotalSearchPage;
			$starIndex = $limitRange * ($numberManga-1);
		}

		$ListManga = MangaListController::ListManga($nameIndex,$all,$LimitRowPegination,$limitRange,$starIndex);
		$StructurDataSeo = MangaListController::StructurDataSeo();
		$trendingKeyword = '';
		$tagsKeyword = '';
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_ListManga']= $ListManga;
		$PTR_API['LimitRowPegination'] = $LimitRowPegination;
		$PTR_API['NameIndexVal'] = $nameIndex;
		$PTR_API['RefreshPage'] = TRUE;
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_manga',$PTR_API);
		$this->load->view('template_2/manga_list_txt');
		$this->load->view('template_2/nav/footer');
    }
    

    public function mangaListImg(){
        $nameIndex = ($this->input->post('nameIndex')) != null ? $this->input->post('nameIndex') : 0;
        $limitRange = ($this->input->post('limitRange')) != null ? $this->input->post('limitRange') : 100;
        $LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
		$nameIndex = substr(trim($nameIndex), 0, 1);
		$NameIndexVal = !ctype_alpha($nameIndex) ? '' : ucwords($nameIndex);
		if($nameIndex == "0") {
			$NameIndexVal = '';
		}elseif($nameIndex == "1"){
			$NameIndexVal = '#';
		}
		$all = (empty($NameIndexVal)) ? TRUE : FALSE;
		$ListManga = MangaListController::ListManga($NameIndexVal,$all,$LimitRowPegination,$limitRange,0);
		$StructurDataSeo = MangaListController::StructurDataSeo();
		$trendingKeyword = '';
        $tagsKeyword = '';
        
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_ListManga']= $ListManga;
        $PTR_API['NameIndexVal'] = $nameIndex;
        $PTR_API['limitRange'] = $limitRange;
        $PTR_API['DataLimitRange'] = MangaListController::DataLimitRange();
		$PTR_API['LimitRowPegination'] = $LimitRowPegination;
		$PTR_API['RefreshPage'] = TRUE;
		$PTR_API['SeoStructurData'] = $StructurDataSeo;
        $this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_manga',$PTR_API);
		$this->load->view('template_2/manga_list_img');
		$this->load->view('template_2/nav/footer');
	}

    public function pagesImg($nameIndex, $numberManga, $limitRange){
		$LimitRowPegination = ($this->agent->is_mobile()) ? 2 : 4;
		$nameIndex = (!empty($nameIndex)) ?  $nameIndex : '';
		$nameIndex = substr(trim($nameIndex), 0, 1);
		$NameIndexVal = !ctype_alpha($nameIndex) ? '' : ucwords($nameIndex);
		if($nameIndex == "0") {
			$NameIndexVal = '';
		}elseif($nameIndex == "1"){
			$NameIndexVal = '#';
		}
		$all = (empty($NameIndexVal)) ? TRUE : FALSE;
		{ //get start index for pages
			// $limitRange = 300;
            $numberManga = (empty($numberManga) || !is_numeric($numberManga)) ? 1 : $numberManga ;  
            $limitRange = (empty($limitRange) || !is_numeric($limitRange)) ? 10 : $limitRange ;  
			$TotalListPage = MangaListController::ListManga($nameIndex,$all,$LimitRowPegination,$limitRange,0);
			$TotalListPageValue = $TotalListPage->API_MangaRs->Body->TotalSearchPage;
			$starIndex = $limitRange * ($numberManga-1);
		}

		$ListManga = MangaListController::ListManga($nameIndex,$all,$LimitRowPegination,$limitRange,$starIndex);
		$StructurDataSeo = MangaListController::StructurDataSeo();
		$trendingKeyword = '';
		$tagsKeyword = '';
		$PTR_API['TrendingKeyword'] = $trendingKeyword;
		$PTR_API['TagsKeyword'] = $trendingKeyword;
		$PTR_API['API_ListManga']= $ListManga;
		$PTR_API['LimitRowPegination'] = $LimitRowPegination;
        $PTR_API['NameIndexVal'] = $nameIndex;
        $PTR_API['limitRange'] = $limitRange;
        $PTR_API['DataLimitRange'] = MangaListController::DataLimitRange();
		$PTR_API['RefreshPage'] = TRUE;
		$this->load->view('template_2/nav/header',$PTR_API);
		$this->load->view('template_2/nav/header_manga',$PTR_API);
		$this->load->view('template_2/manga_list_img');
		$this->load->view('template_2/nav/footer');
    }
    
    public function DataLimitRange(){
        return $DataLimitRange = [50,150,100,200,300];
    }
	
	public function StructurDataSeo(){
		{#Seo Structur data
			$param = array(
				'main_url' => base_url(),
				'url' => rtrim(base_url(),'/').$_SERVER['REQUEST_URI'],
				'name_website' => 'Nimeindo',
				'name_page' => str_replace('-',' ',str_replace('/','',$_SERVER['REQUEST_URI'])).' - ',
				'description' => "Nonton Streaming manga Sub Indonesia",
				'publish_date' => '2020-04-22T23:40',
				'image_url' => '',
			);
			$structurDataSeo = array(
				'Website' => SructurData::Website($param,false),
				'Webpage' => SructurData::WebPage($param,false,True),
				// 'Organization' => SructurData::Organization(null,True),
				'CollectionPage' => SructurData::CollectionPage($param,false),
			);
		}
	}

	public function ListManga($nameIndex, $allIndex = FALSE, $LimitRowPegination, $limitRange, $starIndex){
		$params = [
            'params' => [
				'name_index' => $nameIndex,
				'all_index' => $allIndex,
				'min_row_pegination' => $LimitRowPegination,
				'limit_range' => $limitRange,
				'star_index' => $starIndex,
            ]
		];
		$params = json_encode($params);
		$ListManga = $this->MangaModel->ListManga($params);
		return $ListManga;
	}

}