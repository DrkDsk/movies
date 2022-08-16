<?php

namespace App\Services;

use Carbon\Carbon;

class MovieService {

  public function getDateFormat($movie)
  {
    $release_date = Carbon::createFromFormat('Y-m-d',$movie->release_date);
    return [
      "release_date" => $release_date->format('Y/m/d'),
       "year_release_date" => $release_date->format('Y')
    ];
  }

}