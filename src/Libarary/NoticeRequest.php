<?php
	
	namespace Rpc\Libarary;
	
	/**
	 * Class NoticeRequest
	 * @content 注册中心通知客户端
	 * @package Tcp\Libarary
	 */
	class NoticeRequest
	{
		public function request($data = [],$NOTICE_URL,$NOTICE_PORT)
		{
			try {
				
				$client = new \swoole_client(SWOOLE_SOCK_TCP);
				
				if (!$client->connect ($NOTICE_URL, $NOTICE_PORT, -1)) {
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