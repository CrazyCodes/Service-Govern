<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/1/11
	 * Time: 16:04
	 */
	
	namespace Rpc\Console;
	
	use Illuminate\Console\Command;
	use Tcp\Libarary\StartRpc;
	
	class StartRpcServerCommand extends Command
	{
		/**
		 * The console command name.
		 *
		 * @var string
		 */
		protected $name = 'start-Rpc-server';
		
		/**
		 * The console command description.
		 *
		 * @var string
		 */
		protected $description = '启动RPC-Provider';
		
		/**
		 * Create a new command instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct ();
		}
		
		/**
		 * Execute the console command.
		 *
		 * @return mixed
		 */
		public function handle(StartRpc $startRpc)
		{
			$startRpc->init ();
		}
	}