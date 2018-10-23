<?php


class IPDetails
{
	var $ip;
	protected $api="https://ipinfo.io/", $details,$curl,$map;
	/**
    *    IP Details Construct
    *    @access public
    *    @param String $ip IP Address Of which the details are to be located.
    *    @return void
    */ 
	public function vsipdetails($ipaddress = null)
	{
		$this->ip=$ipaddress;
		$this->curl=curl_init($this->api.$this->ip);
		// var_dump($this->curl);
		curl_setopt($this->curl, CURLOPT_POST, 0);
        curl_setopt($this->curl, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($this->curl, CURLOPT_NOBODY, 0); // set to 1 to eliminate body info from response
        curl_setopt($this->curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); // if necessary use HTTP/1.0 instead of 1.1
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 300);
		$this->details = curl_exec($this->curl);
        $this->details = json_decode($this->details);
        curl_close($this->curl);
        return  (array)$this->details;

	}
   	/** 
    * Scan for the details of the ip address
    * @access public
    * @return void
    */ 
	public function scan()
	{
		
	}
	public function get_map(){
		$array=(is_array($this->details))?$this->details:(array)$this->scan();
		// var_dump($array);
		$this->map='<img class="map" src="https://maps.googleapis.com/maps/api/staticmap?center='.$array["loc"].'&amp;zoom=9&amp;size=640x200&amp;sensor=false" alt="'.$array["city"].', '.$array["region"].', '.$array["country"].' Map" title="'.$array["city"].', '.$array["region"].', '.$array["country"].' Map">';
		return $this->map;
	}
    
    /** 
    * To close the class
    * @access public
    * @return void
    */
    public function close()
    {
    	curl_close($this->curl);
    	return true;
    }
    	
	
}