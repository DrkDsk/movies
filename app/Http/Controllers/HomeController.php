<?php

namespace App\Http\Controllers;

use App\Repository\MovieRepository;
use App\Services\MovieService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected $movie, $movieService;

    public function __construct(MovieRepository $movie, MovieService $movieService)
    {
        $this->movie = $movie;
        $this->movieService = $movieService;
    }

    public function index()
    {
        $latest = $this->movie->getNowPlayingMovies();
        return Inertia::render('Dashboard',[
            "movies" => $latest,
        ]);
    }

    public function popular()
    {
        $topRatedMovies = $this->movie->getMoviePopular();
        return Inertia::render('Dashboard',[
            "movies" => $topRatedMovies,
        ]);
    }

    public function getMovieDetails($movie)
    {
        $movieDetails = $this->movie->getMovieDetails($movie);
        $release_date = $this->movieService->getDateFormat($movieDetails);
        return Inertia::render('Details', [
            "movie" => $movieDetails,
            "releaseDate" => $release_date['release_date'],
            "year_release_date" => $release_date['year_release_date']
        ]);
    }

    public function multiSearch(Request $request)
    {
        $moviesResult = $this->movie->search($request->search);
        return response()->json($moviesResult);
    }
}
