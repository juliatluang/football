<?php
/**
 * Created by PhpStorm.
 * User: bp
 * Date: 7/3/21
 * Time: 11:19 AM
 */
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use App;

class FootballAPIServiceProvider extends ServiceProvider
{
    public function boot()
    {


    }

    public function register()
    {
        $this->app->bind('football', function()
        {
            $client = new Client([
                'base_uri'  =>  'https://api-football-v1.p.rapidapi.com',
                'headers'   =>  [
                    "X-RapidAPI-Host" => "api-football-v1.p.rapidapi.com",
                    'X-RapidAPI-Key' => env('APIFOOTBALL_API_KEY')
                ]
            ]);

            return new FootballAPI($client);
        });

    }
}