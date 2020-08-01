<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MangaModel extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->config->load('api_config');
	}

	public function SearchManga($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."SearchManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
					  "Version"=> "M.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Search Manga",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_MangaRs=(json_decode($res));
            return $API_MangaRs;
		} else {
			$API_MangaRs=(json_decode($response));
            return $API_MangaRs;
		
		}
	}

	public function DetailManga($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."DetailManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
					  "Version"=> "M.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Detail Manga",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_MangaRs=(json_decode($res));
            return $API_MangaRs;
		} else {
			$API_MangaRs=(json_decode($response));
            return $API_MangaRs;
		}
	}

	public function ListManga($params){

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."ListManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
				  "Version"=> "M.1",
				  "Timestamp"=> "",
				  "NameEnd"=> "List Manga",
				  "Status"=> "Not Complete",
				  "Message"=>array(
					"Type"=> "Info",
					"ShortText"=> "Not Found",
					"Code"=> 404
				  ),
				  "Body"=> []
				)	  
		);
		
			$API_MangaRs = (json_decode($res));
			return $API_MangaRs;
		} else {
			$API_MangaRs = (json_decode($response));
            return $API_MangaRs;
		}
	}

	public function GenreListManga($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."GenreListManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
					  "Version"=> "M.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Genre List Manga",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_MangaRs = (json_decode($res));
            return $API_MangaRs;
		} else {
			$API_MangaRs = (json_decode($response));
            return $API_MangaRs;
		}
	}

	public function SearchGenreManga($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."SearchGenreManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
					  "Version"=> "M.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Search Genre Manga",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_MangaRs=(json_decode($res));
            return $API_MangaRs;
		} else {
			$API_MangaRs=(json_decode($response));
            return $API_MangaRs;
		}
	}

	public function TopManga($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."TopManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
					  "Version"=> "M.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Top Manga",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_MangaRs=(json_decode($res));
            return $API_MangaRs;
		} else {
			$API_MangaRs=(json_decode($response));
            return $API_MangaRs;
		}
	}

	public function LastUpdateManga($Params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."LastUpdateManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $Params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
				  "Version"=> "M.1",
				  "Timestamp"=> "",
				  "NameEnd"=> "Last Update Manga",
				  "Status"=> "Not Complete",
				  "Message"=>array(
					"Type"=> "Info",
					"ShortText"=> "Not Found",
					"Code"=> 404
				  ),
				  "Body"=> []
				)	  
		);
			$API_MangaRs=(json_decode($res));
			return $API_MangaRs;
		} else {
            $API_MangaRs=(json_decode($response));
            return $API_MangaRs;
        }
	}

	public function RecomendationManga($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."RecomendationManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
					  "Version"=> "M.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Recomendation Manga",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_MangaRs=(json_decode($res));
            return $API_MangaRs;
		} else {
			$API_MangaRs=(json_decode($response));
            return $API_MangaRs;
		}
	}
	
	public function ChapterManga($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_manga'),
		CURLOPT_URL => $this->config->item('api_url_manga')."ChapterManga".$this->config->item('api_inisial_manga'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_manga')
		),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$res=array(
				"API_MangaRs"=> array(
					  "Version"=> "M.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Chapter Manga",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_MangaRs=(json_decode($res));
            return $API_MangaRs;
		} else {
			$API_MangaRs=(json_decode($response));
            return $API_MangaRs;
		}
	}
}