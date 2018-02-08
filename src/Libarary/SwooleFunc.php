<?php
	
	namespace Tcp\Libarary;
	
	use Tcp\Libarary\Impl\SwooleFuncImpl;
	
	class SwooleFunc implements SwooleFuncImpl
	{
		const SERVICE_PREFIX = 'service';
		const ACTION_PREFIX = 'action';
		const DATA_PREFIX = 'data';
		
		public function request($service = '', $action = '', $data = [], $CLIENT_SERVER_URL = '', $CLIENT_SERVER_PORT = '')
		{
			if ($service == '' || $action == '') {
				throw new \Exception('service或action参数为空');
			}
			
			$client = new \swoole_client(SWOOLE_SOCK_TCP);
			
			
			if ($CLIENT_SERVER_URL == '' && $CLIENT_SERVER_PORT == '') {
				$CLIENT_SERVER_URL  = env ("CLIENT_SERVER_URL");
				$CLIENT_SERVER_PORT = env ("CLIENT_SERVER_PORT");
			}
			
			
			if (!$client->connect ($CLIENT_SERVER_URL, $CLIENT_SERVER_PORT, -1)) {
				throw new \Exception("connect failed. Error: {$this->client->errCode}");
			}
			
			$data = json_encode ([
				self::SERVICE_PREFIX => $service,
				self::ACTION_PREFIX  => $action,
				self::DATA_PREFIX    => $data,
			]);
			
			$client->send ($data);
			
			$result = $client->recv ();
			
			$client->close ();
			
			return $result;
		}
		
		public function requests
		(
			$group = '', $service = '', $action = '', $data = []
		)
		{
			var_dump ($group, $service, $action, $data);
		}
		
		public function test($service = '', $action = '', $data = [])
		{
			if ($service == '' || $action == '') {
				throw new \Exception('service或action参数为空');
			}
			
			$app = app ()->make ('App\Service\\' . $service);
			
			return $app->{$action} ($data);
		}
	}