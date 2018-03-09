<?php
	
	namespace Rpc\Libs;
	
	class Request
	{
		public $requestId;
		public $token;
		public $service;
		public $action;
		public $parameters;
		
		public function __construct($requestId = false)
		{
			if ($requestId) {
				$this->requestId = $requestId;
			} else {
				$this->setRequestId ();
			}
		}
		
		/**
		 * @return mixed
		 */
		public function getRequestId()
		{
			return $this->requestId;
		}
		
		/**
		 * @return mixed
		 */
		public function setRequestId()
		{
			$this->requestId = md5 (uniqid (mt_rand (1, 1000000), true));
		}
		
		/**
		 * @return mixed
		 */
		public function getToken()
		{
			return $this->token;
		}
		
		/**
		 * @param mixed $token
		 */
		public function setToken($token)
		{
			$this->token = $token;
		}
		
		/**
		 * @return mixed
		 */
		public function getService()
		{
			return $this->service;
		}
		
		/**
		 * @param mixed $service
		 */
		public function setService($service)
		{
			$this->service = $service;
		}
		
		/**
		 * @return mixed
		 */
		public function getAction()
		{
			return $this->action;
		}
		
		/**
		 * @param mixed $action
		 */
		public function setAction($action)
		{
			$this->action = $action;
		}
		
		/**
		 * @return mixed
		 */
		public function getParameters()
		{
			return $this->parameters;
		}
		
		/**
		 * @param mixed $parameters
		 */
		public function setParameters($parameters)
		{
			$this->parameters = $parameters;
		}
		
		
	}