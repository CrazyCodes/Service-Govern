<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/2/28
	 * Time: 15:23
	 */
	
	namespace Rpc\Libs;
	
	class Logs
	{
		public static $log;
		
		public static function receive($request)
		{
			$data = json_decode ($request, true);
			
			self::$log['request_id'] = $data['requestId'];
			self::$log['service']    = $data['service'];
			self::$log['action']     = $data['action'];
			self::$log['parameters'] = $data['parameters'];
			
			return $data;
		}
		
		public static function add($key, $value)
		{
			self::$log[$key] = $value;
		}
	}