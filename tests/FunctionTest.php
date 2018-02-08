<?php
	
	use App\Libarary\ClientResponse;
	
	include_once "../src/Libarary/ClientResponse.php";
	
	$content = new ClientResponse();
	
	
	var_dump ($content->request ('userRPC', 'UserBasicService', 'updateName', [
		'user_id'  => 10000,
		'username' => '测试',
	]));
	
	