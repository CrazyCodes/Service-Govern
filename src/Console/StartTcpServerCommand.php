<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/1/11
	 * Time: 16:04
	 */
	
	namespace Tcp\Console;
	
	use Illuminate\Console\Command;
	use Tcp\Libarary\StartTcp;
	
	class StartTcpServerCommand extends Command
	{
		/**
		 * The console command name.
		 *
		 * @var string
		 */
		protected $name = 'start';
		
		/**
		 * The console command description.
		 *
		 * @var string
		 */
		protected $description = '启动Tcp服务器';
		
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
		public function handle(StartTcp $startTcp)
		{
			$startTcp->init ();
		}
	}