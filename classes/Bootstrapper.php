<?php

require_once("FileSystem/Glob.php");
require_once("Functions.php");

class Bootstrapper {

	public function start(){
		spl_autoload_register(array($this,"loadClass"));
	}

	private function loadClass($class){
		$glob = new Glob();
		require_once $glob->search($class.'.php')->first();
	}
}

return new Bootstrapper;
