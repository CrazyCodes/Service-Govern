<?php
	
	namespace App\Libarary;
	
	use ErrorException;
	
	/**
	 * Class ClientResponse
	 * @content 客户端
	 * @package App\Libarary
	 */
	class ClientResponse
	{
		const FILE_PREFIX = '.json';
		const FILE_DIR = 'provider';
		
		private $filePath;
		private $content;
		
		private $group, $service, $action, $args;
		
		public function __construct()
		{
		
		}
		
		public function request($group = '', $service = '', $action = '', $args = [])
		{
			$this->filePath = base_path () . '/' . self::FILE_DIR . '/' . $group . self::FILE_PREFIX;
			$this->group    = $group;
			$this->service  = $service;
			$this->action   = $action;
			$this->args     = $args;
			
			$this->isGroup ();
			$this->isService ();
			
			$rowCount = $this->load ();
			
			
			try {
				$client = new \swoole_client(SWOOLE_SOCK_TCP);
				
				if (!$client->connect ($rowCount['rpc']['ip'], $rowCount['rpc']['port'], -1)) {
					throw new ErrorException("connect failed. Error: {$this->client->errCode}");
				}
				
				$client->send (json_encode ($rowCount));
				
				$result = $client->recv ();
				
				$client->close ();
				
			} catch (ErrorException $errorException) {
				die($errorException->getMessage ());
			}
			
			
			return $result;
			
		}
		
		private function isGroup()
		{
			try {
				if (!file_exists ($this->filePath)) {
					throw new ErrorException("提供者不存在");
				}
				
				$this->content = file_get_contents ($this->filePath);
				
				$this->content = json_decode ($this->content, true);
				
				
			} catch (ErrorException $errorException) {
				die($errorException->getMessage ());
			}
		}
		
		private function isService()
		{
			$isAction = false;
			
			try {
				if (!in_array ($this->service, $this->content['consumer'])) {
					throw new ErrorException("服务不存在");
				}
				
				$actionList = $this->content['provider'][$this->service];
				
				foreach ($actionList as $value) {
					if ($value['method'] == $this->action) {
						$isAction = true;
					}
				}
				
				if (!$isAction) {
					throw new ErrorException("{$this->service}@{$this->action}方法不存在");
				}
				
				
			} catch (ErrorException $errorException) {
				die($errorException->getMessage ());
			}
		}
		
		private function load()
		{
			$count = count ($this->content['center']);
			
			$countKey = mt_rand (0, ($count - 1));
			
			$result = [
				'service' => $this->service,
				'action'  => $this->action,
				'data'    => $this->args,
				'rpc'     => $this->content['center'][$countKey],
			];
			
			return $result;
		}
		
	}