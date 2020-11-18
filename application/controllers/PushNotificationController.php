<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PushNotificationController extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('pagination');
        $this->config->load('api_config');
		$this->load->library('user_agent');
    }

    public function sendToken() {
        $firebaseToken =  $this->input->post('fbToken');
        
        $client     = new GuzzleHttp\Client();
        $url        = $this->config->item('push_notif_url_firebase').'/FBv1/subscribe';
        $response = [];
        try{
            $headers =  [
                'Content-Type'  => 'application/json',
                'Authorization' => $this->config->item('auth_firebase')
            ];
            $body = [
                'verify' => false,
                'json' => [
                    "token" => $firebaseToken
                ]
            ];
            $response = $client->request('POST',$url, $body)->getBody();
                
            $response = json_decode($response);
        
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response['status']  = 500;
            $response['message'] = 'Server sedang dalam perbaikan, Silahkan coba beberapa saat lagi.';

            $response = json_encode($response);

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            if($e->getResponse()->getStatusCode() != 200){
                $response['status']  = 500;
                $response['message'] = 'Server sedang dalam perbaikan, Silahkan coba beberapa saat lagi..';

                $response = json_encode($response);
            }
        }
        echo json_encode($response);
    }
    
}