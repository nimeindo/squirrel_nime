<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimeModel extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->config->load('api_config');
	}

	public function StreamAnime($Params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."StreamAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $Params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if ($err) {
			$res = array(
				"API_TheMovieRs"=> array(
					  "Version"=> "N.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Stream Anime",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_TheMovieRs = (json_decode($res));
            return $API_TheMovieRs;
		} else {
			$API_TheMovieRs = (json_decode($response));
            return $API_TheMovieRs;
		}
	}

	public function SearchAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."SearchAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
					  "Version"=> "N.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Search Anime",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_TheMovieRs=(json_decode($res));
            return $API_TheMovieRs;
		} else {
			$API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
		
		}
	}

	public function DetailAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."DetailAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
					  "Version"=> "N.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Single List Anime",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_TheMovieRs=(json_decode($res));
            return $API_TheMovieRs;
		} else {
			$API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
		}
	}

	public function ListAllAnime($params){

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."ListAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));

		$response = curl_exec($curl);
		
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
				  "Version"=> "N.1",
				  "Timestamp"=> "",
				  "NameEnd"=> "List Anime",
				  "Status"=> "Not Complete",
				  "Message"=>array(
					"Type"=> "Info",
					"ShortText"=> "Not Found",
					"Code"=> 404
				  ),
				  "Body"=> []
				)	  
		);
		
			$API_TheMovieRs=(json_decode($res));
			return $API_TheMovieRs;
		} else {
			$API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
		}
	}

	public function ScheduleAnime(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."ScheduleAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "",
		CURLOPT_HTTPHEADER => array(
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
					  "Version"=> "N.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Release Schedule Anime",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_TheMovieRs=(json_decode($res));
            return $API_TheMovieRs;
		} else {
			$API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
		}
	}

	public function genreListAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."GenreListAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
					  "Version"=> "N.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Genre List Anime",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_TheMovieRs=(json_decode($res));
            return $API_TheMovieRs;
		} else {
			$API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
		}
	}

	public function SearchGenreAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."SearchGenreAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
					  "Version"=> "N.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Search Genre Anime",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_TheMovieRs=(json_decode($res));
            return $API_TheMovieRs;
		} else {
			$API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
		}
	}

	public function TrendingWeekAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."TrandingWeekAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
					  "Version"=> "N.1",
					  "Timestamp"=> "",
					  "NameEnd"=> "Tranding Week Anime",
					  "Status"=> "Not Complete",
					  "Message"=>array(
						"Type"=> "Info",
						"ShortText"=> "Not Found",
						"Code"=> 404
					  ),
					  "Body"=> []
					)	  
			);
			
			$API_TheMovieRs=(json_decode($res));
            return $API_TheMovieRs;
		} else {
			$API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
		}
	}

	public function lastUpdateAnime($Params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."LastUpdateAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $Params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));
		
		$response = curl_exec($curl);
		
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
				  "Version"=> "N.1",
				  "Timestamp"=> "",
				  "NameEnd"=> "Last Update Anime",
				  "Status"=> "Not Complete",
				  "Message"=>array(
					"Type"=> "Info",
					"ShortText"=> "Not Found",
					"Code"=> 404
				  ),
				  "Body"=> []
				)	  
		);
			$API_TheMovieRs=(json_decode($res));
			return $API_TheMovieRs;
		} else {
            $API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
        }
	}

	public function RecomendationAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."RecomendationAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
				  "Version"=> "N.1",
				  "Timestamp"=> "",
				  "NameEnd"=> "Recomendation Anime",
				  "Status"=> "Not Complete",
				  "Message"=>array(
					"Type"=> "Info",
					"ShortText"=> "Not Found",
					"Code"=> 404
				  ),
				  "Body"=> []
				)	  
		);
			$API_TheMovieRs=(json_decode($res));
			return $API_TheMovieRs;
		} else {
            $API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
        }
	}

	public function TopAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."TopAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));
		
		$response = curl_exec($curl);
		
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
				  "Version"=> "N.1",
				  "Timestamp"=> "",
				  "NameEnd"=> "Top Anime",
				  "Status"=> "Not Complete",
				  "Message"=>array(
					"Type"=> "Info",
					"ShortText"=> "Not Found",
					"Code"=> 404
				  ),
				  "Body"=> []
				)	  
		);
			$API_TheMovieRs=(json_decode($res));
			return $API_TheMovieRs;
		} else {
            $API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
        }
	}

	public function SliderAnime($params){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_PORT => $this->config->item('api_port_anime'),
		CURLOPT_URL => $this->config->item('api_url_anime')."SliderAnime".$this->config->item('api_inisial_anime'),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"x-api-key:".$this->config->item('api_key_anime')
		),
		));
		
		$response = curl_exec($curl);
		
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$res=array(
				"API_TheMovieRs"=> array(
				  "Version"=> "N.1",
				  "Timestamp"=> "",
				  "NameEnd"=> "SliderAnime Anime",
				  "Status"=> "Not Complete",
				  "Message"=>array(
					"Type"=> "Info",
					"ShortText"=> "Not Found",
					"Code"=> 404
				  ),
				  "Body"=> []
				)	  
		);
			$API_TheMovieRs=(json_decode($res));
			return $API_TheMovieRs;
		} else {
            $API_TheMovieRs=(json_decode($response));
            return $API_TheMovieRs;
        }
	}
	
}