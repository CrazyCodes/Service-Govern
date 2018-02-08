<?php
	
	namespace Tcp\Libarary\Impl;
	
	interface SwooleFuncImpl
	{
		public function request($service = '', $action = '', $data = [], $CLIENT_SERVER_URL = '', $CLIENT_SERVER_PORT = '');
		
		public function test($service = '', $action = '', $data = []);
	}