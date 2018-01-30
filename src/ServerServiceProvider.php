<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/1/30
	 * Time: 18:19
	 */
	
	namespace Tcp;
	
	use Illuminate\Support\ServiceProvider;
	
	class ServerServiceProvider extends ServiceProvider
	{
		public function boot()
		{
			$this->registerCommands ();
		}
		
		public function registerCommands()
		{
			$this->commands ([
				Console\StartTcpServerCommand::class
			]);
		}
	}
	