<?php
	return [
		/**
		 * @ 项目名称
		 */
		'app_name'               => 'msm-center',
		
		
		/**
		 * @ 项目目录
		 */
		'base_path'              => BASE_PATH,
		
		
		/*
		 * @ 开发者选择目录
		 * 如果你是一个开发人员，在开发调试时，每次重启线程会比较繁琐
		 * 所以直接使用本地调用本地的方式来调试程序，与正常开发程序一样
		 */
		'develop_path'           => 'Test\Demo\\',
		
		
		/*
		 * @ 生产环境的目录
		 */
		'production_path'        => 'Test\Demo\\',
		
		
		/**
		 * @ 监听Ip
		 */
		'server_ip'              => '127.0.0.1',
		
		
		/**
		 * @ 监听端口
		 */
		'server_port'            => '9992',
		
		
		/**
		 * @ 回调端口 (用于同步配置文件)
		 */
		'server_notify_port'     => '9999',
		
		
		/**
		 * @ 治理中心Ip
		 * 由管理员告知ip
		 */
		'management_center_ip'   => '127.0.0.1',
		
		
		/**
		 * @ 治理中心端口
		 * 由管理员告知端口
		 */
		'management_center_port' => '1000',
		
		
		/**
		 * @ 监控中心Ip
		 * 由管理员告知ip
		 */
		'monitoring_center_ip'   => '127.0.0.1',
		
		
		/**
		 * @ 监控中心端口
		 * 由管理员告知端口
		 */
		'monitoring_center_port' => '5555',
	
	];
	