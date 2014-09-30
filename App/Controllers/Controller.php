<?php

class Controller {

	public function handleRequest(Request $req){
		$response = new Response;
		$view = new View('baseDesign');
		$glob = new Glob;

		$toolBar = $this->form("Toolbar");

		$headerForm = $this->form("HeaderControls",array(
			"ClassName" => "header",
			"toolTitle" => "Header"
			));

		$pageForm = $this->form("PageControls", array(
			"ClassName" => "page",
			"toolTitle" => "Page"
			));

		$navForm = $this->form("NavControls", array(
			"ClassName" => "navigation",
			"toolTitle" => "Navigation"
			));

		$contentForm = $this->form("ContentControls", array(
			"ClassName" => "maincontent",
			"toolTitle" => "Content Box"
			));

		$contentWrapperForm = $this->form("ContentWrapperControls", array(
			"ClassName" => "maincontentWrapper",
			"toolTitle" => "Container"
			));

		$footerForm = $this->form("FooterControls", array(
			"ClassName" => "footer",
			"toolTitle" => "Footer"
			));

		$variables = array(
			"ToolBar" => $toolBar,
			"HeaderForm" => $headerForm,
			"PageForm" => $pageForm,
			"NavForm" => $navForm,
			"ContentForm" => $contentForm,
			"ContentWrapperForm" => $contentWrapperForm,
			"FooterForm" => $footerForm,
			"Title" => "Home",
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

	public function form($template,$vars=array()) {
	    $view = new View($template);
	    return $view->render($vars);
	}

}
