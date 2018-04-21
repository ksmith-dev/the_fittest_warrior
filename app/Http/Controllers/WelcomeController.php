<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    private $NEWS_ARTICLE_COUNT = 2;

    /**
     * Displays the welcome page for The Fittest Warrior
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $url = 'https://newsapi.org/v2/everything?' . 'q=Fitness&'. 'sortBy=popularity&' . 'apiKey=e5d88efa8d1947a1811764f4f058a560';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        $body = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($body);

        $articles = null;

        for ($i=0; $i<$this->NEWS_ARTICLE_COUNT; $i++) {
            $articles[$i] = array(
                'source' => $json->articles[$i]->source->name,
                'author' => $json->articles[$i]->author,
                'title' => $json->articles[$i]->title,
                'description' => $json->articles[$i]->description,
                'url' => $json->articles[$i]->url,
                'urlToImage' => $json->articles[$i]->urlToImage
            );
        }

        return view('welcome', ['articles' => $articles]);
    }
}
