<?php
	
	namespace Rpc\Libarary;
	
	/**
	 * Class NoticeResponse
	 * @content 客户端接收注册中心推送(生成.json文件)
	 * @package App\Libarary
	 */
	class NoticeResponse
	{
		private $server;
		
		public function __construct()
		{
			$this->server = new \swoole_server(env ("TCP_NOTICE_URL"), env ("TCP_NOTICE_PORT"));
//			$this->server = new \swoole_server('127.0.0.1', '1111');
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
				
				if (!file_exists (base_path () . '/provider')) {
					mkdir (base_path () . '/provider');
				}
				
				$status = file_put_contents (base_path () . '/provider/' . $fileName['name'] . '.json', $data);
				
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