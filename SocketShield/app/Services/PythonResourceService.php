<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PythonResourceService
{
    public function collect(): array
    {
        $response = Http::timeout(3)->get('http://127.0.0.1:9000/resources');

        if (!$response->successful()) {
            throw new \RuntimeException('Python resource monitor unavailable.');
        }

        return $response->json();
    }
}