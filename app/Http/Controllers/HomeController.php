<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\TripayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Film;
 
class HomeController extends Controller
{
   protected $filmModel;

   public function __construct()
   {
      $this->filmModel = new Film();
   }

   public function index()
   {
      $data = [
         'title' => config('app.name', 'Laravel') . ' | Home',
         'films' => Http::get('https://www.omdbapi.com/?apikey=5894d127&s=shoot')->json()['Search'],
      ];
      return view('index', $data);
   }

   public function film($id)
   {
      $data = [
         'title' => config('app.name', 'Laravel') . ' | Film',
         'film' => Http::get('https://www.omdbapi.com/?apikey=5894d127&i=' . $id)->json(),
      ];
      return view('film', $data);
   }

   public function search($judul)
   {
      $data = [
         'title' => config('app.name', 'Laravel') . ' | Search',
         'films' => $this->filmModel->getFilmByTitle($judul),
      ];
      
      return view('index', $data);
   }

   public function checkout($id)
   {
      $tripay = new TripayController();
      $data = [
         'title' => config('app.name', 'Laravel') . ' | Checkout',
         'film' => Http::get('https://www.omdbapi.com/?apikey=5894d127&i=' . $id)->json(),
         'payment_channels' => $tripay->getPaymentChannels(),
      ];
      return view('checkout', $data);
   }
}