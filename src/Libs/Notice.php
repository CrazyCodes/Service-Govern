<?php
	
	namespace Rpc\Libs;
	
	/**
	 * Class Notice
	 * 通知
	 * @package Rpc\Libs
	 */
	class Notice
	{
		/**
		 * 上线通知
		 */
		public static function online($config)
		{
			$client = new RpcMain([
				'ip'   => $config['management_center_ip'],
				'port' => $config['management_center_port'],
			]);
			
			$client->send ('OnlineService', 'receive', [
				'app_name' => $config['app_name'],
			]);
		}
		
		/**
		 * 线下通知
		 */
		public static function offline($config)
		{
			$client = new RpcMain([
				'ip'   => $config['management_center_ip'],
				'port' => $config['management_center_port'],
			]);
			
			$client->send ('OfflineService', 'receive', [
				'app_name' => $config['app_name'],
			]);
		}
		
		/**
		 * 日志通知
		 */
		public static function log($config, $data)
		{
			$client = new RpcMain([
				'ip'   => $config['monitoring_center_ip'],
				'port' => $config['monitoring_center_port'],
			]);
			
			$data['app_name'] = $config['app_name'];
			
			$client->send ('LogService', 'receive', $data);
		}
	}