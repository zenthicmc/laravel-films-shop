<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\TripayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function show($reference)
    {
        $tripay = new TripayController();
        $detail = $tripay->detailTransaction($reference);

        $data = [
            'title' => config('app.name', 'Laravel') . ' | Transaction Detail',
            'detail' => $detail,
        ];

        return view('transaction', $data);
    }


    public function store(Request $request)
    {
        // Getting all the required data
        $film = Http::get('https://www.omdbapi.com/?apikey=5894d127&i=' . $request->id)->json();
        $name = $film['Title'];
        $image = $film['Poster'];
        $price = str_replace(',', '', $film['imdbVotes']);
        $method = $request->input('method');

        // Request to Tripay
        $tripay = new TripayController();
        $transaction = $tripay->requestTransaction($name, $image, $price, $method);

        // Create a new data in Transaction model
        Transaction::create([
            'reference' => $transaction->reference,
            'merchant_ref' => $transaction->merchant_ref,
            'user_id' => auth()->user()->id,
            'film_id' => $request->id,
            'film_title' => $name,
            'total_price' => $transaction->amount,
            'status' => $transaction->status,
        ]);

        return redirect()->route('transaction.show', ['reference' => $transaction->reference]);
    }
}
