<?php
	
	namespace Rpc\Libarary;
	
	/**
	 * Class StartTcp
	 * @content 启动提供者监控
	 * @package Tcp\Libarary
	 */
	class StartRpc
	{
		private $server;
		
		public function __construct()
		{
			$this->server = new \swoole_server(env ("TCP_SERVER_URL"), env ("TCP_SERVER_PORT"));
//			$this->server = new \swoole_server('127.0.0.1', '9555');
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
				$data    = json_decode ($data, true);
				$service = app ()->make ('App\Service\\' . $data['service']);
				$server->send ($fd, $service->{$data['action']}($data['data']));
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