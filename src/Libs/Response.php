<?php
	
	namespace Rpc\Libs;
	
	class Response
	{
		public $requestId;
		public $code;
		public $data;
		public $message;
		
		/**
		 * @return mixed
		 */
		public function getRequestId()
		{
			return $this->requestId;
		}
		
		/**
		 * @param mixed $requestId
		 */
		public function setRequestId($requestId)
		{
			$this->requestId = $requestId;
		}
		
		/**
		 * @return mixed
		 */
		public function getCode()
		{
			return $this->code;
		}
		
		/**
		 * @param mixed $code
		 */
		public function setCode($code)
		{
			$this->code = $code;
		}
		
		/**
		 * @return mixed
		 */
		public function getData()
		{
			return $this->data;
		}
		
		/**
		 * @param mixed $data
		 */
		public function setData($data)
		{
			$this->data = $data;
		}
		
		/**
		 * @return mixed
		 */
		public function getMessage()
		{
			return $this->message;
		}
		
		/**
		 * @param mixed $message
		 */
		public function setMessage($message)
		{
			$this->message = $message;
		}
		
		
	}