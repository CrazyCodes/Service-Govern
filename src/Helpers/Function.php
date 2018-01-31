<?php
	function T($service = '', $action = '', $data = [])
	{
		$client = new \swoole_client(SWOOLE_SOCK_TCP);
		
		if (!$client->connect (env ("CLIENT_SERVER_URL"), env ("CLIENT_SERVER_PORT"), -1)) {
			exit("connect failed. Error: {$this->client->errCode}\n");
		}
		$data = json_encode ([
			'service' => $service,
			'action'  => $action,
			'data'    => $data,
		]);
		
		$client->send ($data);
		
		$result = $client->recv ();
		
		$client->close ();
		
		return $result;
	}
	
	function S($service = '', $action = '', $data = [])
	{
		$app = app ()->make ('App\Service\\' . $service);
		
		return $app->{$action} ($data);
	}
