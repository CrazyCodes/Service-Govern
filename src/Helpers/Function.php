<?php
	
	
	if (function_exists ('T')) {
		
		function T($service = '', $action = '', $data = [])
		{
			$swooleFunc = new \Tcp\Libarary\SwooleFunc();
			
			return $swooleFunc->request ($service = '', $action = '', $data = []);
		}
		
	}
	
	if (function_exists ('S')) {
		
		function S($service = '', $action = '', $data = [])
		{
			$swooleFunc = new \Tcp\Libarary\SwooleFunc();
			
			return $swooleFunc->test ($service = '', $action = '', $data = []);
		}
		
	}
	
