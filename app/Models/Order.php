<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','payment_method','subtotal','shipping','grand_total','district','address','apartment','city','state','zip','notes'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
