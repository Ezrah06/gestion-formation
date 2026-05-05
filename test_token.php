<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test user login and get token
$user = App\Models\User::where('email', 'test@example.com')->first();
if ($user) {
    $token = $user->createToken('auth_token')->plainTextToken;
    echo "Token: " . $token . "\n";
    
    // Test protected route with token
    $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ];
    
    echo "Token generated successfully. You can now test with:\n";
    echo "curl -H 'Authorization: Bearer $token' http://127.0.0.1:8000/api/user\n";
    echo "curl -H 'Authorization: Bearer $token' http://127.0.0.1:8000/api/users\n";
} else {
    echo "User not found\n";
}
