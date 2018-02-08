<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/1/11
	 * Time: 16:04
	 */
	
	namespace Rpc\Console;
	
	use Rpc\Libarary\NoticeResponse;
	use Illuminate\Console\Command;
	
	class StartRpcClientCommand extends Command
	{
		/**
		 * The console command name.
		 *
		 * @var string
		 */
		protected $name = 'start-Rpc-client';
		
		/**
		 * The console command description.
		 *
		 * @var string
		 */
		protected $description = '启动RPC-Consumer';
		
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
		public function handle(NoticeResponse $noticeResponse)
		{
			$noticeResponse->init ();
		}
	}