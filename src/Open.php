<?php
	
	namespace Rpc;
	
	class Open
	{
		public $path;
		
		public function __construct($path)
		{
			$this->path = $path;
		}
		
		public function __toString()
		{
			$result = [
				'consumer' => $this->getConsumer (),
			];
			
			return json_encode ($result);
		}
		
		public function getConsumer()
		{
			if (file_exists ($this->path . "config/consumer.php")) {
				return include $this->path . "config/consumer.php";
			}
			
			return [];
		}
	}