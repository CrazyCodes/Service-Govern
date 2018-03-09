<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/2/27
	 * Time: 14:03
	 */
	
	namespace Test\Demo;
	
	
	class UserService
	{
		public function getUserInfo()
		{
			return json_encode ([
				'username' => 'test',
				'user_id'  => 10000,
			]);
		}
	}