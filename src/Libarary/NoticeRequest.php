<?php
	
	namespace Rpc\Libarary;
	
	/**
	 * Class NoticeRequest
	 * @content 注册中心通知客户端
	 * @package Tcp\Libarary
	 */
	class NoticeRequest
	{
		public function request($data = [])
		{
			
			try {
				
				$client = new \swoole_client(SWOOLE_SOCK_TCP);


				$CLIENT_SERVER_URL  = env ("CLIENT_SERVER_URL");
//				$CLIENT_SERVER_URL = '127.0.0.1';
				$CLIENT_SERVER_PORT = env ("CLIENT_SERVER_PORT");
//				$CLIENT_SERVER_PORT = '1111';
				
				
				if (!$client->connect ($CLIENT_SERVER_URL, $CLIENT_SERVER_PORT, -1)) {
					throw new \Exception("connect failed. Error: {$this->client->errCode}");
				}
				
				
			} catch (\Exception $exception) {
				die($exception->getMessage ());
			}
			
			$client->send (json_encode ($data));
			
			$result = $client->recv ();
			
			$client->close ();
			
			return $result;
		}
		
		
	}