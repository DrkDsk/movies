<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;

class MovieRepository {

    public function getMoviePopular()
    {
        return json_decode(Http::get(ApiEnviroment::API_ENDPOINT."movie/popular?api_key=".ApiEnviroment::API_KEY."&language=en-US"))->results;
    }

    public function getNowPlayingMovies()
    {
        return json_decode(Http::get(ApiEnviroment::API_ENDPOINT."movie/now_playing?api_key=".ApiEnviroment::API_KEY."&language=en-US"))->results;
    }

    public function getMovieDetails($movie_id)
    {
        return json_decode(Http::get(ApiEnviroment::API_ENDPOINT."movie/".$movie_id."?api_key=".ApiEnviroment::API_KEY."&language=en-US"));
    }

    public function search($search)
    {
        return json_decode(Http::get(ApiEnviroment::API_ENDPOINT."search/multi?api_key=".ApiEnviroment::API_KEY."&language=en-US"."&include_adult=false"."&query=".$search))->results;
    }
}