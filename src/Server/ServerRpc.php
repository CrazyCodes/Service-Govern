<?php
	
	namespace Rpc\Server;
	
	use Rpc\Libs\Dispatcher;
	use Rpc\Libs\Logs;
	use Rpc\Libs\Notice;
	
	class ServerRpc
	{
		protected $server;
		
		protected $log;
		
		public $config;
		
		public function __construct($config)
		{
			$this->config = $config;
			
				$this->server = new \swoole_server($config['server_ip'], $config['server_port']);
			$this->server->addListener ($config['server_ip'], $config['server_notify_port'], SWOOLE_SOCK_TCP);
		}
		
		public function start()
		{
			$this->connect ()->receive ()->close ();
			// 上线通知
			Notice::online ($this->config);
			
			$this->server->start ();
		}
		
		public function receive()
		{
			$this->server->on ('receive', function ($server, $fd, $reactor_id, $data) {
				
				$connection_info = $server->connection_info ($fd, $reactor_id);
				$request         = Logs::receive ($data);
				
				if ($connection_info['server_port'] == $this->config['server_port']) {
					$className = $this->config['production_path'] . $request['service'];
					$app       = new $className;
					$response  = $app->{$request['action']}($request['parameters']);
					$server->send ($fd, $response);
					$server->close ($fd);
				} else {
					Dispatcher::configUpdate ($request['parameters'], $this->config);
					$server->send ($fd, json_encode (['message' => '通知成功', 'code' => 200]));
					$server->close ($fd);
				}
				
			});
			
			return $this;
		}
		
		public function connect()
		{
			$this->server->on ('connect', function ($server, $fd) {
				Logs::add ('start_time', time ());
			});
			
			return $this;
		}
		
		public function close()
		{
			$this->server->on ('close', function ($server, $fd) {
				Logs::add ('end_time', time ());
				
				// 发送日志通知
				Notice::log ($this->config, Logs::$log);
			});
			
			return $this;
		}
	}