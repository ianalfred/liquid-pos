<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'item_id',
        'quantity',
        'total_selling',
    ];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function sale() {
        return $this->belongsTo(Sale::class);
    }

    public function user() {
        return $this->hasOneThrough(User::class, Sale::class);
    }
}
