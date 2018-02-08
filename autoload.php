<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/2/8
	 * Time: 17:53
	 */
	// 注册类库自动加载, 适用于普通加载
	spl_autoload_register (function ($class) {
		if (stripos ($class, 'Rpc\\') === 0) {
			list($search, $replace) = [['\\', 'Rpc/'], ['/', 'src/']];
			$filename = __DIR__ . DIRECTORY_SEPARATOR . str_replace ($search, $replace, $class) . '.php';
			file_exists ($filename) && include $filename;
		}
	});