<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

function addRoute($app){ 
	$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {  
		$name = $args['name'];
		$response->getBody()->write("Hello, $name");

		return $response;
	});
	$app->get('/', function (Request $request, Response $response, array $args) { 
		echo 333;
		return $response;
	});
	 
	 
	$app->get('/homes', \App\controller\homeController::class . ':home');
	$app->get('/home/list', \App\controller\homeController::class . ':lists');
	$app->get('/getocr', \App\controller\homeController::class . ':getOcr');
	
} 