<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        
        // $ip = "219.92.117.58";  
        $ip = $this->get_client_ip();//获取访客IP
        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "http://www.geoplugin.net/json.gp?ip=".$ip,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        $json = json_decode($response, true);  
        $verification = 'MY';
        if($json['geoplugin_countryCode'] != $verification){
            
                sleep(10);//设置一个10秒等待。
                
                header('HTTP/1.1 503 Service Temporarily Unavailable');
                header('Status: 503 Service Temporarily Unavailable');
                header('Retry-After: 3600000');
                exit;
        }else{
            return $this->view->fetch();
        }
        
    }
    public function index1()
    {
        return $this->view->fetch(); 
    }
    public function tourl(){
        // $params = $this->request->post("params");
        $url = Db::table('fa_url_lists')->orderRaw("rand() , id DESC")->find();
        return json_encode($url['to_url']);
    }

    public function get_client_ip() { 
        $ip = $_SERVER['REMOTE_ADDR'];     
        if (isset($_SERVER['HTTP_X_REAL_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_FORWARDED_FOR'])) {            
        $ip = $_SERVER['HTTP_X_REAL_FORWARDED_FOR'];       
        }          
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_FORWARDED_FOR'])) {             
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];       
        }          
        elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {           
        $ip = $_SERVER['HTTP_CLIENT_IP'];       
        }          
        return $ip;    
    }
}
