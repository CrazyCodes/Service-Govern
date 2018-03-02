<?php
	
	namespace Rpc\Monitor;
	
	class MonitorRpc
	{
		protected $server;
		
		protected $logger = 'logger';
		
		public $config;
		
		public function __construct($config)
		{
			$this->config = $config;
			
			$this->server = new \swoole_server($config['monitoring_center_ip'], $config['monitoring_center_port']);
		}
		
		public function start()
		{
			$this->connect ()->receive ()->close ();
			
			$this->server->start ();
		}
		
		public function receive()
		{
			$this->server->on ('receive', function ($server, $fd, $reactor_id, $data) {
				
				$resources = fopen ($this->config['base_path'].$this->logger, 'a+');
				fwrite ($resources, $data . "\n");
				fclose ($resources);
				
				$server->send ($fd, json_encode (['message' => '接收成功']));
				$server->close ($fd);
			});
			
			return $this;
		}
		
		public function connect()
		{
			$this->server->on ('connect', function ($server, $fd) {
			});
			
			return $this;
		}
		
		public function close()
		{
			$this->server->on ('close', function ($server, $fd) {
			});
			
			return $this;
		}
	}