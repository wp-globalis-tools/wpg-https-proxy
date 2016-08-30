<?php

namespace GlobalisMS\HTTPProxy;
use Unirest\Request;

require_once 'vendor/autoload.php';

if(!isset($_GET['url'])) {
	die;
}

Request::timeout(10);
$response = Request::post(rawurldecode($_GET['url']), [], $_POST);
http_response_code($response->code);
//set_headers($response->headers);
echo $response->raw_body;

// function set_headers($headers) {
// 	foreach($headers as $key => $value) {
// 		if(is_string($key)) {
// 			if(is_string($value)) {
// 				header($key . ': ' . $value);
// 			} elseif(is_array($value)) {
// 				foreach ($value as $index => $subvalue) {
// 					header($key . ': ' . $subvalue);
// 				}
// 			}
// 		}
// 	}
// }
