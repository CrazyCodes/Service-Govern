<?php
	
	namespace App\Libarary;
	
	class NoticeResponse
	{
		private $server;
		
		public function __construct()
		{
			$this->server = new \swoole_server(env ("TCP_NOTICE_URL"), env ("TCP_NOTICE_PORT"));
		}
		
		public function init()
		{
			$this->connect ();
			$this->receive ();
			$this->server->start ();
		}
		
		private function connect()
		{
			$this->server->on ('connect', function ($server, $fd) {
				echo "connection open: {$fd}\n";
			});
		}
		
		private function receive()
		{
			$this->server->on ('receive', function ($server, $fd, $reactor_id, $data) {
				$fileName = json_decode ($data, true);
				$status   = file_put_contents (dirname (__FILE__) . '/' . $fileName, $data);
				
				if ($status) {
					$server->send ($fd, '接收成功 001');
				} else {
					$server->send ($fd, '接收失败 000');
				}
				
				$server->close ($fd);
			});
		}
		
		private function close()
		{
			$this->server->on ('close', function ($server, $fd) {
				echo "connection close: {$fd}\n";
			});
		}
		
		
	}