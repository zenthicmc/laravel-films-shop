<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['reference', 'merchant_ref', 'user_id', 'film_id', 'film_title', 'total_price', 'status'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
