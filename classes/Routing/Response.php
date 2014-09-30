<?php

class Response {

	private $body;
	private $header;
	private $content;
	private $footer;

	public function setBody($body){
		$this->body = $body;
	}

	public function setHeader($header){
		$this->header = $header;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function setFooter($footer){
		$this->footer = $footer;
	}

	public function output(){
		if (empty($this->body)) {
			$this->body = $this->header.$this->content.$this->footer;
		}	
		echo $this->body;
		die;
	}

}