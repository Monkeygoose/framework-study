<?php

class VideoPageController extends Controller {

	public function handleRequest(Request $req){
		$response = new Response;
		$view = new View('base');
		$glob = new Glob;
		
		$variables = array(
			"Title" => "Videos",
			"Layout" => "twoColumn",
			"colOneWidth" => "two-thirds", // available widths = full, two-thirds, half, third, fourth.
			"colTwoWidth" => "third",
			"headerClass" => "header",
			"navClass" => "navigation",
			"contentClass" => "maincontent",
			"footerClass" => "footer",
			"colOneContent" => "homepageContent",
			"colTwoContent" => "videopageContent"
		);

		$response->setBody($view->render($variables));
		
		return $response;
	}

}