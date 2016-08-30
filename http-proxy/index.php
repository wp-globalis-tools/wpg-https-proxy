<?php

namespace WPG\HTTPSProxy\Server;
use Unirest\Request;

require_once 'vendor/autoload.php';

if(!isset($_GET['url'])) {
	die;
}

Request::timeout(10);
$response = Request::post(rawurldecode($_GET['url']), [], $_POST);
http_response_code($response->code);
echo $response->raw_body;
