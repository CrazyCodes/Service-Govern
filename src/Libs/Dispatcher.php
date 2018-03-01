<?php
	
	namespace Rpc\Libs;
	
	class Dispatcher
	{
		public static function configUpdate($list){
		
		}
		
		/**
		 * @param $service_name
		 * 软负载
		 * @return mixed
		 */
		public static function loadBalance($service_name,$centerConfig)
		{
			
			$rpcData = $centerConfig[mt_rand (0, count ($centerConfig)-1)];
			
			return $rpcData;
		}
		
		public static function getService($service_name)
		{
		
		}
	}
	