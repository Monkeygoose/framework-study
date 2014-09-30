<?php

	function dd($var){
		var_dump($var);
		die;
	};

	function checknumber($var){
		if (is_numeric($var)){
			return "INT (32) NOT NULL";
		} else {
			return "TEXT NOT NULL";
		}
	};


