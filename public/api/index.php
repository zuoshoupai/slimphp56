<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
ini_set('display_errors',1);
error_reporting(-1);
define('ROOT_PATH',dirname(dirname(__DIR__)));
require '../../vendor/autoload.php';
require ROOT_PATH. '/person/common.php';  
$app = new \Slim\App; 
require ROOT_PATH. '/person/route.php'; 
addRoute($app); 
$app->run();