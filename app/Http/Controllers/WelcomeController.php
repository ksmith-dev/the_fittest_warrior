<?php

namespace App\Http\Controllers;

use App\User;
use App\Workout;

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

        $workouts = Workout::all();

        $workouts->where('active', 1);
        $workouts->sortByDesc('weight');
        $workouts->values()->all();

        $leaders = null;

        foreach ($workouts as $workout) {

            $user = User::find($workout->user_id);

            if (empty($leaders[$workout->type])) {
                $leaders[$workout->type] = array(
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'type' => str_replace('_', ' ', $workout->type),
                    'sets' => $workout->sets,
                    'repetitions' => $workout->repetitions,
                    'weight' => $workout->weight,
                    'duration' => $workout->duration,
                    'rest' => $workout->rest
                );
            } else if ($workout->repetitions > $leaders[$workout->type]['repetitions']) {
                $leaders[$workout->type] = array(
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'type' => str_replace('_', ' ', $workout->type),
                    'sets' => $workout->sets,
                    'repetitions' => $workout->repetitions,
                    'weight' => $workout->weight,
                    'duration' => $workout->duration,
                    'rest' => $workout->rest
                );
            }

        }

        $leader_board = null;

        $count = 0;

        foreach ($leaders as $key => $value) {

            if ($count < 5) {
                $leader_board[$key] = $value;
            }

            $count++;
        }

        return view('welcome', ['articles' => $articles, 'leader_board' => $leader_board]);
    }
}
