<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteMap extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('AnimeModel');
		$this->load->model('MangaModel');
	}
 
    public function sitemap(){
		$PTR_API['sitemapList'] = [
			'anime',
			'manga',
			'sitemap-menu',
		];
        $this->load->view('seo/view_sitemap',$PTR_API);
	}

	public function sitemapMenu(){
		$PTR_API['sitemapList'] = [
			'home',
			'anime',
			'manga',
			'manga-list/img',
			'manga-list/txt',
			'manga/genre',
			'manga-update',
			'anime/genre',
			'anime-list',
			'anime-update',
		];
		$this->load->view('seo/sitemap_menu',$PTR_API);
	}
	//===================== FOR ANIME =========================================
		public function anime(){	
			$LimitRowPegination =  4;
			$API_LastUpdateAnime = SiteMap::LastUpdateAnime(18,0,$LimitRowPegination);
			$PTR_API['API_LastUpdateAnime'] = $API_LastUpdateAnime;
			$this->load->view('seo/sitemap_anime',$PTR_API);
		}
		
		public function ListAnime($NameIndexVal = null){
			if($NameIndexVal == '0'){
				$NameIndexVal = '#';
			}
			$LimitRowPegination =  4;
			$all = (empty($NameIndexVal)) ? TRUE : FALSE;
			$ListAllAnime = SiteMap::ListAllAnime($NameIndexVal,$all,$LimitRowPegination,350,0);
			$PTR_API['API_ListAnime']= $ListAllAnime;
			$this->load->view('seo/sitemap_anime_detail', $PTR_API);
		}

		public function AnimePage($PageNumber = null){
			$PageNumber = !empty($PageNumber) ? $PageNumber : "" ; 
			$LimitRowPegination =  4;
			$starIndex = 18 * ($PageNumber-1);
			$API_LastUpdateAnime = SiteMap::LastUpdateAnime(18,$starIndex, $LimitRowPegination);
			$PTR_API['API_LastUpdateAnime'] = $API_LastUpdateAnime;
			$this->load->view('seo/sitemap_anime_streaming',$PTR_API);
		}

		//============================= Api Anime ===============================================
		public function ListAllAnime($nameIndex, $allIndex = FALSE, $LimitRowPegination, $limitRange, $starIndex){
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
			$API_TheMovieRs = $this->AnimeModel->ListAllAnime($params);
			return $API_TheMovieRs;
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
		//============================= END Api Anime ===========================================

	//===================== END FOR ANIME =========================================
	
	// ===================== FOR MANGA ===================================
		public function manga(){	
			$LimitRowPegination =  4;
			$API_LastUpdateManga = SiteMap::LastUpdateManga(18,0,$LimitRowPegination);
			$PTR_API['API_LastUpdateManga'] = $API_LastUpdateManga;
			$this->load->view('seo/sitemap_manga',$PTR_API);
		}

		public function ListManga($NameIndexVal = null){
			if($NameIndexVal == '0'){
				$NameIndexVal = '#';
			}
			$LimitRowPegination =  4;
			$all = (empty($NameIndexVal)) ? TRUE : FALSE;
			$ListAllManga = SiteMap::ListAllManga($NameIndexVal,$all,$LimitRowPegination,350,0);
			$PTR_API['API_ListManga']= $ListAllManga;
			$this->load->view('seo/sitemap_manga_detail', $PTR_API);
		}

		public function MangaPage($PageNumber = null){
			$PageNumber = !empty($PageNumber) ? $PageNumber : "" ; 
			$LimitRowPegination =  4;
			$starIndex = 18 * ($PageNumber-1);
			$API_LastUpdateManga = SiteMap::LastUpdateManga(18,$starIndex, $LimitRowPegination);
			$PTR_API['API_LastUpdateManga'] = $API_LastUpdateManga;
			$this->load->view('seo/sitemap_manga_read',$PTR_API);
		}
		//============================= Api Manga ===============================================

		public function ListAllManga($nameIndex, $allIndex = FALSE, $LimitRowPegination, $limitRange, $starIndex){
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

		public function LastUpdateManga($limitRange,$starIndex,$LimitRowPegination){
			$params = [
				'params' => [
					'limit_range' => $limitRange,
					'star_index' => $starIndex,
					'min_row_pegination' => $LimitRowPegination,
					'is_updated' => TRUE
				]
			];
			
			$params = json_encode($params);
			$API= $this->MangaModel->lastUpdateManga($params);
			return $API;
		}
		//============================= END Api Manga ===========================================
	// ===================== END FOR MANGA ===================================
}
 
