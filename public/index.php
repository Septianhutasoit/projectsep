<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';

// Jalankan aplikasi
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);
$request = Request::capture();

$response = $kernel->handle($request);

$response->send();
