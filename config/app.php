<?php
	return [
		
		
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
		 * @ 消费者ip
		 * 消费者用于接收通知，所以必须也开启
		 * 基本上用于接收配置文件更改
		 */
		'ConsumerIp'             => '127.0.0.1',
		
		
		/**
		 * @ 消费者端口
		 * 消费者用于接收通知，所以必须也开启
		 * 基本上用于接收配置文件更改
		 */
		'ConsumerPort'           => '9992',
		
		
		/**
		 * @ 服务提供者ip
		 */
		'ProviderIp'             => '127.0.0.1',
		
		
		/**
		 * @ 服务提供者端口
		 */
		'ProviderPort'           => '9992',
		
		
		/**
		 * @ 治理中心Ip
		 * 由管理员告知ip
		 */
		'Management_Center_Ip'   => '127.0.0.1',
		
		
		/**
		 * @ 治理中心端口
		 * 由管理员告知端口
		 */
		'Management_Center_Port' => '1000',
		
		
		/**
		 * @ 监控中心Ip
		 * 由管理员告知ip
		 */
		'Monitoring_Center_Ip'   => '127.0.0.1',
		
		
		/**
		 * @ 监控中心端口
		 * 由管理员告知端口
		 */
		'Monitoring_Center_Port' => '1001',
	
	];
	