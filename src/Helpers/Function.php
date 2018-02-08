<?php
	if (function_exists ('S')) {
		
		function S($service = '', $action = '', $data = [])
		{
			
			$app = app ()->make ('App\Service\\' . $service);
			
			return $app->{$action} ($data);
		}
		
	}
	
	
