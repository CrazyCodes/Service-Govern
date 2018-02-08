<?php
	
	function requests
	(
		$group = '', $service = '', $action = '', $args = []
	)
	{
		$fileName = $group . '.json';
		
		$file = dirname (__DIR__) . '/config/' . $fileName;
		
		try {
			if (!file_exists ($file)) {
				throw new ErrorException("提供者不存在");
			}
			
			$content = file_get_contents ($file);
			
			$jsonData = json_decode ($content, true);
			
			$isAction = false;
		} catch (ErrorException $errorException) {
			die($errorException->getMessage ());
		}
		
		
		try {
			if (!in_array ($service, $jsonData['consumer'])) {
				throw new ErrorException("服务不存在");
			}
			
			$actionList = $jsonData['provider'][$service];
			
			foreach ($actionList as $value) {
				if ($value['method'] == $action) {
					$isAction = true;
				}
			}
			
			if (!$isAction) {
				throw new ErrorException("{$service}@{$action}方法不存在");
			}
			
			
		} catch (ErrorException $errorException) {
			die($errorException->getMessage ());
		}
		
		
		$count = count ($jsonData['center']);
		
		$countKey = mt_rand (0, ($count - 1));
		
		
		$rowCount = [
			'service' => $service,
			'action'  => $action,
			'data'    => $args,
			'rpc'  => $jsonData['center'][$countKey],
		];
		
		return $rowCount;
		
	}
	
	$data = requests ("userRPC", "UserService", "getUserInfo", ["uid" => 1]);
	
	var_dump ($data);