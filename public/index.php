<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

//post test
$app->post('/test/demo', function(Request $r1, Response $r2){
    $data= $r1->getParsedBody();
    $inputdata=[];
    $inputdata['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
    $inputdata['phone'] = filter_var($data['phone'], FILTER_SANITIZE_STRING);
    $r2->getBody()->write("dear ".$inputdata['name']." your phone number is " .$inputdata['phone']);
    return $response;
});

// get args
$app->get('/args/{name}/{phone}', function($r1 , $r2, $args){
    $name = $args['name'];
    $phone = $args['phone'];
    $r2->getBody()->write("dear ".$name." your phone number is " .$phone);
    return $response;
});
$app->run();