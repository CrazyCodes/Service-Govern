<?php
	
	namespace Rpc\Libs;
	
	/**
	 * 调度程序
	 * Class Dispatcher
	 * @package Rpc\Libs
	 */
	class Dispatcher
	{
		
		public static $centerFile = 'center.php';
		public static $providerFile = 'provider.php';
		
		/**
		 * 更新配置 (被动收)
		 *
		 * @param $list
		 */
		public static function configUpdate($list, $appConfig)
		{
			$config['center']   = $list['center'];
			$config['consumer'] = $list['consumer'];
			
			for ($i = 0; $i < count ($config['consumer']); $i++) {
				
				$servicePath = $appConfig['base_path'] . 'config/' . $config['consumer'][$i];
				
				if (!is_dir ($servicePath)) {
					mkdir ($servicePath);
				}
				
				$centerParams = null;
				
				for ($j = 0; $j < count ($config['center']); $j++) {
					$centerParams .= <<<EOF
[
			'ip'   => '{$config['center'][$j]['ip']}',
			'port' => '{$config['center'][$j]['port']}',
		],
EOF;
				}
				
				
				$centerFileData =
					<<<EOF
<?php
	return [
		{$centerParams}
	];
EOF;
				
				$centerPath = $appConfig['base_path'] . 'config/' . $config['consumer'][$i] . '/';
				
				file_put_contents ($centerPath . self::$centerFile, $centerFileData);
				
				$providerParams = null;
				for ($p = 0; $p < count ($list['provider']['services']); $p++) {
					$providerParams .= <<<EOF
	'{$list['provider']['services'][$p]}',
EOF;
				}
				
				$providerFileData =
					<<<EOF
<?php
	return [
		'app_name'    => '{$list['provider']['app_name']}',
		'ip'       	  => '{$list['provider']['ip']}',
		'port'        => {$list['provider']['port']},
		'notify_port' => {$list['provider']['notify_port']},
		'services'    => [
			{$providerParams}
		]
	];
EOF;
				$providerPath     = $appConfig['base_path'] . 'config/' . $config['consumer'][$i] . '/';
				
				file_put_contents ($providerPath . self::$providerFile, $providerFileData);
				
			}
		}
		
		/**
		 * @param $service_name
		 * 软负载
		 *
		 * @return mixed
		 */
		public static function loadBalance($service, $centerConfig)
		{
			$rpcData = $centerConfig[mt_rand (0, count ($centerConfig) - 1)];
			
			return $rpcData;
		}
		
		/**
		 * 获取服务 (主动拉)
		 *
		 * @param $service
		 */
		public static function getService($service)
		{
			$client = new RpcMain([
				'ip'   => '127.0.0.1',
				'port' => '1234',
			]);
			
			$client->send ('DownloadService', 'receive', [
				'app_name' => 'msn-center',
				'service'  => [
					'UserService',
					'ShopService',
				],
			]);
		}
	}
	