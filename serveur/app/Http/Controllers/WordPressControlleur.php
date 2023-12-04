<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WordPressController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://your-wordpress-site.com/wp-json/wp/v2/',
        ]);
    }

    public function getPosts()
    {
        $response = $this->client->get('posts');
        $posts = json_decode($response->getBody()->getContents());

        return response()->json($posts);
    }
}
