<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();
        $data = [
            'title' => config('app.name', 'Laravel') . ' | Dashboard',
            'transactions' => $transactions,
        ];
        return view('dashboard', $data);
    }
}
