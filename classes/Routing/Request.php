<?php

class Request {

	public $url;
	public $post;
	public $get;

	public function __construct(){
		$url = $_SERVER['REQUEST_URI'];
		$cleanurl = $this->stripOutWampFolderName($url); // NOT NEEDED LIVE (WAMP ONLY)
		$this->url = $this->removeGetParams($cleanurl);
		$this->post = $_POST;
		$this->get = $_GET;
	}

	private function stripOutWampFolderName($url) {
		return str_replace("/framework2-study", "", $url);
	}

	//gets rid of everything after "?" token.
	private function removeGetParams($url){
		return strtok($url, "?");
	}

}