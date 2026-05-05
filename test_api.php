<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test the API directly
$token = '9|RMmmGs8suTemZgVbSz58kPc3jYjiNRJ0252vH8Wh690e1707';

// Simulate a request with token
$request = Illuminate\Http\Request::create('/api/user', 'GET');
$request->headers->set('Authorization', 'Bearer ' . $token);
$request->headers->set('Accept', 'application/json');

// Route the request
$response = $app->handle($request);

echo "Status Code: " . $response->getStatusCode() . "\n";
echo "Response: " . $response->getContent() . "\n";

// Test users endpoint
$request2 = Illuminate\Http\Request::create('/api/users', 'GET');
$request2->headers->set('Authorization', 'Bearer ' . $token);
$request2->headers->set('Accept', 'application/json');

$response2 = $app->handle($request2);

echo "\nUsers Status Code: " . $response2->getStatusCode() . "\n";
echo "Users Response: " . $response2->getContent() . "\n";
