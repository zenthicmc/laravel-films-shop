<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
 
class Film extends Model
{
   public function getFilmByTitle($judul)
   {
      $filmsResponse = Http::get('https://www.omdbapi.com/?apikey=5894d127&s=' . $judul)->json()['Response'];
      if ($filmsResponse == 'True') {
         $films = Http::get('https://www.omdbapi.com/?apikey=5894d127&s=' . $judul)->json()['Search'];
         return $films;
      } else {
         return False;
      }
   }
}