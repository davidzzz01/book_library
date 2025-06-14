<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleBooksService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.googleapis.com/books/v1/',
            'timeout' => 10.0,
        ]);
    }

    public function searchBooks(string $query): array
    {
        $response = $this->client->get('volumes', [
            'query' => [
                'q' => $query,
                'maxResults' => 20,
                'key' => env('GOOGLE_BOOKS_API_KEY')
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
