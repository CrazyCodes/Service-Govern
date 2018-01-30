<?php
	/**
	 * Created by PhpStorm.
	 * User: crazy
	 * Date: 2018/1/11
	 * Time: 16:04
	 */
	
	namespace Tcp\Console;
	
	use Illuminate\Console\Command;
	
	class StartTcpServer extends Command
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
		protected $description = '启动tcp服务器';
		
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
		public function handle()
		{
			$server = new \swoole_server("127.0.0.1", 9503);
			$server->on ('connect', function ($server, $fd) {
				echo "connection open: {$fd}\n";
			});
			
			$server->on ('receive', function ($server, $fd, $reactor_id, $data) {
				
				$data    = json_decode ($data, true);
				$service = app ()->make ('App\Service\\' . $data['service']);
				$server->send ($fd, $service->{$data['action']}($data['data']));
				$server->close ($fd);
				
			});
			$server->on ('close', function ($server, $fd) {
				echo "connection close: {$fd}\n";
			});
			$server->start ();
		}
	}