<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/callback/handle',
        'https://06d8-118-96-159-116.ap.ngrok.io/callback',
        'http://localhost:8000/callback/handle',
        'http://localhost:8000/callback',
        'http://06d8-118-96-159-116.ap.ngrok.io/callback'
    ];
}
