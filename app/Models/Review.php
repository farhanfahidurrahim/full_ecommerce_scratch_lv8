<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'review',
        'rating',
        'review_date',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function prodcut(){
        return $this->belongsTo(prodcut::class,'product_id');
    }
}
