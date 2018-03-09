<?php
	
	namespace Rpc\Monitor;
	
	/**
	 * @content 日志记录
	 * @package Rpc\Server
	 */
	class Monitor
	{
		public function __construct($config)
		{
			$server = new MonitorRpc($config);
			
			$server->start ();
		}
	}