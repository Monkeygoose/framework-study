<?php

class DatabaseController {

	public function handleRequest(Request $req){
		$response = new Response;
		// $glob = new Glob();

		// require_once $glob->search('database.php')->first();
		// require_once $glob->search('functions.php')->first();

		// $design = new designDB($db,"testband");

		// $values = $design->getvars("design");
		$values = array();
		$response->setBody(json_encode($values));
		return $response;
	}

}
